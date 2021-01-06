<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Doctor;

class DoctorController extends Controller
{
    // Return Form to register a new Doctor
    public function index()
    {
        return view('doctor.new');
    }
}
