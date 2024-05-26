<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DoctorController extends Controller
{
    protected function fillDoctorData($doctor, $input, $avatar): void{
        $doctor['name'] = $input['name'];
        $doctor['phoneNumber']=$input['phoneNum'];
        $doctor['address']=$input['address'];
        $doctor['email']=$input['email'];
        $doctor['password']=Hash::make($input['password']);
        if ($avatar){
            $doctor['avatar']=$avatar;
        }
        $doctor->save();
    }
    public function index(){
        $doctors = User::role('doctor')->get();
        //dd($doctors);
        return view('admin.content.doctor.index',['doctor'=>$doctors]);
    }
    function add(){
        return view('admin.content.doctor.add');
    }
     function store(Request $request){
        //dd($request);

        $input=$request->all();

        $doctor= new User();
        if ($request->hasFile('image')){
            $image = $request->file('image');
            // Đặt tên cho file ảnh dựa trên một tiêu chí nhất định, ví dụ: timestamp và original filename
            $filename = time() . '_' . $image->getClientOriginalName();
            // Lưu ảnh với tên file mới vào thư mục storage/app/public/images
            $path = $image->storeAs('public/images', $filename);
            // Chuyển đổi đường dẫn lưu trữ cho phù hợp khi trả về client
            $publicPath = 'storage/images/' . $filename;
        }else{
            $publicPath=null;
        }


        $this->fillDoctorData($doctor,$input, $publicPath);
        $doctor->assignRole('doctor');
        return redirect()->route("admin.doctor.index");
    }
    function edit($id){
        $doctor= User::find($id);
        return view('admin.content.doctor.edit',['doctor'=>$doctor]);
    }
    function update(Request $request, $id){
        dd($request);
        $input=$request->all();
        $doctor= User::find($id);
        $this->fillDoctorData($doctor,$input);
        return redirect()->route("admin.doctor.index");
    }
    function destroy($id){
        $doctor = User::find($id);
        if (!$doctor) return redirect()->back();
        $doctor->delete();
        return redirect()->route("admin.doctor.index");
    }
}
