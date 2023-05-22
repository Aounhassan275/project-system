@extends('admin.layout.index')

@section('title')
    Dashboard
@endsection

@section('content')


<div class="row">
    <div class="col-md-12">
            <div class="card card-body">
                <div class="media mb-0">
                    <div class="media-body">
                        <h3 class="font-weight-semibold mb-0 text-center">
                            Project System
                        </h3>
                    </div>
                </div>
            </div>
            
    </div>
</div>
<div class="row">
    
    <div class="col-sm-4 col-xl-4">
        <a href="{{route('admin.user.index')}}">
            <div class="card card-body bg-blue-400 has-bg-image">
                <div class="media">

                    <div class="mr-3 align-self-center">
                        <i class="icon-unlink2 icon-3x opacity-75"></i>
                    </div>
                    <div class="media-body text-right">
                    <h3 class="mb-0">{{App\Models\User::where('role_id',2)->count()}}</h3>
                        <span class="text-uppercase font-size-xs">Total Project Managers</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
@section('scripts')
@endsection
