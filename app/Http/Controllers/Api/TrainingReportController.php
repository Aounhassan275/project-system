<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TrainingReport;
use Illuminate\Http\Request;

class TrainingReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $training_reports = TrainingReport::select('training_reports.*')
            ->with(
                'user',
                'state',
                'district',
                'block',
                'village',
                )->get();

            return response([
                "training_reports" => $training_reports,
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
        try {
            $this->validate($request,[
                'name' => 'required',
                'user_id' => 'required',
            ]);
            $training_report = TrainingReport::create($request->all());
            return response([
                "success" => true,
                "training_report" => $training_report,
            ], 200);
        } catch (\Exception $e) {
            return response([
                "success" => false,
                "error" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrainingReport  $trainingReport
     * @return \Illuminate\Http\Response
     */
    public function show(TrainingReport $trainingReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrainingReport  $trainingReport
     * @return \Illuminate\Http\Response
     */
    public function edit(TrainingReport $trainingReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrainingReport  $trainingReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrainingReport $trainingReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrainingReport  $trainingReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrainingReport $trainingReport)
    {
        //
    }
}
