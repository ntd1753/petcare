<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Boarding;
use App\Models\Pet;
use App\Models\PetService;
use App\Models\Room;
use App\Models\Species;
use App\Models\TypeOfService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use App\Models\User;
use App\Models\ServiceOrders;
use App\Models\OrderDetails;

class CreateServiceController extends Controller
{
    public function showRegisterRoom(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view(
            'content.user.register.room',
            [
                "pet" => Auth::user()->pets,
                "room" => Room::where("status", "available")->get()
            ]
        );
    }
    public function registerRoom(Request $request): \Illuminate\Http\RedirectResponse
    {
        // Kiểm tra phòng có khả dụng trong thời gian đặt hay không
        $existingBoarding = Boarding::where('roomId', $request->roomId)
            ->where(function ($query) use ($request) {
                $query->whereBetween('startTime', [$request->startTime, $request->endTime])
                    ->orWhereBetween('endTime', [$request->startTime, $request->endTime]);
            })->first();
        $room = Room::find($request->roomId);

        if ($existingBoarding) {
            return back()->withErrors(['roomId' => 'Phòng đã được đặt trong khoảng thời gian này.']);
        }
        Boarding::create(
            [
                'petId' => $request->petId,
                'roomId' => $request->roomId,
                'startTime' => $request->startTime,
                'endTime' => $request->endTime,
            ]

        );
        return redirect()->route('user.listPet')->with('success', 'Đặt phòng thành công!');
    }
    public function showRegisterAppoint(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {

        $pet = Pet::where('ownerId', Auth::user()->id)->get();
        $room = Room::select('RoomNumber')->get();
        return view('content.user.register.appointment', compact('pet', 'room'));
    }


    public function registerAppoint(Request $request): \Illuminate\Http\RedirectResponse
    {
        // Tìm bác sĩ có lịch trống
        $doctorId = Appointment::findAvailableDoctor($request->date, $request->time);

        if (!$doctorId) {
            return back()->withErrors(['doctorId' => 'Không có bác sĩ nào trống trong thời gian này.']);
        }

        // Tạo cuộc hẹn
        Appointment::create([
            'petId' => $request->pet_id,
            'doctorId' => $doctorId,
            'date' => $request->date,
            'time' => $request->time,
            'status' => 'ok'
        ]);

        return redirect()->route('user.listPet')->with('success', 'Đặt lịch khám bệnh thành công!');
    }
    public function showRegisterPet(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('content.user.register.pet', ['species' => Species::all()]);
    }
    public function registerPet(Request $request): \Illuminate\Http\RedirectResponse
    {

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

    public function showService(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $pet = Pet::where('ownerId', Auth::user()->id)->get();
        $services = TypeOfService::all();
        return view('content.user.register.service', compact('pet', 'services'));
    }
    public function addService(Request $request): \Illuminate\Http\RedirectResponse
    {

        $petService = new PetService();
        $petService = PetService::create([
            'petId' => $request->pet_id,
            'serviceTypeId' => $request->service,
            'time' => $request->time,
            'date' => $request->date,
            'Status' => "ok"
        ]);

        return redirect()->route('user.listPet')->with('success', 'Appointment created successfully.');
    }

    public function historyService()
    {
        $user = Auth::user();

        // Assuming the Pet model has a user_id field to associate pets with users
        $petServices = PetService::with('pet', 'serviceType')
            ->whereHas('pet', function ($query) use ($user) {
                $query->where('ownerId', $user->id);
            })->get();

//        return view('content.user.history.service_history', compact('petServices'));
//dd($petServices);
        return view('content.user.history.service_history', compact('petServices'));
    }
    public function historyRoom(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();

        // Assuming the Pet model has a user_id field to associate pets with users
        $petRoom = Boarding::with('pet', 'room')
            ->whereHas('pet', function ($query) use ($user) {
                $query->where('ownerId', $user->id);
            })->get();

//        return view('content.user.history.service_history', compact('petServices'));
//dd($petServices);
        return view('content.user.history.room_history', compact('petRoom'));
    }
    public function historyAppointment(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $user = Auth::user();

        // Assuming the Pet model has a user_id field to associate pets with users
        $petAppointment = Appointment::with('pet')
            ->whereHas('pet', function ($query) use ($user) {
                $query->where('ownerId', $user->id);
            })->get();

//        return view('content.user.history.service_history', compact('petServices'));
//dd($petServices);
        return view('content.user.history.appointment_history', compact('petAppointment'));
    }

}
