@extends('field_staff.layout.index')

@section('title')
    All Users
@endsection

@section('content')

<div class="card">
    
    <div class="card-header header-elements-inline">
        <h5 class="card-title">All Users</h5>
        <div class="header-elements">
            <div class="list-icons">
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
                        <th>Profile Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile No</th>
                        <th>Villages</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($users  as $key => $user)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>
                            @if($user->image)
                            <img src="{{asset($user->image)}}" height="100" width="100" alt="">
                            @endif
                        </td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>
                            @if($user->is_active)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-danger">Pending</span>
                            @endif
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
