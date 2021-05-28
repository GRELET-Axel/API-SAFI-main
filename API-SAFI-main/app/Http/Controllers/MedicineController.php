<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drug;
use App\Models\Medicine;
use Illuminate\Support\Facades\DB;

class MedicineController extends Controller
{
    public function create(Request $request){
        $result = DB::table('medicines')->insert([
            'code' => $request->code,
            'commercialName' => $request->comName,
            'family_id' => $request->f_id,
            'composition' => $request->compo,
            'effects' => $request->effects,
            'contraindication' => $request->contr]);
        return response()->json($result);
    }

    public function getOne(Medicine $drug){
        return response()->json($drug);
    }
    
    public function getAll(){
        $result = DB::table('medicines')
        ->join('medecine_families','medicines.family_id','=','medecine_families.id')->get();
        return response()->json($result);
    }
    
    public function edit(Medicine $drug, Request $request){
        $result = DB::table('medicines')->where('id', $drug->id)
        ->update([
            'code' => $request->code,
            'commercialName' => $request->comName,
            'family_id' => $request->f_id,
            'composition' => $request->compo,
            'effects' => $request->effects,
            'contraindication' => $request->contr]);
        return response()->json($result);
    }
    
    public function destroy(Medicine $drug){
        return response()->json($drug->delete());
    }
}
