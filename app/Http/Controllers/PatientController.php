<?php

namespace App\Http\Controllers;

use App\Entities\Consutation;
use App\Entities\Doctor;
use App\Entities\Patient;
use App\Mail\AlterInformation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmRegister;
use App\Mail\DoctorNotification;
use App\Mail\PatientNotification;
use Illuminate\Support\Facades\Auth;
use PhpParser\Comment\Doc;
use Symfony\Component\Mime\Part\Multipart\AlternativePart;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Return form to register a new Patient
        return view('patient.new');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createConsultation()
    {
        $doctor = Doctor::get();
        return view('patient.new-consultation', compact('doctor'));
    }

    public function storeConsultation(Request $request) {
        $patient_id = Patient::where('user_id', $request->patient_id)->first();
        $doctor = Doctor::where('id', $request->doctor)->first();


        $consultation = new Consutation();

        $consultation->city = $request->city;
        $consultation->patient_id = $patient_id->id;
        $consultation->doctor_id = $request->doctor;
        $consultation->date_end = $request->date;

        $date_consultation = strtotime($request->date);
        $date_create = strtotime('today');


        if($date_consultation < $date_create) {
            $consultation->status = 'Atrasado';
        } else {
            $consultation->status = 'Agendado';
        }

        $consultation->save();
        Mail::to($doctor->user->email)->send(new DoctorNotification($doctor->name, $request->date, $patient_id->name)); 
        Mail::to($patient_id->user->email)->send(new PatientNotification($patient_id->name, $doctor->name)); 

        return redirect()->back();

    }

    public function viewConsultation() {
        $patient_id = Patient::where('user_id', Auth::user()->id)->first();
        $doctor = Doctor::get();
        $consultation = Consutation::where('patient_id', $patient_id->id)->get();
        return view('patient.myconsultations', compact('consultation', 'doctor'));
    }

    public function cancel($id) {
        $consultation = Consutation::where('id', $id)->first();

        $consultation->status = 'Cancelado pelo paciente';
        $consultation->save();

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $doctor = NULL;

        $user = new User();
        
        $user->email = $request->email;
        $user->name = $request->name;
        $user->type = 'patient';
        $user->password = bcrypt($request->pass);

        $user->save();

        if($user) {
            $patient = new Patient();
            $patient->name = $request->name;
            $patient->user_id = $user->id;
            $patient->birth = $request->birth;

            $patient->save();
        }

        Mail::to($request->email)->send(new ConfirmRegister($request->email, $request->name, $patient->id)); 
        
        return view('confirm', compact('patient', 'doctor'));
    }

   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $consultation = Consutation::where('id', $id)->first();

        Mail::to($consultation->doctor->user->email)->send(new AlterInformation($consultation->doctor->name, $consultation->date_end, $request->new_date, $consultation->patient->name)); 
        
        $consultation->date_end = $request->new_date;
        $consultation->status = "Agendado";

        $consultation->save();

        return redirect()->back();


        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
