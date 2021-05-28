<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Employee;
use App\Models\VisitReport;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{

	public function create(Request $request){
        $result = DB::table('visit_reports')->insert([
			'visits_id' => $request->v_id,
			'creationDate' => $request->date,
			'comment' => $request->comment,
			'starScore' => $request->score,
			'visitReportStates_id' => $request->vrs_id]);
        return response()->json($result);
    }

    public function getOne(VisitReport $report){
        return response()->json($report);
    }
    
    public function getAll(){
        $result = DB::table('visit_reports')->get();
        return response()->json($result);
    }
    
    public function edit(VisitReport $report, Request $request){
        $result = DB::table('visit_reports')->where('id', $report->id)
        ->update([
            'visits_id' => $request->v_id,
			'creationDate' => $request->date,
			'comment' => $request->comment,
			'starScore' => $request->score,
			'visitReportStates_id' => $request->vrs_id]);
        return response()->json($result);
    }
    
    public function destroy(VisitReport $report){
        return response()->json($report->delete());
    }
}
