@extends('project.layout.index')
@section('title')
Manage Monthly Farming Report
@endsection

@section('content')
    <div class="card">

        <div class="card-header header-elements-inline">
            <h5 class="card-title">Manage Monthly Farming Report</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table datatable-save-state">
                <thead>
                    <tr>
                        <th>SL.No</th>
                        <th>Month</th>
                        <th>Farmer Name</th>
                        <th>Date Of Update</th>
                        <th>Time Of Update</th>
                        <th>Location</th>
                        <th>Action</th>                      
                    </tr>
                </thead>
                <tbody>
                    @foreach (App\Models\MonthlyFarmingReport::all()  as $key => $monthly_farming_report)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$monthly_farming_report->month}}</td>
                        <td>{{@$monthly_farming_report->respondent_master->name .'('.@$monthly_farming_report->respondent_master->farmer_id.')'}}</td>
                        <td>{{@$monthly_farming_report->date_of_update?\Carbon\Carbon::parse($monthly_farming_report->date_of_update)->format('d M,Y'):''}}</td>
                        <td>{{@$monthly_farming_report->date_of_update?\Carbon\Carbon::parse($monthly_farming_report->date_of_update)->format('H i A'):''}}</td>
                        <td>{{@$monthly_farming_report->location}}</td>
                        <td>
                            <a href="{{ route('project.report.monthly-framing-view',$monthly_farming_report->id) }}" class="btn btn-primary btn-sm">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    
        </div>
    </div>
@endsection
@section('scripts')
@endsection
