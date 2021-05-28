<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Practitioner;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class PractitionerController extends Controller
{
        public function create(Request $request)
        {
                $result = DB::table('practitioners')->insert([
                        'lastname' => $request->lastname,
                        'firstname' => $request->firstname,
                        'address' => $request->address,
                        'tel' => $request->tel,
                        'notorietyCoeff' => $request->notCoef,
                        'complementarySpeciality' => $request->compSpe,
                        'district_id' => $request->d_id
                ]);
                return response()->json($result);
        }

        public function getOne(Practitioner $practitioner)
        {
                $result = DB::table('practitioners')
                ->where('id', $practitioner->id)->get();
                return response()->json($result);
        }

        public function getByUser(Employee $user)
        {
                /**
                 $result = Practitioner::where('visits.employees_id','=',$user->id);
                 **/
                 //dd($user->input);
                $result = DB::table('practitioners')
                ->join('visits','visits.practitioners_id','=','practitioners.id')
                ->join('employees','visits.employees_id','=','employees.id')
                ->where('visits.employees_id','=', $user->id)->select('practitioners.*')->get();

                return response()->json($result);
        }

        public function getAll(){
                /**
                 $result = DB::table('practitioners')
                 ->join('visits','visits.practitioners_id','=','practitioners.id')
                 ->join('employees','visits.employees_id','=','employees.id')
                 ->select('practitioners.*')->get();
                 return response()->json($result);
                 **/
                $result = Practitioner::all();
                return response()->json($result);
            }

        public function edit(Practitioner $practitioner, Request $request)
        {
                $result = DB::table('practitioners')->where('id', $practitioner->id)->update([
                        'lastname' => $request->lastname,
                        'firstname' => $request->firstname,
                        'address' => $request->address,
                        'tel' => $request->tel,
                        'notorietyCoeff' => $request->notCoef,
                        'complementarySpeciality' => $request->compSpe,
                        'district_id' => $request->d_id
                ]);
                return response()->json($result);
        }
}
