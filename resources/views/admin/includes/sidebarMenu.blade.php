					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<h3>General</h3>
							<ul class="nav side-menu">
								<li><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="{{ route('users') }}">Users List</a></li>
										<li><a href="{{ route('addUser') }}">Add User</a></li>
									</ul>
								</li>
								<li><a><i class="fa fa-edit"></i> Categories <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="{{ route('addCategory') }}">Add Category</a></li>
										<li><a href="{{ route('categories') }}">Categories List</a></li>
									</ul>
								</li>
								<li><a><i class="fa fa-desktop"></i> Cars <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="{{ route('addCar') }}">Add Car</a></li>
										<li><a href="{{ route('cars') }}">Cars List</a></li>
									</ul>
								</li>
                                <li><a><i class="fa fa-desktop"></i> Testimonials <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="{{ route('addTestimonials') }}">Add Testimonials</a></li>
										<li><a href="{{ route('testimonial') }}">Testimonials List</a></li>
									</ul>
								</li>
								<li><a><i class="fa fa-desktop"></i> Teams <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="{{ route('addTeam') }}">Add Teams</a></li>
										<li><a href="{{ route('teams') }}">Teams List</a></li>
									</ul>
								</li>
								<li><a><i class="fa fa-desktop"></i> Blogs <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="{{ route('addBlog') }}">Add Blogs</a></li>
										<li><a href="{{ route('blogs') }}">Blogs List</a></li>
									</ul>
								</li>
                                <li><a><i class="fa fa-desktop"></i> Messages <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="{{ route('messages') }}">Messages</a></li>
									</ul>
								</li>
							</ul>
						</div>

					</div>
					<!-- /sidebar menu -->
