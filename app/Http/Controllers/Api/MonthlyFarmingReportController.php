<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MonthlyFarmingReport;
use Exception;
use Illuminate\Http\Request;

class MonthlyFarmingReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $monthlyFarmingReports = MonthlyFarmingReport::select('monthly_farming_reports.*')
            ->with(
                'respondent_master'
                )->get();

            return response([
                "monthlyFarmingReports" => $monthlyFarmingReports,
            ], 200);
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $monthlyFarmingReport = MonthlyFarmingReport::create($request->all());
            return response([
                "monthlyFarmingReport" => $monthlyFarmingReport,
            ], 200);
        }catch (Exception $e)
        {
            return response([
                "success" => false,
                "message" => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MonthlyFarmingReport  $monthlyFarmingReport
     * @return \Illuminate\Http\Response
     */
    public function show(MonthlyFarmingReport $monthlyFarmingReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MonthlyFarmingReport  $monthlyFarmingReport
     * @return \Illuminate\Http\Response
     */
    public function edit(MonthlyFarmingReport $monthlyFarmingReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MonthlyFarmingReport  $monthlyFarmingReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MonthlyFarmingReport $monthlyFarmingReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MonthlyFarmingReport  $monthlyFarmingReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(MonthlyFarmingReport $monthlyFarmingReport)
    {
        //
    }
}
