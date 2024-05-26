<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    protected function fillData($room,$input){
        $room['roomNumber']=$input['roomNumber'];
        $room['status']="available";
        $room->save();
    }
    public function index(){
        return view('admin.content.room.index',[
            'room'=>Room::paginate(10)
        ]);
    }
    public function add(){
        return view("admin.content.room.add");
    }
    public function store(Request $request){
        $input = $request->all();
        $room = new Room();
        $this->fillData($room,$input);
        return redirect()->route("admin.room.index");

    }
    public function edit($id){
        return view('admin.content.room.edit',['item'=>Room::find($id)]);
    }
    public function update(Request$request,$id){
        $input=$request->all();
        $room=Room::find($id);
        if($room){
            $room['RoomNumber']=$input['roomNumber'];
            $room['Status']=$input["status"];
            $room->save();
        }
        return redirect()->route("admin.room.index");
    }
    public function destroy($id){
        $room=Room::find($id);
        if($room){
            $room->delete();
        }
        return redirect()->route("admin.room.index");
    }
}
