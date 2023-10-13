<?php

namespace App\Http\Controllers\FieldStaff;

use App\Helpers\Helpers;
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
        return view('field_staff.monthly_farming_report.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('field_staff.monthly_farming_report.create');
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
            MonthlyFarmingReport::create($request->all());
            toastr()->success('Monthly Farming Report Added Successfully');
            return redirect()->back();
        }catch (Exception $e)
        {
            toastr()->error($e->getMessage());
            return redirect()->back();
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
    public function edit($id)
    {
        $monthly_farming_report = MonthlyFarmingReport::find($id);
        $have_months = MonthlyFarmingReport::where('respondent_master_id',$monthly_farming_report->respondent_master_id)->pluck('month')->toArray();
        $months = Helpers::getMonths();
        $available_months = [];
        foreach($months as $month)
        {
            if(!in_array($month,$have_months))
            {
                $available_months[] = $month;
            }
        }
        return view('field_staff.monthly_farming_report.edit',compact('monthly_farming_report','available_months'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MonthlyFarmingReport  $monthlyFarmingReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $monthly_farming_report = MonthlyFarmingReport::find($id);
            $monthly_farming_report->update($request->all());
            toastr()->success('Monthly Farming Report Updated Successfully');
            return redirect()->back();
        }catch (Exception $e)
        {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MonthlyFarmingReport  $monthlyFarmingReport
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $monthly_farming_report = MonthlyFarmingReport::find($id);
        $monthly_farming_report->delete();
        toastr()->success('Monthly Farming Report Deleted successfully');
        return redirect()->back();
    }
    
    public function getMonths(Request $request)
    {
        $have_months = MonthlyFarmingReport::where('respondent_master_id',$request->master_id)->pluck('month')->toArray();
        $months = Helpers::getMonths();
        $available_months = [];
        foreach($months as $month)
        {
            if(!in_array($month,$have_months))
            {
                $available_months[] = $month;
            }
        }
        return response()->json([
            'available_months' => $available_months,
        ]);
    }
}
