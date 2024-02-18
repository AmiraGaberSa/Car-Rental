@include('admin.includes.flashMessage')
<!DOCTYPE html>
<html lang="en">
  <head>
@include('admin.includes.headList')
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="{{route('index')}}" class="site_title"><i class="fa fa-car"></i> <span>Rent Car Admin</span></a>
					</div>

					<div class="clearfix"></div>

					<!-- menu profile quick info -->
                    @include('admin.includes.menuProfileInfo')
					<!-- /menu profile quick info -->

					<br />

					<!-- sidebar menu -->
			        @include('admin.includes.sidebarMenu')
					<!-- /sidebar menu -->

					<!-- /menu footer buttons -->
					@include('admin.includes.menuFooterButton')
					<!-- /menu footer buttons -->
				</div>
			</div>

			<!-- top navigation -->
			@include('admin.includes.topNavigation')
			<!-- /top navigation -->

			<!-- page content -->
            @yield('content')
			<!-- /page content -->

			<!-- footer content -->
		    @include('admin.includes.footerContent')
			<!-- /footer content -->
		</div>
	</div>

 @include('admin.includes.footerJsList')
</body></html>
