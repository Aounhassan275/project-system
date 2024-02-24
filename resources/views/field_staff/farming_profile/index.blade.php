@extends('field_staff.layout.index')

@section('title')
    Manage Farming Profile
@endsection

@section('content')

<div class="card">
    
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Manage Farming Profile</h5>
        <div class="header-elements">
            <div class="list-icons">
                {{-- <a href="{{route('field_staff.farming_profile.create')}}" class="btn btn-primary text-right">Add New Farming Profile</a> --}}
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">

            <table class="table datatable-save-state">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Farmer Name</th>
                        <th>Farmer ID</th>
                        <th>Created By</th>
                        <th>Updated At</th>
                        <th>SHG Member</th>
                        <th>Total Annual Income</th>
                        <th>Annual Income From Fishery</th>
                        <th>Is Validate</th>
                        <th>Action</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($farmingProfiles  as $key => $farming_profile)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{@$farming_profile->respondent_master->name}}</td>
                        <td>{{@$farming_profile->respondent_master->farmer_id}}</td>
                        <td>{{@$farming_profile->user->name}}</td>
                        <td>{{@$farming_profile->updated_at}}</td>
                        <td>{{$farming_profile->shg_member?'Yes':'No'}}</td>
                        <td>{{$farming_profile->total_annual_income}}</td>
                        <td>{{$farming_profile->total_annual_income_from_fishery}}</td>
                        <td>
                            @if($farming_profile->is_validate)
                            <span class="badge badge-success">Yes</span>
                            @else 
                            <span class="badge badge-danger">No</span>
                            @endif
                        </td>
                        <td>
                            @if($farming_profile->is_validate)
                            <a href="{{route('field_staff.farming_profile.un_validate',$farming_profile->id)}}" class="btn btn-sm btn-danger float-right">Un-validate</a>
                            @else 
                            <a href="{{route('field_staff.farming_profile.validate',$farming_profile->id)}}" class="btn btn-sm btn-success float-right">Validated</a>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('field_staff.farming_profile.edit',$farming_profile->id)}}" class="btn btn-primary btn-sm">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection

@section('scripts')
@endsection