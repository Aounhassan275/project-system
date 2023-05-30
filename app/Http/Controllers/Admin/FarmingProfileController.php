<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FarmingIncome;
use App\Models\FarmingProfile;
use App\Models\FarmingYearling;
use Exception;
use Illuminate\Http\Request;

class FarmingProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.farming_profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.farming_profile.create');
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
            $profile = FarmingProfile::create($request->all());
            FarmingYearling::create([
                'year' => $request->year,
                'figerlings' => $request->figerlings,
                'yearlings' => $request->yearlings,
                'farming_profile_id' => $profile->id
            ]);
            FarmingIncome::create([
                'year' => $request->fish_sold_year,
                'quantity' => $request->fish_sold_quantity,
                'rate' => $request->fish_sold_rate,
                'amount' => $request->fish_sold_amount,
                'farming_profile_id' => $profile->id
            ]);
            toastr()->success('Farming Profile Added Successfully');
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
     * @param  \App\Models\FarmingProfile  $farmingProfile
     * @return \Illuminate\Http\Response
     */
    public function show(FarmingProfile $farmingProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FarmingProfile  $farmingProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(FarmingProfile $farmingProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FarmingProfile  $farmingProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FarmingProfile $farmingProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FarmingProfile  $farmingProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $farmingProfile = FarmingProfile::find($id);
        $farmingProfile->delete();
        toastr()->success('Farming Profile Deleted successfully');
        return redirect()->back();
    }
}
