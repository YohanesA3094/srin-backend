<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mPolicy;
use App\Models\mPatientInfo;
use App\Models\mCase;

class ReportController extends Controller
{
    public function policyReport(Request $request)
    {
        $policy = mPolicy::select('type')
            ->selectRaw('ROUND(AVG(IF(UNIX_TIMESTAMP(end_date) = 0, DATEDIFF(CURDATE(), start_date), DATEDIFF(end_date, start_date))),2 ) AS avg_count_days')
            ->groupBy('type')
            ->orderBy('avg_count_days', 'DESC')
            ->get();

        return response()->json(['message' => 'Policy Report Requested', 'data' => $policy], 200);
    }

    public function patientReport(Request $request)
    {
        $input = $request->only('province');
        $patient = mPatientInfo::select('province', 'sex', 'age')
            ->selectRaw('COUNT(patient_id) AS patient_count');

        if(array_key_exists('province', $input))
        {
            $patient = $patient->where('province', $input['province']);
        }

        $patient = $patient->groupBy('province', 'sex', 'age')
            ->orderBy('patient_count', 'DESC')
            ->get();

        return response()->json(['message' => 'Patient Report Requested', 'data' => $patient], 200);
    }

    public function caseReport(Request $request)
    {
        $case = mCase::with('region:city,elderly_population_ratio')
            ->select('city')
            ->selectRaw('SUM(confirmed) AS total_confirmed')
            ->groupBy('city')
            ->orderBy('total_confirmed', 'DESC')
            ->limit(5)
            ->get();

        return response()->json(['message' => 'Case Report Requested', 'data' => $case], 200);
    }
}
