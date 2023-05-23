@extends('admin.layout.index')

@section('title')
    Add New Project
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
                            <label>Project Sponcered By</label>
                            <input name="sponcered_by" type="text" class="form-control" placeholder="Enter Project Sponcered By" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Project Start Date</label>
                            <input name="start_date" type="date" class="form-control" placeholder="Enter Project Sponcered By" required>
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
                        <div class="form-group col-md-6">
                            <label>Choose Blocks</label>
                            <select  name="block_ids[]" multiple class="form-control select-search" data-fouc required>
                                <option disabled>Select Block</option>
                                @foreach(App\Models\Block::all() as $block)
                                <option value="{{$block->id}}">{{$block->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Choose Gram Panchyat</label>
                            <select  name="gram_panchyat_ids[]" multiple class="form-control select-search" data-fouc required>
                                <option disabled>Select Gram Panchyat</option>
                                @foreach(App\Models\GramPanchyat::all() as $gram_panchyat)
                                <option value="{{$gram_panchyat->id}}">{{$gram_panchyat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Choose Village</label>
                            <select  name="village_ids[]" multiple class="form-control select-search" data-fouc required>
                                <option disabled>Select Village</option>
                                @foreach(App\Models\Village::all() as $village)
                                <option value="{{$village->id}}">{{$village->name}}</option>
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

@endsection

@section('scripts')
@endsection