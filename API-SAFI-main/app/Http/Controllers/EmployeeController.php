<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function profile(Employee $user){
        $result = DB::table('employees')
        ->where('employees.id','=',$user->id)
        ->join('employees','employees.id','=','employees.leader_id')
        ->join('sector_districts','employees.district_id','=','sector_districts.id');
        return response()->json($result);
    }
}