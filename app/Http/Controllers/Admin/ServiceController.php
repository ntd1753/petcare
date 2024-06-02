<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TypeOfService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    protected function fillServiceData($service, $input): void{
        $service['name']=$input['name'];
        $service['description']=$input['description'];
        $service['price']=$input['price'];
        $service->save();
    }
    public function index(){
        $service_type= TypeOfService::paginate(10);
        return view('admin.content.service.index',[
            'service_type'=>$service_type
        ]);
    }
    public function add(){
        return view("admin.content.service.add");
    }
    public function store(Request $request){
        $input = $request->all();
        $typeOfService = new TypeOfService();
        $this->fillServiceData($typeOfService,$input);
        return redirect()->route("admin.typeOfService.index");

    }
    public function edit($id){
        return view('admin.content.service.edit',['item'=>TypeOfService::find($id)]);
    }
    public function update(Request$request,$id){
        $input=$request->all();
        $typeOfService=TypeOfService::find($id);
        $this->fillServiceData($typeOfService,$input);
        return redirect()->route("admin.typeOfService.index");
    }
    public function destroy($id){
        $typeOfService=TypeOfService::find($id);
        if($typeOfService){
            $typeOfService->delete();
        }
        return redirect()->route("admin.typeOfService.index");
    }
}
