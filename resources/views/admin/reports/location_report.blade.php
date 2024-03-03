@extends('admin.layout.index')

@section('title')
    Location Report
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- Basic layout-->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Location Report</h5>
                <div class="header-elements">
                    <div class="list-icons">
                        <a class="list-icons-item" data-action="collapse"></a>
                        <a class="list-icons-item" data-action="remove"></a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    
                    <div class="form-group col-md-4 district_fields" >
                        <label>Choose State</label>
                        <select id="state_id"  class="form-control select-search" >
                            <option selected disabled>Select State</option>
                            @foreach(App\Models\State::all() as $state)
                            <option value="{{$state->id}}">{{$state->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4 district_fields" >
                        <label>Choose District</label>
                        <select id="district_id"  class="form-control select-search" >
                            <option selected disabled>Select District</option>                    
                        </select>
                    </div>
                    <div class="form-group col-md-4 district_fields" >
                        <label>Choose Blocks</label>
                        <select   id="block_id" class="form-control select-search" >
                            <option disabled>Select Block</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4 staff_fields" >
                        <label>Choose Gram Panchyat</label>
                        <select id="gram_panchyat_id" class="form-control select-search" >
                            <option disabled>Select Gram Panchyat</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4 staff_fields" >
                        <label>Choose Village</label>
                        <select  id="village_id"  class="form-control select-search" >
                            <option disabled>Select Village</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!-- /basic layout -->

    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('#state_id').change(function(){
            let state_id = $(this).val();
            $.ajax({
                url: "{{route('admin.monthly_farming_report.get_districts')}}",
                method: 'post',
                data: {
                    state_id: state_id,
                },
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(response){
                    districts = response.districts;
                    $('#district_id').empty();
                    $('#district_id').append('<option disabled>Select Districts</option>');
                    for (i=0;i<districts.length;i++){
                        $('#district_id').append('<option value="'+districts[i].id+'">'+districts[i].name+'</option>');
                    }
                }
            });
        });
        $('#district_id').change(function(){
            let district_id = $(this).val();
            $.ajax({
                url: "{{route('admin.monthly_farming_report.get_blocks')}}",
                method: 'post',
                data: {
                    district_id: district_id,
                },
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(response){
                    blocks = response.blocks;
                    $('#block_id').empty();
                    $('#block_id').append('<option disabled>Select Blocks</option>');
                    for (i=0;i<blocks.length;i++){
                        $('#block_id').append('<option value="'+blocks[i].id+'">'+blocks[i].name+'</option>');
                    }
                }
            });
        });
        $('#block_id').change(function(){
            let block_id = $(this).val();
            $.ajax({
                url: "{{route('admin.monthly_farming_report.get_gram_panchyats')}}",
                method: 'post',
                data: {
                    block_id: block_id,
                },
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(response){
                    gram_panchyats = response.gram_panchyats;
                    $('#gram_panchyat_id').empty();
                    $('#gram_panchyat_id').append('<option disabled>Select Gram Panchyat</option>');
                    for (i=0;i<gram_panchyats.length;i++){
                        $('#gram_panchyat_id').append('<option value="'+gram_panchyats[i].id+'">'+gram_panchyats[i].name+'</option>');
                    }
                }
            });
        });
        $('#gram_panchyat_id').change(function(){
            let gram_panchyat_id = $(this).val();
            $.ajax({
                url: "{{route('admin.monthly_farming_report.get_villages')}}",
                method: 'post',
                data: {
                    gram_panchyat_id: gram_panchyat_id,
                },
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(response){
                    villages = response.villages;
                    $('#village_id').empty();
                    $('#village_id').append('<option disabled>Select Village</option>');
                    for (i=0;i<villages.length;i++){
                        $('#village_id').append('<option value="'+villages[i].id+'">'+villages[i].name+'</option>');
                    }
                }
            });
        });
    });
</script>
@endsection