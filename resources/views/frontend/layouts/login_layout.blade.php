<!DOCTYPE html>
<html>
	<head>
        <title>{{ $title }}</title>
        <meta charset="UTF-8">
        <meta name="description" content="{{ $description }}">
        <meta name="keywords" content="{{ $keywords }}">
        <meta name="author" content="{{ Config::get('constants.PROJECT_NAME') }}">

		<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/style.css') }}" />

        <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/customcss.css') }}" />
            @if (!empty($css))
                @foreach ($css as $value)
                    @if(!empty($value))
                        <link rel="stylesheet" href="{{ asset('public/frontend/css/customcss/'.$value) }}">
                    @endif
                @endforeach
            @endif


            @if (!empty($plugincss))
                @foreach ($plugincss as $value)
                    @if(!empty($value))
                        <link rel="stylesheet" href="{{ asset('public/frontend/'.$value) }}">
                    @endif
                @endforeach
            @endif

            <script>
                var baseurl = "{{ asset('/') }}";
            </script>
	</head>
	<body>

        @yield('section')

		<script src="{{ asset('public/frontend/js/jquery.min.js') }}"></script>
		<script src="{{ asset('public/frontend/js/popper.min.js') }}"></script>
		<script src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('public/frontend/js/dark-light-mode.js') }}"></script>

		<script type="text/javascript">
			$(".menu-open").click(function(){
			  $("body").toggleClass("main");
			});
			$(".sidebar-menu, .menu-close").click(function(){
			  $("body").toggleClass("main");
			});
		</script>

        <script type="text/javascript">
            jQuery(document).ready(function () {
                $('#loader').show();
                $('#loader').fadeOut(2000);
            });
        </script>

        @if (!empty($pluginjs))
            @foreach ($pluginjs as $value)
                <script src="{{ asset('public/frontend/js/plugins/'.$value) }}" type="text/javascript"></script>
            @endforeach
        @endif

        @if (!empty($js))
        @foreach ($js as $value)
            <script src="{{ asset('public/frontend/js/customjs/'.$value) }}" type="text/javascript"></script>
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
