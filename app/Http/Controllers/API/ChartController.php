<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\mPolicy;
use App\Models\mPatientInfo;
use App\Models\mCase;

class ChartController extends Controller
{
    public function policyChart(Request $request)
    {
        $policies = mPolicy::select('type')
            ->selectRaw('ROUND(AVG(IF(UNIX_TIMESTAMP(end_date) = 0, DATEDIFF(CURDATE(), start_date), DATEDIFF(end_date, start_date))),2 ) AS avg_count_days')
            ->groupBy('type')
            ->orderBy('avg_count_days', 'DESC')
            ->get();


        foreach($policies as $policy)
        {
            $xAxis[] = $policy->type;
            $yAxis[] = $policy->avg_count_days;
        };

        $data = (object)['xAxis' => $xAxis, 'yAxis' => $yAxis];

        return response()->json(['message' => 'Policy Chart Requested', 'data' => $data], 200);
    }

    public function caseChart(Request $request)
    {
        $cases = mCase::select('city AS name')
            ->selectRaw('SUM(confirmed) AS value')
            ->groupBy('name')
            ->orderBy('value', 'DESC')
            ->limit(5)
            ->get();

        return response()->json(['message' => 'Case Chart Requested', 'data' => $cases], 200);
    }
}
