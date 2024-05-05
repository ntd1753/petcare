<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
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
        return view('products.create');
    }
    public function addProduct(Request $request)
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
        return view('products.show');
    }
}
