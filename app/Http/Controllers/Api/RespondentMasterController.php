<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RespondentMaster;
use Illuminate\Http\Request;

class RespondentMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $respondent_masters = RespondentMaster::select('respondent_masters.*')->with(
                'block',
                'district',
                'gram_panchyat',
                'village',
                'farming_profile'
                )->get();

            return response([
                "respondent_masters" => $respondent_masters,
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
                'district_id' => 'required',
            ]);
            $randomNumber = random_int(100000, 999999);
            $request->merge([
                'farmer_id' => 'SDS-'.$randomNumber
            ]);
            $respondent_master = RespondentMaster::create($request->all());
            return response([
                "respondent_master" => $respondent_master,
            ], 200);
        } catch (\Exception $e) {
            return response([
                "error" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RespondentMaster  $respondentMaster
     * @return \Illuminate\Http\Response
     */
    public function show(RespondentMaster $respondentMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RespondentMaster  $respondentMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(RespondentMaster $respondentMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RespondentMaster  $respondentMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RespondentMaster $respondentMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RespondentMaster  $respondentMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(RespondentMaster $respondentMaster)
    {
        //
    }
}
