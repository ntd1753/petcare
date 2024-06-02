<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\User;
use App\Models\Pet;

class AppointmentController extends Controller
{
    public function create()
    {
        $pets = Pet::all();
        $doctors = User::where('role', 'doctor')->get(); // Giả định role 'doctor' tồn tại
        return view('appointments.create', compact('pets', 'doctors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'petId' => 'required|exists:pets,id',
            'doctorId' => 'required|exists:users,id',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'status' => 'required|in:scheduled,completed,canceled'
        ]);

        Appointment::create($request->all());

        return redirect()->route('appointments.index')->with('success', 'Đặt lịch khám bệnh thành công!');
    }

    public function index()
    {
        $appointments = Appointment::with('pet', 'doctor')->get();
        return view('appointments.index', compact('appointments'));
    }
}
