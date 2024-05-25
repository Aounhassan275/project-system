<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\GramPanchyat;
use App\Models\User;
use App\Models\UserGramPanchyat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function monthlyProgress()
    {
        
        $executive_ids = User::where('role_id',3)->where('user_id',Auth::user()->id)->get()->pluck('id')->toArray();
        $field_staff_ids = User::whereIn('executive_id',$executive_ids)->get()->pluck('id')->toArray();
        $crpUserIds = User::whereIn('field_staff_id', $field_staff_ids)->get()->pluck('id')->toArray();
        
        return view('project.reports.monthly_progress_report',compact(
            'crpUserIds',
        ));
    }
    public function monthlyTraining()
    {
        
        $executive_ids = User::where('role_id',3)->where('user_id',Auth::user()->id)->get()->pluck('id')->toArray();
        $field_staff_ids = User::whereIn('executive_id',$executive_ids)->get()->pluck('id')->toArray();
        $crpUserIds = User::whereIn('field_staff_id', $field_staff_ids)->get()->pluck('id')->toArray();
        return view('project.reports.monthly_training_report',compact(
            'crpUserIds',
        ));
    }
    public function basicFarmerProfile()
    {
        
        $executive_ids = User::where('role_id',3)->where('user_id',Auth::user()->id)->get()->pluck('id')->toArray();
        $field_staff_ids = User::whereIn('executive_id',$executive_ids)->get()->pluck('id')->toArray();
        $crpUserIds = User::whereIn('field_staff_id', $field_staff_ids)->get()->pluck('id')->toArray();
        $userGramPanchyatIds = UserGramPanchyat::whereIn('user_id',$crpUserIds)->get()->pluck('gram_panchyat_id')->toArray();
        $gramPanchyats = GramPanchyat::whereIn('id',$userGramPanchyatIds)->get();
        return view('project.reports.report_basic_farmer_profile',compact(
            'gramPanchyats',
            'crpUserIds',
        ));   
    }
}
