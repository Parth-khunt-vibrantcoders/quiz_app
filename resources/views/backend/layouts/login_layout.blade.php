<!DOCTYPE html>

<html lang="en">
	<!--begin::Head-->
	<head>
		<title>{{  $title }}</title>
		<meta name="description" content="{{ $description }}" />
		<meta name="keywords" content="{{ $keywords }}" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />


		<link rel="shortcut icon" href="{{ asset('public/upload/systeamsetting/favicon.png') }}" />

		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{  asset('public/backend/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{  asset('public/backend/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->

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
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-body">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url({{  asset('public/backend/assets/media/illustrations/unitedpalms-1/14.png') }}">

                @yield('section')

				<!--begin::Footer-->
				<div class="d-flex flex-center flex-column-auto p-10">
					<!--begin::Links-->
					<div class="d-flex align-items-center fw-bold fs-6">
						<a href="https://keenthemes.com" class="text-muted text-hover-primary px-2">About</a>
						<a href="mailto:support@keenthemes.com" class="text-muted text-hover-primary px-2">Contact</a>
						<a href="https://1.envato.market/EA4JP" class="text-muted text-hover-primary px-2">Contact Us</a>
					</div>
					<!--end::Links-->
				</div>
				<!--end::Footer-->

			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Main-->

		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{  asset('public/backend/assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{  asset('public/backend/assets/js/scripts.bundle.js') }}"></script>
		<!--end::Global Javascript Bundle-->



        @if (!empty($pluginjs))
            @foreach ($pluginjs as $value)
                <script src="{{ asset('public/backend/assets/'.$value) }}" type="text/javascript"></script>
            @endforeach
        @endif

        @if (!empty($js))
            @foreach ($js as $value)
                <script src="{{ asset('public/backend/assets/js/customjs/'.$value) }}" type="text/javascript"></script>
            @endforeach
        @endif



        <script type="text/javascript">
            jQuery(document).ready(function () {
                $('#loader').show();
                $('#loader').fadeOut(1000);
            });
        </script>

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
	<!--end::Body-->
</html>
