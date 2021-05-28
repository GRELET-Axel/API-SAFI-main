<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    public function create(Request $request)
    {
        $activities = auth()->user()->activities;
 
        return response()->json($activities);
    }

    public function getOne(Activity $activity)
    {
        $result = DB::table('activities')
            ->where('id', $activity->id)->get();
        return response()->json($result);
    }

    public function getByUser(Employee $user)
    {
        //dd($user->input);
        $result = DB::table('activities')
            ->join('employees', 'activities.employee_id', '=', 'employees.id')
            ->join('activity_states', 'activities.activityStates_id', '=', 'activity_states.id')
            ->where('activities.employee_id', '=', $user->id)->get(['activities.*', 'activity_states.*']);
        return response()->json($result);
    }

    public function edit(Activity $activity, Request $request)
    {
        
        $activity = Activity::find($activity);
        //dd($activity);
 
        if (!$activity) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found'
            ], 400);
        }
 
        $updated = $activity->fill($request->all())->save();
 
        if ($updated)
            return response()->json([
                'success' => true
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Activity can not be updated'
            ], 500);
        
            /*
        $result = DB::table('activities')->where('id', $activity->id)->update([
            'employee_id' => $request->e_id,
            'theme' => $request->theme,
            'request' => $request->demand,
            'place' => $request->palce,
            'code' => $request->code,
            'creationDate' => $request->cDate,
            'validationDate' => $request->vDate,
            'allocatedBudget' => $request->budget,
            'unit' => $request->unit,
            'activityStates_id' => $request->as_id
        ]);
        return response()->json($result);
        */
    }

    public function destroy(Activity $activity)
    {
        return response()->json($activity->delete());
    }
}
