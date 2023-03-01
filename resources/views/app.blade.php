<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
		<meta name="description" content="Spruha -  Admin Panel HTML Dashboard Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="admin,dashboard,panel,bootstrap admin template,bootstrap dashboard,dashboard,themeforest admin dashboard,themeforest admin,themeforest dashboard,themeforest admin panel,themeforest admin template,themeforest admin dashboard,cool admin,it dashboard,admin design,dash templates,saas dashboard,dmin ui design">

		<!-- Favicon -->
		<link rel="icon" href="{{ asset('landing/assets/img/logo mc.png') }}" type="image/png"/>

		<!-- Title -->
		<title>MC WEDDING | @yield('title')</title>

		@include('dashboard.components.css')

        @yield('css')

	</head>

	<body class="main-body leftmenu">

		<!-- Loader -->
		<div id="global-loader">
			<img src="{{ asset('dashboard/assets/img/loader.svg') }}" class="loader-img" alt="Loader">
		</div>
		<!-- End Loader -->

		<!-- Page -->
		<div class="page">

			@include('dashboard.components.sidemenu')

			@include('dashboard.components.header')

			<!-- Main Content-->
			<div class="main-content side-content pt-0">

				<div class="container-fluid">
					<div class="inner-body">

						<!-- Page Header -->
						<div class="page-header">
							<div>
								<h2 class="main-content-title tx-24 mg-b-5">Dashboard</h2>
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
								</ol>
							</div>
							<div class="d-flex">
								<div class="justify-content-center">
									<a href="#" class="btn btn-primary my-2 btn-icon-text">
									  <i class="fe fe-link mr-2"></i> Lihat Website
									</a>
								</div>
							</div>
						</div>
						<!-- End Page Header -->

						@yield('content')
					</div>
				</div>
			</div>
			<!-- End Main Content-->

			@include('dashboard.components.footer')

		</div>
		<!-- End Page -->

		<!-- Back-to-top -->
		<a href="#top" id="back-to-top"><i class="fe fe-arrow-up"></i></a>

        @include('dashboard.components.js')

        @yield('js')
	</body>
</html>
