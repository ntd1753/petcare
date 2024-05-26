<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function index(){
        $users =  User::role('customer')->paginate(15);
        return view("admin.content.user.index",["users" => $users]);
    }
    function destroy($id){
        $user = User::find($id);
        if (!$user) return redirect()->back();
        $user->delete();
        return redirect()->route("admin.doctor.index");
    }

}
