<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Species;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;

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
    function formpet($id){
        $pet=Pet::where('id','=',$id)->with('patients')->get()[0];
        $sepcies =DB::table('species')->get();
            return view('content.user.updatePetInformation.pet_update',['proPet'=>$pet,'species'=>$sepcies]);
}
    public function pet_update(Request $request, $id)
    {
//        dd($request);
        $input = $request->all();
        $pet = Pet::find($id);
        $pet['name'] = $input['name'];
        $pet['age'] = $input['age'];
        $pet['gender'] = $input['customRadio1'];
        $pet['color'] = $input['cname'];
        $pet['speciesId'] =  $input['gname'];
        $pet->save();
        return redirect()->route("petList");
    }
}
