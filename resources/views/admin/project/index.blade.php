@extends('admin.layout.index')

@section('title')
    Add Project
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Add New Project</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{route('admin.project.store')}}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Project Name</label>
                            <input name="name" type="text" class="form-control" placeholder="Enter Project Name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Project Duration</label>
                            <input name="duration" type="text" class="form-control" placeholder="Enter Project Duration" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Choose State</label>
                            <select  name="state_id"  class="form-control select-search" data-fouc required>
                                <option selected disabled>Select State</option>
                                @foreach(App\Models\State::all() as $state)
                                <option value="{{$state->id}}">{{$state->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Choose District</label>
                            <select  name="district_id"  class="form-control select-search" data-fouc required>
                                <option selected disabled>Select District</option>
                                @foreach(App\Models\District::all() as $district)
                                <option value="{{$district->id}}">{{$district->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Create <i class="icon-paperplane ml-2"></i></button>
                    </div>
                    
                </form>
            </div>
        </div>
        <!-- /basic layout -->

    </div>
</div>

<div class="card">

    <table class="table datatable-save-state">
        <thead>
            <tr>
                <th>#</th>
                <th>Project Name</th>
                <th>Project Duration</th>
                <th>Project State Name</th>
                <th>Project District Name</th>
                <th>Action</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach (App\Models\Project::all()  as $key => $project)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$project->name}}</td>
                <td>{{$project->duration}}</td>
                <td>{{$project->state->name}}</td>
                <td>{{$project->district->name}}</td>
                <td>
                    <button data-toggle="modal" data-target="#edit_modal" name="{{$project->name}}" 
                        duration="{{$project->duration}}" district_id="{{$project->district_id}}" state_id="{{$project->state_id}}" id="{{$project->id}}" class="edit-btn btn btn-primary">Edit</button>
                </td>
                <td>
                    <form action="{{route('admin.project.destroy',$project->id)}}" method="POST">
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

<div id="edit_modal" class="modal fade">
    <div class="modal-dialog">
        <form id="updateForm" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Update Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Project Name</label>
                        <input class="form-control" type="text" id="name" name="name" placeholder="Enter name" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Project Duration</label>
                        <input class="form-control" type="text" id="duration" name="duration" placeholder="Enter name" required>
                    </div>
                    <div class="form-group">
                        <label>Choose State</label>
                        <select  name="state_id" id="state_id" class="form-control select-search" data-fouc required>
                            <option selected disabled>Select State</option>
                            @foreach(App\Models\State::all() as $state)
                            <option value="{{$state->name}}">{{$state->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Choose District</label>
                        <select  name="district_id" id="district_id" class="form-control select-search" data-fouc required>
                            <option selected disabled>Select District</option>
                            @foreach(App\Models\District::all() as $district)
                            <option value="{{$district->name}}">{{$district->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('.edit-btn').click(function(){
            let name = $(this).attr('name');
            let state_id = $(this).attr('state_id');
            let district_id = $(this).attr('district_id');
            let duration = $(this).attr('duration');
            let id = $(this).attr('id');
            $('#duration').val(duration);
            $('#district_id').val(district_id);
            $('#state_id').val(state_id);
            $('#name').val(name);
            $('#id').val(id);
            $('#updateForm').attr('action','{{route('admin.project.update','')}}' +'/'+id);
        });
    });
</script>
@endsection