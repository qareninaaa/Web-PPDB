<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title')</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="{{ asset('/img/kaiadmin/favicon.ico')}}"
      type="image/x-icon"
    />

    <!-- Fonts and icons -->
    <script src="{{ asset('/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["{{ asset('/css/fonts.min.css') }}"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/plugins.min.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/kaiadmin.min.css')}}" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{asset('/css/demo.css')}}" />

    @stack('styles')
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      @include('layouts.inc.sidebar')
      <!-- End Sidebar -->

      <div class="main-panel">
        @include('layouts.inc.header')

        <div class="container">
          <div class="page-inner">
            @yield('content')
          </div>
        </div>

        <footer class="footer">
          @include('layouts.inc.footer')
        </footer>
      </div>


    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('/js/core/bootstrap.min.js') }}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{ asset('/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>

    <!-- Kaiadmin JS -->
    <script src="{{ asset('/js/kaiadmin.min.js') }}"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="{{ asset('/js/demo.js') }}"></script>
   
    @stack('scripts')
  </body>
</html>
