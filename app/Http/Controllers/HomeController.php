<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function show()
    {
        $user = Auth::user();
        return view('content.user.show', compact('user'));
    }

    function profileForm($id): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $doctor = User::find($id);
//        dd($doctor);
        return view('content.user.edit', ['doctor' => $doctor]);
    }
    function updateProfile(Request $request, $id)
    {
//        dd($request);
        $input = $request->all();
        $doctor = User::find($id);
        $doctor['name'] = $input['name'];
        $doctor['phoneNumber'] = $input['phoneNum'];
        $doctor['address'] = $input['address'];
        $doctor['email'] = $input['email'];
        $doctor->save();

//        return redirect()->route("search_pet");
//        $user = Auth::user(); // Lấy thông tin người dùng hiện tại

        if (Auth::user()->getRoleNames()[0] == 'customer') {
            return redirect()->route("user.listPet");
        } elseif (Auth::user()->getRoleNames()[0] == 'doctor') {
            return redirect()->route("petList02");
        } elseif (Auth::user()->getRoleNames()[0] == 'admin'||Auth::user()->getRoleNames()[0]== 'manager') {
            return redirect()->route("admin.doctor.index");
        }
    }
}
