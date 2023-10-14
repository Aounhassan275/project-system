@extends('field_staff.layout.index')

@section('title')
    Manage Training Report
@endsection

@section('content')

<div class="card">
    
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Manage Training Report</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a href="{{route('field_staff.training_report.create')}}" class="btn btn-primary text-right">Add New Training Report</a>
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table datatable-save-state">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Objective</th>
                    <th>Type of Participants</th>
                    <th>Total Participants</th>
                    <th>Total Mens</th>
                    <th>Total Females</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach (Auth::user()->trainingReports  as $key => $training_report)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$training_report->name}}</td>
                    <td>{{$training_report->objective}}</td>
                    <td>{{$training_report->type_of_participants}}</td>
                    <td>{{$training_report->number_of_participants}}</td>
                    <td>{{$training_report->number_of_male}}</td>
                    <td>{{$training_report->number_of_female}}</td>
                    <td>
                        <a href="{{route('field_staff.training_report.edit',$training_report->id)}}" class="btn btn-primary btn-sm">Edit</a>
                    </td>
                    <td>
                        <form action="{{route('field_staff.training_report.destroy',$training_report->id)}}" method="POST">
                            @method('DELETE')
                            @csrf
                        <button class="btn btn-danger">Delete</button>
                        </form>
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