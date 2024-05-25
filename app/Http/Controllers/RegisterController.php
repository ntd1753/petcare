<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use Illuminate\Support\Facades\Auth;
use App\Models\Boarding;
use App\Models\Room;

class RegisterController extends Controller
{
    // public function index(){
    //     $title = 'VanDung';
    //     $myphone = [
    //         'name' => 'iphone 14',
    //         'year' => 2022
    //     ];
    //     return view('products.index',compact('title'),
    //     ['myphone' => $myphone]);
    // }
    // public function detail($id){
    //     return "product id = ".$id;

    // }
    public function index()
    {
        return view('register.create');
    }
    public function addPet(Request $request)
    {
        $pet = new Pet();
        $pet->name = $request->name;
        $pet->age = $request->age;
        $pet->color = $request->color;
        $pet->gender = $request->gender;
        $pet->avatar = "123";
        $pet->healthStatus = "123";
        $pet->speciesId = 1;
        $pet->ownerId = Auth::user()->id;
        $pet->save();
        return view('register.show');
    }

    public function registerRoom()
    {
        return view('register.createPetRoom');
    }

    public function addPetRoom(Request $request)
    {
        $boarding = new Boarding();
        $boarding->PetID = Auth::user()->id;
        $rooms = Room::where('RoomNumber', $request->RoomNumber)->first();
        if ($rooms) {
            $boarding->roomId = $rooms->id;
        }
        $boarding->startTime = $request->startTime;
        $boarding->endTime = $request->endTime;
        $boarding->save();
        return view('register.show');
    }
}