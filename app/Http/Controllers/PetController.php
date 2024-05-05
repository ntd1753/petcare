<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Patient;
class PetController extends Controller
{
    function petListOfUser()
    {
        //$author=Auth::user();
        $pets=Pet::where('ownerID','=', Auth::user()->id)->with('species')->get();

        return view('content.user.pet.index',['listPet'=> $pets]);
    }
    function petInfo($id)
    {
        $pet=Pet::where('id','=',$id)->with('patients')->get()[0];//mang chi lay ra 1 phan tu cua mang do thi dung get()[0]
//        dd($pet);
        return view('content.user.pet.pet_information',['inforPet'=>$pet]);
    }
}
