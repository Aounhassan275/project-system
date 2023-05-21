@extends('admin.layout.index')

@section('title')
    Project Users
@endsection

@section('content')

<div class="card">
    <div class="table-responsive">
        <table class="table datatable-save-state">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Profile Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Verified</th>
                    <th>Status</th>
                    <th>Action</th>
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
                    <td>
                        @if($user->is_verified)
                            <span class="badge badge-success">Verified</span>
                        @else
                            <span class="badge badge-danger">Not Verified</span>
                        @endif
                    </td>
                    <td>
                        @if($user->is_active)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-danger">Pending</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('admin.user.show',$user->id)}}" class="btn btn-primary btn-sm">Show</a>
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
