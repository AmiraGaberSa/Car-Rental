<div class="site-wrap" id="home-section">
<div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>

<div class="hero inner-page" style="background-image: url('{{asset('assets/images/hero_1_a.jpg')}}');">
<div class="container">
          <div class="row align-items-end ">
            <div class="col-lg-12">

              <div class="intro">
                <h1><strong>{{$cars->title}}</strong></h1>
                <div class="pb-4"><strong class="text-black">Posted on {{ date('F d, Y', strtotime($cars->created_at)) }}</strong></div>
              </div>

            </div>
          </div>
        </div>
      </div>
