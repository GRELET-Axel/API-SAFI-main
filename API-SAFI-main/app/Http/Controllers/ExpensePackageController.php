<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ExpensePackageType;

class ExpensePackageController extends Controller
{

    public function create(Request $request)
    {
        $result = DB::table('expense_package_types')->insert([
            'name' => $request->ept_name,
            'amount' => $request->ept_amount,
            'unit' => $request->ept_unit
        ]);
        return response()->json($result);
    }

    public function edit(ExpensePackageType $ept, Request $request)
    {

        $result = DB::table('expense_package_types')->where('id', $ept->id)
            ->update([
                'name' => $request->ept_name,
                'amount' => $request->ept_amount,
                'unit' => $request->ept_unit
            ]);
    }

    public function getOne(ExpensePackageType $ept)
    {
        return response()->json($ept);
    }

    public function getAll()
    {
        $result = DB::table('expense_package_types')->get(['id', 'name', 'amount', 'unit']);
        return response()->json($result);
    }

    public function destroy(ExpensePackageType $ept)
    {
        return response()->json($ept->delete());
    }
}
