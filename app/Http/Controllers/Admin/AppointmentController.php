<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\User;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    // Hiển thị danh sách các cuộc hẹn
    public function index()
    {
        $appointments = Appointment::paginate(10);
        return view('admin.content.appointment.index', compact('appointments'));
    }

    // Hiển thị form tạo cuộc hẹn mới
    public function add()
    {
        $doctors = User::role('doctor')->get();
        return view('admin.content.appointment.add', compact('doctors'));
    }

    // Lưu cuộc hẹn mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'pet_id' => 'required|integer',
            'doctor_id' => 'required|integer',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'status' => 'required|string',
        ]);

        $doctorId = $request->doctor_id;
        $date = $request->date;
        $time = $request->time;

        // Kiểm tra thời gian làm việc
        $appointmentTime = Carbon::createFromFormat('H:i', $time);
        if (!($appointmentTime->between(Carbon::createFromTime(8, 0), Carbon::createFromTime(12, 0)) ||
            $appointmentTime->between(Carbon::createFromTime(13, 0), Carbon::createFromTime(17, 0)))) {
            return back()->withErrors(['time' => 'Thời gian không hợp lệ.']);
        }

        // Kiểm tra khoảng cách 30 phút
        $existingAppointments = Appointment::where('doctorId', $doctorId)
            ->where('date', $date)
            ->get();
        foreach ($existingAppointments as $appointment) {
            $existingTime = Carbon::createFromFormat('H:i', $appointment->time);
            if ($existingTime->diffInMinutes($appointmentTime) < 30) {
                return back()->withErrors(['time' => 'Đã có lịch khám trong khoảng thời gian này.']);
            }
        }

        // Lưu cuộc hẹn
        Appointment::create([
            'pet_id' => $request->pet_id,
            'doctor_id' => $doctorId,
            'date' => $date,
            'time' => $time,
            'status' => $request->status,
        ]);
        return redirect()->route('appointments.index')->with('success', 'Tạo cuộc hẹn thành công.');
    }

    // Hiển thị chi tiết cuộc hẹn
    public function show($id)
    {
        $appointment = Appointment::find($id);
        return view('appointments.show', compact('appointment'));
    }

    // Hiển thị form chỉnh sửa cuộc hẹn
    public function edit($id)
    {
        $appointment = Appointment::find($id);
        $doctors = User::role('doctor')->get();
        return view('admin.content.appointment.edit', compact('appointment', 'doctors'));
    }

    // Cập nhật cuộc hẹn
    public function update(Request $request, $id)
    {
        $request->validate([
            'petId' => 'required|integer',
            'doctorId' => 'required|integer',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'status' => 'required|string',
        ]);

        $appointment = Appointment::find($id);
        $appointment->update($request->all());

        return redirect()->route('admin.content.appointment.index')->with('success', 'Cập nhật cuộc hẹn thành công.');
    }

    // Xóa cuộc hẹn
    public function destroy($id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();
        return redirect()->route('admin.content.appointment.index');
    }
}
