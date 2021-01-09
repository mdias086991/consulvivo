<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Doctor;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmRegister;
use App\Mail\NotificationPatientForApprove;
use App\Mail\NotificationPatientForCancel;
use Illuminate\Support\Facades\Auth;
use App\Entities\Consutation;
use App\Entities\Patient;

class DoctorController extends Controller
{
    // Return Form to register a new Doctor
    public function index()
    {
        return view('doctor.new');
    }
    
    public function store(Request $request) {
        $user = new User();
        
        $user->email = $request->email;
        $user->name = $request->name;
        $user->type = 'doctor';
        $user->password = bcrypt($request->pass);

        $user->save();

        if($user) {
            $doctor = new Doctor();
            $doctor->name = $request->name;
            $doctor->user_id = $user->id;
            $doctor->birth = $request->birth;

            $doctor->save();
        }
        
        Mail::to($request->email)->send(new ConfirmRegister($request->email, $request->name, $doctor->id)); 
        
        return view('confirm', compact('doctor'));
    }

    public function doctorConsultation() {
        $doctor = Doctor::where('user_id', Auth::user()->id)->first();
        $consultationDoctor = Consutation::where('doctor_id', $doctor->id)->get();

        

        return view('doctor.myconsultations', compact('consultationDoctor'));
    }

    public function approveConsultation($id) {
        $consultation = Consutation::where('id', $id)->first();

        $consultation->status = 'Aprovada pelo Médico';
        $consultation->save();
        
        Mail::to($consultation->patient->user->email)->send(new NotificationPatientForApprove($consultation->doctor->name, $consultation->date_end, $consultation->patient->name)); 
        return redirect()->back();
    }

    public function reproveConsultation(Request $request, $id) {

        $consultation = Consutation::where('id', $id)->first();
        $consultation->status = 'Reprovada pelo Médico';
        $consultation->save();
       
        Mail::to($consultation->patient->user->email)->send(new NotificationPatientForCancel($consultation->doctor->name, $request->obs, $consultation->patient->name)); 
        return redirect()->back();

    }
}
