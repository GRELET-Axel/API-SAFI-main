<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseSheet;
use App\Models\Expense;
use Illuminate\Support\Facades\DB;



class ExpenseController extends Controller
{

	public function create(Request $request){
		$result = DB::table('expense_sheets')->insert([
            'employee_id' => $request->p_id,
            'ref' => $request->ref,
            'calcultatedAmount' => $request->cta,
			'unit' => $request->vs_id,
			'sheetState_id' => $request->ss_id,
			'creationDate' => $request->date,
			'modificationDate' => $request->mdate
        	]);
			return response()->json($result);
		}
	
	public function edit($id,Request $request){
	
			$result = DB::table('expense')->insert([

				
			]);
	}
	
	public function getOne(ExpenseSheet $eSheet){
		//var_dump($expenseSheet->id);
        return response()->json($eSheet);
    }
	public function getByState($id, $status){
	
			$result = DB::table('expense')->insert([
				
			]);
		}
	public function getlast($id, $date){
	
			$result = DB::table('expense')->insert([
				
				]);
			}

	public function getAll(Expense $expense ){
	
		$result = DB::table('expense')->insert([
				
			]);
		}

	public function destroy($id){
	
		$result = DB::table('expense')->insert([
				
			]);
	}

}
