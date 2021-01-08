<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Doctor;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmRegister;

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
}
