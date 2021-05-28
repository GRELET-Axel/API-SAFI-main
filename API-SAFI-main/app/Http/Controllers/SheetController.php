<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseSheet;
use App\Models\Expense;
use App\Models\Employee;
use App\Models\ExpenseSheetState;
use Illuminate\Support\Facades\DB;

//appli mobile


class SheetController extends Controller
{
	public function create(Request $request)
	{
		$result = DB::table('expense_sheets')->insert([
			'employee_id' => $request->p_id,
			'ref' => $request->ref,
			'calcultatedAmount' => $request->cta,
			'unit' => $request->vs_id,
			'sheetState_id' => $request->ss_id,
			'creationDate' =>  $request->date ,
			'modificationDate' =>$request->mdate
		]);
		return response()->json($result);
	}

	
	 public function edit(ExpenseSheet $sheet, Request $request)
	{

		$result = DB::table('expense_sheets')->where('id', $sheet->id)->update([
			'employee_id' => $request->p_id,
			'ref' => $request->ref,
			'calcultatedAmount' => $request->cta,
			'unit' => $request->vs_id ,
			'sheetState_id' => $request->ss_id,
			'creationDate' => $request->date,
			'modificationDate' => $request->mdate 
		]);
		return response()->json($result);
	}
	/**/ 

	public function getOne(ExpenseSheet $sheet)
	{
		return response()->json($sheet);
	}

	public function getByState(ExpenseSheetState $status, Employee $user)
	{	

		$result = DB::table('expense_sheets')
		->Where('employee_id', "=", $user->id)
		->Where('sheetState_id', "=", $status->id)
		->get();
		return response()->json($result);
	}



	//public function getlast(Employee $user){


	//		}

	public function getAll(Employee $user)
	{

		$result = DB::table('expense_sheets')->Where('employee_id', "=", $user->id)->get();

		return response()->json($result);
	}

	public function destroy($id)
	{

		$result = DB::table('expense')->insert([]);
	}
}
