
@extends('project.layout.index')
@section('title')
    Monthly Progress Report
@endsection

@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card">
                    
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Summary of Whole Project Monthly Progress Report (Year {{App\Helpers\Helpers::yearRange()}}) </h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-center">Month</th>
                            <th class="text-center">Number of registered Farmers under Fishery Project</th>
                            <th class="text-center">Numbers of Famers monthly report submitted</th>
                            <th class="text-center">Percentage of Farmers cleaning pond in the month</th>
                            <th class="text-center">Percentage of Farmer applying lime in the month</th>
                            <th class="text-center">Percentage of Farmer testing water quality in the month</th>
                            <th class="text-center">Percentage of Farmers applying feed in the month</th>
                            <th class="text-center">Average total expenditure by the farmer on fishery activity in the month</th>
                            <th class="text-center">Average income of Fishery Farmer from Fishery activity in the Month</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (App\Helpers\Helpers::getCurrentYear()  as $key => $month)
                        
                        @php 
                        $monthylReports = Auth::user()->getFarmingDetailByMonth($month,$crpUserIds);
                        // dd($monthylReports['currentMonthFarmingProfiles']);
                        
                        @endphp
                        <tr>
                            <td class="text-center">{{$month}}</td>
                            <td class="text-center">{{ $monthylReports['memberRegisterInMonth']}}</td>
                            <td class="text-center">{{ $monthylReports['currentMonthFarmingReports'] }}</td>
                            <td class="text-center">{{ number_format($monthylReports['percentageFarming'], 2) }}%</td>
                            <td class="text-center">{{ number_format($monthylReports['percentageLime'], 2) }}%</td>
                            <td class="text-center">{{ number_format($monthylReports['percentageTestingWater'], 2) }}%</td>
                            <td class="text-center">{{ number_format($monthylReports['percentageFeed'], 2) }}%</td>
                            <td class="text-center">0</td>
                            <td class="text-center">{{ number_format($monthylReports['averageincomeFishery2'], 2) }}</td>
                         
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@endsection
