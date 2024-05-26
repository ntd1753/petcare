<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecord;
use App\Models\Medication;
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
    //Doctor
    function petListOfDoctor()
    {
        //$author=Auth::user();
        $pets=Pet::all();

        return view('content.doctor.CRUD_patient.index',['listPet02'=> $pets]);
    }
    function petInfo_doctor($id)
    {
        $pet=Pet::where('id','=',$id)->with('patients')->get();//mang chi lay ra 1 phan tu cua mang do thi dung get()[0]
//        dd($pet);
        return view('content.doctor.CRUD_patient.pet_information',['inforPet02'=>$pet]);
    }
    function formpatient($patient_id){
//        $pat=Patient::where('id','=',$id)->with('medical_records')->get();
//        $medical =DB::table('medications')->get();
        $pat = Patient::where('id', '=', $patient_id)->with('medicalRecord.medications')->get()[0];
//        $pet=Pet::where('id','=',$pet_id)->get()[0];
        $medical = DB::table('medications')->get();
//        dd($pat);
        return view('content.doctor.CRUD_patient.updatePatient.patient_update',['pat'=>$pat,'medical' => $medical]);
    }
    public function patient_update(Request $request, $patient_id): \Illuminate\Http\RedirectResponse
    {
//        dd($request);
        $input = $request->all();
        $pat = Patient::find($patient_id);
        $pat['appointmentDate'] = $input['ngaykham'];
        $pat['recheckDate'] = $input['ngaytaikham'];
        $pat['symptoms'] = $input['trieuchung'];
        $pat['diagnosis'] = $input['chuandoan'];
        $pat['reminder'] =  $input['nhacnho'];
        $pat->save();
        $medicalRecord = $pat->medicalRecord;
        $medicalRecord->medications()->delete();
        $medicines = $request->input('medicines');
//        $pat->medications()->delete();
        foreach ($medicines as $medicine) {
            // Tạo một bản ghi mới trong bảng thuốc hoặc cập nhật bản ghi hiện có
            $medication = new Medication();
            $medication->MedicationName = $medicine['name'];
            $medication->Dose = $medicine['dosage'];
            $medication->Frequency = $medicine['frequency'];
            $medication->medicalRecordId = $patient_id;

//            $medication->patient_id = $patient_id; // Gán khóa ngoại của bệnh nhân
            $medication->save();
        }
        return redirect()->route("petList02");
    }

    function addform($pet_id): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        //$author=Auth::user();
//        $pets=Pet::where('ownerID','=', Auth::user()->id)->with('species')->get();

        return view('content.doctor.CRUD_patient.addPatient.patient_add',["pet_id"=>$pet_id]);
    }
    public function store(Request $request,$pet_id): \Illuminate\Http\RedirectResponse
    {
        $validatedData = $request->validate([

            'ngaykham' => 'required|date',
            'ngaytaikham' => 'required|date',
            'trieuchung' => 'required|string',
            'chuandoan' => 'required|string',
            'nhacnho' => 'nullable|string',
            'medicines.*.name' => 'required|string',
            'medicines.*.dosage' => 'required|string',
            'medicines.*.frequency' => 'required|string',
        ]);

        $patient = new Patient();
        $patient->petId = $pet_id; // Liên kết với pet_id
        $patient->appointmentDate = $validatedData['ngaykham'];
        $patient->recheckDate = $validatedData['ngaytaikham'];
        $patient->symptoms = $validatedData['trieuchung'];
        $patient->diagnosis = $validatedData['chuandoan'];
        $patient->reminder = $validatedData['nhacnho'];
        $patient->save();

        $patientId = $patient->id;

        $record = new MedicalRecord();
        $record->patientId = $patientId; // Liên kết với patient_id
        $record->save();

        foreach ($validatedData['medicines'] as $medicineData) {
            $medicine = new Medication();
            $medicine->MedicationName = $medicineData['name'];
            $medicine->Dose = $medicineData['dosage'];
            $medicine->Frequency = $medicineData['frequency'];
            $medicine->medicalRecordId = $record->id; // Liên kết với medical_record_id
            $medicine->save();
        }

        // Redirect to a confirmation page or somewhere els
        return redirect()->route('petList02')->with('success', 'Bệnh án mới đã được tạo thành công.');
    }

}
