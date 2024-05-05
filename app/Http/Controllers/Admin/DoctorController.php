<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    function index(){
        $doctors = User::role('doctor')->get();
        //dd($doctors);
        return view('admin.content.doctor.index',['doctor'=>$doctors]);
    }

}
