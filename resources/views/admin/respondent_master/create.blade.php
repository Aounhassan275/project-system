@extends('admin.layout.index')

@section('title')
    Add New Respondent Master
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Add New Respondent Master</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{route('admin.respondent_master.store')}}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Name</label>
                            <input name="name" type="text" class="form-control" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Image</label>
                            <input name="image" type="file" class="form-control" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Choose Block</label>
                            <select  name="block_id"  class="form-control select-search" data-fouc required>
                                <option selected disabled>Select Block</option>
                                @foreach(App\Models\Block::all() as $block)
                                <option value="{{$block->id}}">{{$block->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Choose District</label>
                            <select  name="district_id"  class="form-control select-search" data-fouc required>
                                <option selected disabled>Select District</option>
                                @foreach(App\Models\District::all() as $district)
                                <option value="{{$district->id}}">{{$district->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Choose Gram Panchyat</label>
                            <select  name="gram_panchyat_id" class="form-control select-search" data-fouc required>
                                <option disabled>Select Gram Panchyat</option>
                                @foreach(App\Models\GramPanchyat::all() as $gram_panchyat)
                                <option value="{{$gram_panchyat->id}}">{{$gram_panchyat->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Choose Village</label>
                            <select  name="village_id" class="form-control select-search" data-fouc required>
                                <option disabled>Select Village</option>
                                @foreach(App\Models\Village::all() as $village)
                                <option value="{{$village->id}}">{{$village->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Choose Gender</label>
                            <select  name="gender" class="form-control select-search" data-fouc required>
                                <option disabled>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Age</label>
                            <input name="age" type="number" class="form-control" placeholder="Enter Age" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Choose Education</label>
                            <select  name="education" class="form-control select-search" data-fouc required>
                                <option disabled>Select Education</option>
                                <option value="Illiterate">Illiterate</option>
                                <option value="Primary">Primary</option>
                                <option value="HSLC">HSLC</option>
                                <option value="Graduate">Graduate</option>
                                <option value="PG">PG</option>
                                <option value="Technical Education">Technical Education</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Number Family Members</label>
                            <input name="number_family_member" type="number" class="form-control" placeholder="Enter Number Family Member" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Choose Caste</label>
                            <select  name="caste" class="form-control select-search" data-fouc required>
                                <option disabled>Select Caste</option>
                                <option value="ST">ST</option>
                                <option value="SC">SC</option>
                                <option value="OBC">OBC</option>
                                <option value="General">General</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Choose Religion</label>
                            <select  name="religion" class="form-control select-search" data-fouc required>
                                <option disabled>Select Religion</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Muslim">Muslim</option>
                                <option value="Christian">Christian</option>
                                <option value="Buddhist">Buddhist</option>
                                <option value="Others">Others</option>
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