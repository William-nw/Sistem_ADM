<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/ico" />

    <title>@yield('title')</title>

    @include('includes.styles')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><span>Admisi Digital</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{ asset('assets/img/img.jpg') }}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::User()->nama_user}}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />
            @guest
              <ul>
                <li style="list-style-type: none;">Harap Login Terima Kasih</li>
              </ul>
            @endguest
            {{-- If Auth --}}
            @auth
                @include('includes.sidebar')
            @endauth
          </div>
        </div>

        @include('includes.header')

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="x_panel">
            <div class="x_title">
                <h2>@yield('content-title')</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br/>
              @yield('content')
            </div>
          </div>
        </div>
        <!-- /page content -->
      </div>
    </div>

    @include('includes.scripts')	
    @yield('custom-js')

  </body>
</html>
