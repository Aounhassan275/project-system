<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>{{Auth::user()->name}} Admin Panel | PROJECT SYSTEM</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/assets/css/toastr.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{asset('user_asset/global_assets/js/main/jquery.min.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{asset('user_asset/global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/plugins/extensions/jquery_ui/interactions.min.js')}}"></script>

	<script src="{{asset('user_asset/global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/demo_pages/form_select2.js')}}"></script>

	<script src="{{asset('user_asset/global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script src="{{asset('user_asset/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    
	<script src="{{asset('user_asset/global_assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/plugins/ui/moment/moment.min.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/plugins/pickers/daterangepicker.js')}}"></script>

	<script src="{{asset('user_asset/assets/js/app.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/demo_pages/datatables_basic.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/demo_pages/form_layouts.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/demo_pages/dashboard.js')}}"></script>
	<!-- /theme JS files -->
	
	<!-- Theme JS files -->

	<script src="{{asset('user_asset/global_assets/js/demo_pages/job_list.js')}}"></script>
	<!-- /theme JS files -->

	@yield('styles')
</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark">
		<div class="navbar-brand">
			<a href="{{url('/')}}" class="text-light">
				<h3 class="m-0"><b>Admin Panel Menu</b></h3>
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>
			</ul>

			<span class="badge bg-success ml-md-3 mr-md-auto">Online</span>

			<ul class="navbar-nav">



				<li class="nav-item dropdown dropdown-user">
					<a href="" class="navbar-nav-link d-flex align-items-center dropdown-toggle" data-toggle="dropdown">
						<img src="" class="rounded-circle mr-2" height="34" alt="">
						<span>{{Auth::user()->name}}</span>
					</a>

					<div class="dropdown-menu dropdown-menu-right">
						<a href="{{route('logout')}}" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-user">
					<div class="card-body">
						<div class="media">
							<div class="mr-3">
								{{--  <a href="{{asset(Auth::user()->image)}}"><img src="{{asset(Auth::user()->image)}}" width="38" height="38" class="rounded-circle" alt=""></a>  --}}
							</div>

							<div class="media-body">
								<div class="media-title font-weight-semibold">{{Auth::user()->name}}</div>
								<div class="font-size-xs opacity-50">MLU
								</div>
							</div>

							<div class="ml-3 align-self-center">
								<a href="#" class="text-white"><i class="icon-cog3"></i></a>
							</div>
						</div>
					</div>
				</div>
				<!-- /user menu -->


				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">
							<!-- Main -->
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Admin Panel</div> <i class="icon-menu" title="Main"></i></li>
						<li class="nav-item">
							<a href="{{route('admin.dashboard.index')}}" class="nav-link {{Request::is('admin/dashboard')?'active':''}}">
								<i class="icon-home4"></i>
								<span>Dashboard</span>
							</a>
						</li>
						<li class="nav-item nav-item-submenu {{Request::is('admin/user*')?'nav-item-open':''}}">
							<a href="#" class="nav-link"><i class="icon-cart-remove"></i> <span>Users</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts" style="{{Request::is('admin/user*') ?'display:block':''}}">
								<li class="nav-item"><a href="{{route('admin.user.index')}}" class="nav-link {{Request::is('admin/user')?'active':''}}">Project User</a></li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="{{route('admin.project.index')}}" class="nav-link {{Request::is('admin/project')?'active':''}}">
								<i class="icon-home4"></i>
								<span>Project</span>
							</a>
						</li>
						<li class="nav-item nav-item-submenu {{Request::is('admin/country*') || Request::is('admin/state*') || Request::is('admin/city*') || Request::is('admin/district*')  || Request::is('admin/police_station*') ?'nav-item-open':''}}">
							<a href="#" class="nav-link"><i class="icon-map"></i> <span>Locations</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Layouts" style="{{Request::is('admin/country*') || Request::is('admin/state*') || Request::is('admin/city*') || Request::is('admin/district*') || Request::is('admin/police_station*')?'display:block':''}}">
								<li class="nav-item"><a href="{{route('admin.country.index')}}" class="nav-link {{Request::is('admin/country')?'active':''}}">Country</a></li>
								<li class="nav-item"><a href="{{route('admin.state.index')}}" class="nav-link {{Request::is('admin/state')?'active':''}}">State</a></li>
								<li class="nav-item"><a href="{{route('admin.city.index')}}" class="nav-link {{Request::is('admin/city')?'active':''}}">City</a></li>
								<li class="nav-item"><a href="{{route('admin.police_station.index')}}" class="nav-link {{Request::is('admin/police_station')?'active':''}}">Police Station</a></li>
								<li class="nav-item"><a href="{{route('admin.district.index')}}" class="nav-link {{Request::is('admin/district')?'active':''}}">District</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><a href="{{route('admin.dashboard.index')}}"><i class="icon-arrow-left52 mr-2"></i></a><span class="font-weight-semibold">@yield('title')</span></h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none">
						<div class="d-flex justify-content-center">

							<a href="#" class="btn btn-float mt-3">
								<h4><span id="ct" class="font-weight-semibold"></span></h4>
							</a>
						</div>
					</div>
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">

				@yield('content')

			</div>
			<!-- /content area -->


			<!-- Footer -->
			<div class="navbar navbar-expand-lg navbar-light">
				<div class="text-center d-lg-none w-100">
					<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
						<i class="icon-unfold mr-2"></i>
						Footer
					</button>
				</div>

				<div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text ml-lg-auto">
						
					</span>
				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->


	<script src="{{asset('user_asset/assets/js/toastr.js')}}"></script>
	@toastr_render
	@yield('scripts')
</body>
</html>
