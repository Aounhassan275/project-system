<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use App\Models\FarmingProfile;
use App\Models\MonthlyFarmingReport;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Helpers;

class DashboardController extends Controller
{
    public function index()
    {
        $executive_ids = User::where('role_id', 3)->where('user_id', Auth::user()->id)->get()->pluck('id')->toArray();
        $field_staff_ids = User::whereIn('executive_id', $executive_ids)->get()->pluck('id')->toArray();
        $total_respondent_masters = User::query()
            ->join('respondent_masters', 'users.id', '=', 'respondent_masters.user_id')
            ->whereIn('users.field_staff_id', $field_staff_ids)
            ->select('respondent_masters.*')
            ->count();
        $farmingProfiles = User::query()->join('farming_profiles', 'users.id', '=', 'farming_profiles.user_id')
            ->whereIn('users.field_staff_id', $field_staff_ids)
            ->select('farming_profiles.*')
            ->count();
        $monthlyFarmingReports = User::query()->join('monthly_farming_reports', 'users.id', '=', 'monthly_farming_reports.user_id')
            ->whereIn('users.field_staff_id', $field_staff_ids)
            ->select('monthly_farming_reports.*')
            ->count();
        $trainingReports = User::query()->join('training_reports', 'users.id', '=', 'training_reports.user_id')
            ->whereIn('users.field_staff_id', $field_staff_ids)
            ->select('training_reports.*')
            ->count();
        $currentYear = Carbon::now()->year;
        $previousYear = $currentYear - 1;

        $months = collect();
        $registrationsCurrentYear = collect();
        $registrationsPreviousYear = collect();
        $currentMonthFarmingReports = collect();

        $pondCleaningPercentages = collect();
        $limeApplyingPercentages = collect();
        $waterQualityPercentages = collect();
        $feedApplyingPercentages = collect();

        foreach (range(1, 12) as $monthNumber) {
            $monthName = Carbon::create($currentYear, $monthNumber, 1)->format('F');
            $months->push($monthName);

            $registrationsCurrentYear->push(
                FarmingProfile::whereYear('created_at', $currentYear)
                    ->whereMonth('created_at', $monthNumber)
                    ->count()
            );

            $registrationsPreviousYear->push(
                FarmingProfile::whereYear('created_at', $previousYear)
                    ->whereMonth('created_at', $monthNumber)
                    ->count()
            );

            $currentMonthFarmingReportsCount = MonthlyFarmingReport::where('month', $monthName)->count();
            $currentMonthFarmingReports->push($currentMonthFarmingReportsCount);

            $pondCleaning = MonthlyFarmingReport::where('month', $monthName)
                ->where('is_pond_preparation', 1)->count();
            $pondCleaningPercentages->push($currentMonthFarmingReportsCount > 0 ? ($pondCleaning / $currentMonthFarmingReportsCount) * 100 : 0);

            $limeApplying = MonthlyFarmingReport::where('month', $monthName)
                ->where('is_lime_applied', 1)->count();
            $limeApplyingPercentages->push($currentMonthFarmingReportsCount > 0 ? ($limeApplying / $currentMonthFarmingReportsCount) * 100 : 0);

            $waterQualityTesting = MonthlyFarmingReport::where('month', $monthName)
                ->where('is_hydrological', 1)->count();
            $waterQualityPercentages->push($currentMonthFarmingReportsCount > 0 ? ($waterQualityTesting / $currentMonthFarmingReportsCount) * 100 : 0);

            $feedApplying = MonthlyFarmingReport::where('month', $monthName)
                ->where('is_providing_feed', 1)->count();
            $feedApplyingPercentages->push($currentMonthFarmingReportsCount > 0 ? ($feedApplying / $currentMonthFarmingReportsCount) * 100 : 0);
        }

        return view('project.dashboard.index', compact(
            'total_respondent_masters',
            'farmingProfiles',
            'trainingReports',
            'monthlyFarmingReports',
            'months',
            'currentYear',
            'previousYear',
            'registrationsCurrentYear',
            'registrationsPreviousYear',
            'currentMonthFarmingReports',
            'pondCleaningPercentages',
            'limeApplyingPercentages',
            'waterQualityPercentages',
            'feedApplyingPercentages',
        ));
    }
    public function framingProfile()
    {
        $kcc_account = FarmingProfile::where('has_hh_kcc_account', 1)->count();
        $bank_account = FarmingProfile::where('has_hh_bank_account', 1)->count();
        $mgnrega_card = FarmingProfile::where('has_hh_mgnrega_card', 1)->count();
        $bpl_no = FarmingProfile::where('has_hh_bpl_no', 1)->count();
        $pb_member = FarmingProfile::where('fish_pb_member', 1)->count();
        $shg_member = FarmingProfile::where('shg_member', 1)->count();
        $nursery_farmer = FarmingProfile::where('involvement_in_fishery', 'Nursery Farmer')->count();
        $grower = FarmingProfile::where('involvement_in_fishery', 'Grower')->count();
        $both_count = FarmingProfile::where('involvement_in_fishery', 'Both')->count();
        $totalWaterBody = FarmingProfile::sum('total_water_body');
        $lease_out = FarmingProfile::sum('lease_out_water_body');
        $lease_in = FarmingProfile::sum('lease_in_water_body');
        $own_water = FarmingProfile::sum('own_water_body');
        $aereator = FarmingProfile::where('aereator', 1)->count();
        $fishing_net = FarmingProfile::where('fishing_net', 1)->count();
        $tube_well = FarmingProfile::where('have_tube_well', 1)->count();
        $pump_set = FarmingProfile::where('have_pump_set', 1)->count();
        $cow_dung = FarmingProfile::where('have_apply_cow_dung', 1)->count();
        $applied_lime = FarmingProfile::where('have_applied_lime', 1)->count();
        $black_soil = FarmingProfile::where('have_remove_black_soil', 1)->count();
        $pond_preparation = MonthlyFarmingReport::where('is_pond_preparation',1)->count();
        return view('project.dashboard.framing_profile', compact(
            'kcc_account',
            'bank_account',
            'bpl_no',
            'mgnrega_card',
            'pb_member',
            'shg_member',
            'nursery_farmer',
            'grower',
            'both_count',
            'totalWaterBody',
            'lease_out',
            'lease_in',
            'own_water',
            'aereator',
            'fishing_net',
            'tube_well',
            'pump_set',
            'cow_dung',
            'applied_lime',
            'black_soil',
            'pond_preparation'
        ));
    }
}
