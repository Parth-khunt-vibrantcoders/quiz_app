<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $description  }}">
    <meta name="keywords" content="{{ $keywords }}">
    <meta name="author" content="{{ Config::get('constants.PROJECT_NAME') }}">


    <link rel="icon" href="{{ asset('public/backend/assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('public/backend/assets/images/favicon.png') }}" type="image/x-icon">

    <title>{{ $title }}</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Font Awesome-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/backend/assets/css/fontawesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/backend/assets/css/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/backend/assets/css/themify.css') }}">

    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/backend/assets/css/feather-icon.css') }}">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/backend/assets/css/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/backend/assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('public/backend/assets/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/backend/assets/css/responsive.css') }}">

    @if (!empty($css))
        @foreach ($css as $value)
            @if(!empty($value))
                <link rel="stylesheet" href="{{ asset('public/backend/assets/css/customcss/'.$value) }}">
            @endif
        @endforeach
    @endif


    @if (!empty($plugincss))
        @foreach ($plugincss as $value)
            @if(!empty($value))
                <link rel="stylesheet" href="{{ asset('public/backend/assets/'.$value) }}">
            @endif
        @endforeach
    @endif

    <script>
        var baseurl = "{{ asset('/') }}";
    </script>

  </head>
  <body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="theme-loader">
        <div class="loader-p"></div>
      </div>
    </div>


    <!-- Loader ends-->
    @yield('section')
    <!-- latest jquery-->


    <script src="{{ asset('public/backend/assets/js/jquery-3.5.1.min.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ asset('public/backend/assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('public/backend/assets/js/icons/feather-icon/feather-icon.js') }}"></script>

    <!-- Bootstrap js-->
    <script src="{{ asset('public/backend/assets/js/bootstrap/popper.min.js') }}"></script>
    <script src="{{ asset('public/backend/assets/js/bootstrap/bootstrap.min.js') }}"></script>
    <!-- Plugins JS start-->
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ asset('public/backend/assets/js/script.js') }}"></script>
    <!-- login js-->
    @if (!empty($pluginjs))
        @foreach ($pluginjs as $value)
            <script src="{{ asset('public/backend/assets/js/'.$value) }}" type="text/javascript"></script>
        @endforeach
    @endif

    @if (!empty($js))
    @foreach ($js as $value)
        <script src="{{ asset('public/backend/assets/js/customjs/'.$value) }}" type="text/javascript"></script>
    @endforeach
    @endif

    <script>

        jQuery(document).ready(function () {
            @if (!empty($funinit))
                    @foreach ($funinit as $value)
                        {{  $value }}
                    @endforeach
            @endif
        });
    </script>
  </body>

</html>
