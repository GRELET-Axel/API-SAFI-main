<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class VisitController extends Controller
{
    public function create(Request $request)
    {
        $result = DB::table('visits')->insert([
            'practitioners_id' => $request->p_id,
            'employees_id' => $request->e_id,
            'attendedDate' => $request->date,
            'visitStates_id' => $request->vs_id
        ]);
        return response()->json($result);
    }

    public function getByDay(Employee $user, $day)
    {
        $result = DB::table('visits')
            ->join('practitioners', 'practitioners.id', '=', 'visits.practitioners_id')
            ->join('employees', 'employees.id', '=', 'visits.employees_id')
            ->where('employees_id', $user->id)
            ->where('attendedDate', 'like', $day . '%')
            ->select(['visits.*', 'practitioners.firstname AS firstname', 'practitioners.lastname AS lastname ', 'employees.city'])
            ->get();
        return response()->json($result);
    }

    public function getOne(Visit $visit)
    {
        return response()->json($visit);
    }

    public function getByUser(Employee $user)
    {
        $result = Visit::where('employees_id','=',$user->id)->get();
        //dd($result); 
        return response()->json($result);
        
        /*
        //dd($user);
        $result = DB::table('visits')
            ->join('practitioners', 'practitioners.id', '=', 'visits.practitioners_id')
            ->join('employees', 'employees.id', '=', 'visits.employees_id')
            ->join('visitStates', 'visitStates.id', '=', 'visits.visitStates_id')
            ->where('visits.employees_id', '=', $user->id)
            ->get();
        return response()->json($result);
        */
        }

    public function edit(Visit $visit, Request $request)
    {
        //dd($visit);
        /*
            **/
        if (!$visit) {
            return response()->json([
                'success' => false,
                'message' => 'vehicle not found'
            ], 400);
        }

        $updated = $visit->fill($request->all())->save();

        if ($updated) {
            return response()->json([
                'success' => true,
                'visit' => Visit::find($visit->id)
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'vehicle can not be updated'
            ], 500);
        }
        //dd($request);
        /**
            $result = DB::table('visits')->where('id', $visit->id)
            ->update([
                'practitioners_id' => $request->p_id,
                'employees_id' => $request->e_id,
                'attendedDate' => $request->date,
                'visitStates_id' => $request->vs_id]);
                return response()->json($result);
                if ($request->p_id != '') {
                    $result = Visit::where('id', $visit->id)->update(array('practitioners_id' => $request->p_id));
                }
                if ($request->e_id != '') {
                    $result = Visit::where('id', $visit->id)->update(array('employees_id' => $request->e_id));
                }
                if ($request->date != '') {
                    $result = Visit::where('id', $visit->id)->update(array('attendedDate' => $request->date));
                }
                if ($request->vs_id != '') {
                    $result = Visit::where('id', $visit->id)->update(array('visitStates_id' => $request->vs_id));
                }
                
                return response()->json($result);
         **/
    }

    public function destroy(Visit $visit)
    {
        return response()->json($visit->delete());
    }
}
