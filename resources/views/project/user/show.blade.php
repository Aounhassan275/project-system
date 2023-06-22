@extends('project.layout.index')

@section('title')
    {{$user->name}} Project User
@endsection

@section('content')


				<!-- Inner container -->
				<div class="d-md-flex align-items-md-start">

					<!-- Left sidebar component -->
					<div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-left wmin-300 border-0 shadow-0 sidebar-expand-md">

						<!-- Sidebar content -->
						<div class="sidebar-content">

							<!-- Navigation -->
							<div class="card">
								<div class="card-body bg-indigo-400 text-center card-img-top" style="background-image: url({{asset('user_asset/global_assets/images/backgrounds/panel_bg.png')}}); background-size: contain;">
									<div class="card-img-actions d-inline-block mb-3">
										@if($user->image)
										<img class="img-fluid rounded-circle" src="{{asset($user->image)}}" width="170" height="170" alt="">
										@else 
										<img class="img-fluid rounded-circle" src="{{asset('user_asset/global_assets/images/placeholders/placeholder.jpg')}}" width="170" height="170" alt="">
										@endif
										<div class="card-img-actions-overlay rounded-circle">
											<a href="#" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
												<i class="icon-plus3"></i>
											</a>
											<a href="user_pages_profile.html" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2">
												<i class="icon-link"></i>
											</a>
										</div>
									</div>

						    		<h6 class="font-weight-semibold mb-0">{{$user->name}}</h6>
						    		<span class="d-block opacity-75">{{$user->email}}</span>
									
									@if($user->is_verified)
										<span class="badge badge-success">Verified</span>
									@else
										<span class="badge badge-danger">Not Verified</span>
									@endif
									
									@if($user->is_active)
										<span class="badge badge-success">Active</span>
									@else
										<span class="badge badge-danger">Pending</span>
									@endif
						    	</div>

								<div class="card-body p-0">
									<ul class="nav nav-sidebar mb-2">
										<li class="nav-item-header">Navigation</li>
										<li class="nav-item">
											<a href="#profile" class="nav-link active" data-toggle="tab">
												<i class="icon-user"></i>
												 Basic profile
											</a>
										</li>
										<li class="nav-item-divider"></li>
										<li class="nav-item">
											<a href="{{route('project.user.index')}}" class="nav-link" data-toggle="tab">
												<i class="icon-switch2"></i>
												Go Back To User Project Page
											</a>
										</li>
									</ul>
								</div>
							</div>
							<!-- /navigation -->
						</div>
						<!-- /sidebar content -->

					</div>
					<!-- /left sidebar component -->


					<!-- Right content -->
					<div class="tab-content w-100 overflow-auto">
						<div class="tab-pane fade active show" id="profile">


							<!-- Profile info -->
							<div class="card">
								<div class="card-header header-elements-inline">
									<h5 class="card-title">Profile information</h5>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
					                		<a class="list-icons-item" data-action="reload"></a>
					                		<a class="list-icons-item" data-action="remove"></a>
					                	</div>
				                	</div>
								</div>

								<div class="card-body">
									<form action="{{route('project.user.update',$user->id)}}" method="post" enctype="multipart/form-data" >
										@method('PUT')
										@csrf
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Username</label>
													<input type="text" name="name" value="{{$user->name}}" class="form-control">
												</div>
												<div class="col-md-6">
													<label>Email</label>
													<input type="email" value="{{$user->email}}" name="email" readonly class="form-control">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<div class="col-md-6">
													<label>Employee Code</label>
													<input type="text" name="employee_code" value="{{$user->employee_code}}" class="form-control">
												</div>
												<div class="col-md-6">
													<label>Contact</label>
													<input type="text" value="{{$user->phone}}" name="phone" class="form-control">
												</div>
											</div>
										</div>

											<div class="row">
												<div class="form-group col-md-6">
													<label>Password <small style="color:red;">(Leave It Blank if you don't want to change)</small></label>
													<input type="password" name="password" placeholder="Password" class="form-control">
												</div>
												<div class="form-group col-md-6">
													<label>Upload profile image</label>
				                                    <input type="file" class="form-input-styled" name="image" data-fouc>
												</div>
												<div class="form-group col-md-4 district_fields">
													<label>Choose State</label>
													<select  name="state_id"  class="form-control select-search" >
														<option selected disabled>Select State</option>
														@foreach(App\Models\State::all() as $state)
														<option  @if($user->state_id == $state->id) selected @endif value="{{$state->id}}">{{$state->name}}</option>
														@endforeach
													</select>
												</div>
												<div class="form-group col-md-4 district_fields" >
													<label>Choose District</label>
													<select  name="district_id"  class="form-control select-search" >
														<option selected disabled>Select District</option>
														@foreach(App\Models\District::all() as $district)
														<option @if($user->district_id == $district->id) selected @endif value="{{$district->id}}">{{$district->name}}</option>
														@endforeach
													</select>
												</div>
												<div class="form-group col-md-4 district_fields" >
													<label>Choose Block</label>
													<select  name="block_ids[]" multiple class="form-control select-search" >
														<option disabled>Select Gram Panchyat</option>
														@foreach(App\Models\Block::all() as $block)
														<option @if(in_array($block->id,$user_blocks)) selected @endif  value="{{$block->id}}">{{$block->name}}</option>
														@endforeach
													</select>
												</div>
												<div class="form-group col-md-4 staff_fields" @if($user->role_id == 3) style="display:none;" @endif>
													<label>Choose Gram Panchyat</label>
													<select  name="gram_panchyat_ids[]" multiple class="form-control select-search" >
														<option disabled>Select Gram Panchyat</option>
														@foreach(App\Models\GramPanchyat::all() as $gram_panchyat)
														<option @if(in_array($gram_panchyat->id,$user_gram_panchyats)) selected @endif value="{{$gram_panchyat->id}}">{{$gram_panchyat->name}}</option>
														@endforeach
													</select>
												</div>
												<div class="form-group col-md-4 staff_fields" @if($user->role_id == 3) style="display:none;" @endif>
													<label>Choose Village</label>
													<select  name="village_ids[]" multiple class="form-control select-search" >
														<option disabled>Select Village</option>
														@foreach(App\Models\Village::all() as $village)
														<option @if(in_array($village->id,$user_gram_panchyats)) selected @endif value="{{$village->id}}">{{$village->name}}</option>
														@endforeach
													</select>
												</div>
											</div>

				                        <div class="text-right">
				                        	<button type="submit" class="btn btn-primary">Save changes</button>
				                        </div>
									</form>
								</div>
							</div>
							<!-- /profile info -->

					    </div>
					</div>
					<!-- /right content -->

				</div>
				<!-- /inner container -->
@endsection
@section('scripts')
<script>
    $(document).ready(function(){
        $('#role_id').change(function(){
            role_id = this.value;
            if(role_id == 3)
            {
                $('.district_fields').show();
                $('.staff_fields').hide();
            }else if(role_id == 4)
            {
                $('.district_fields').show();
                $('.staff_fields').show();
            }
        });
    });
</script>
@endsection
