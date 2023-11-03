@extends('executive.layout.index')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="row">
   <div class="col-sm-4 col-xl-4">
        <a href="#">
            <div class="card card-body bg-blue-400 has-bg-image">
                <div class="media">
                    <div class="mr-3 align-self-center">
                        <i class="icon-stack-picture icon-3x opacity-75"></i>
                    </div>
                    <div class="media-body text-right">
                    <h3 class="mb-0">{{Auth::user()->projects->count()}}</h3>
                        <span class="text-uppercase font-size-xs">Total Projects Assigned</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-4 col-xl-4">
        <a href="#">
            <div class="card card-body bg-danger-400 has-bg-image">
                <div class="media">
                    <div class="mr-3 align-self-center">
                        <i class="icon-stack-picture icon-3x opacity-75"></i>
                    </div>
                    <div class="media-body text-right">
                    <h3 class="mb-0">{{Auth::user()->projects->count()}}</h3>
                        <span class="text-uppercase font-size-xs">My Task</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-sm-4 col-xl-4">
        <a href="#">
            <div class="card card-body bg-green-400 has-bg-image">
                <div class="media">
                    <div class="mr-3 align-self-center">
                        <i class="icon-stack-picture icon-3x opacity-75"></i>
                    </div>
                    <div class="media-body text-right">
                    <h3 class="mb-0">{{Auth::user()->projects->count()}}</h3>
                        <span class="text-uppercase font-size-xs">Trainings</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection
@section('scripts')
@endsection
