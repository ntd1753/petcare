<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Boarding;
use App\Models\Pet;
use App\Models\Room;
use App\Models\Species;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateServiceController extends Controller
{
    public function showRegisterRoom(){
        return view('content.user.register.room',
            [
                "pet"=>Auth::user()->pets,
                "room"=>Room::where("status","available")->get()
                ]);
    }
    public function registerRoom(Request $request){
            // Kiểm tra phòng có khả dụng trong thời gian đặt hay không
            $existingBoarding = Boarding::where('roomId', $request->roomId)
                ->where(function($query) use ($request) {
                    $query->whereBetween('startTime', [$request->startTime, $request->endTime])
                        ->orWhereBetween('endTime', [$request->startTime, $request->endTime]);
                })->first();
            $room= Room::find($request->roomId);

            if ($existingBoarding) {
                return back()->withErrors(['roomId' => 'Phòng đã được đặt trong khoảng thời gian này.']);
            }
            Boarding::create([
                    'petId'=>$request->petId,
                    'roomId'=>$request->roomId,
                    'startTime'=>$request->startTime,
                    'endTime'=>$request->endTime,
            ]

            );
            return redirect()->route('user.listPet')->with('success', 'Đặt phòng thành công!');
        }
    public function showRegisterAppoint(){
        return view();
    }
    public function registerAppoint(Request $request){
        // Tìm bác sĩ có lịch trống
        $doctorId = Appointment::findAvailableDoctor($request->date, $request->time);

        if (!$doctorId) {
            return back()->withErrors(['doctorId' => 'Không có bác sĩ nào trống trong thời gian này.']);
        }

        // Tạo cuộc hẹn
        Appointment::create([
            'petId' => $request->petId,
            'doctorId' => $doctorId,
            'date' => $request->date,
            'time' => $request->time,
            'status' => $request->status
        ]);

        return redirect()->route('appointments.index')->with('success', 'Đặt lịch khám bệnh thành công!');
    }
    public function showRegisterPet(){
        return view('content.user.register.pet',['species'=>Species::all()]);
    }
    public function registerPet(Request $request){

        $pet = new Pet();
        $pet->ownerId = Auth::user()->id;
        $pet->name = $request->name;
        $pet->age = $request->age;
        $pet->color = $request->color;
        $pet->gender = $request->gender;
        $pet->healthStatus = $request->healthStatus;
        $pet->speciesId = $request->speciesId;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // Đặt tên cho file ảnh dựa trên một tiêu chí nhất định, ví dụ: timestamp và original filename
            $filename = time() . '_' . $image->getClientOriginalName();
            // Lưu ảnh với tên file mới vào thư mục storage/app/public/images
            $path = $image->storeAs('public/images', $filename);
            // Chuyển đổi đường dẫn lưu trữ cho phù hợp khi trả về client
            $publicPath = 'storage/images/' . $filename;

            $pet->avatar = $publicPath;
        }

        $pet->save();

        return redirect()->route('user.listPet')->with('success', 'Thêm thú cưng mới thành công!');
    }

}
