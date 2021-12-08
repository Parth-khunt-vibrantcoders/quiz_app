<head>
    <title>{{ $title }}</title>
    <meta charset="UTF-8">
    <meta name="description" content="{{ $description }}">
    <meta name="keywords" content="{{ $keywords }}">
    <meta name="author" content="{{ Config::get('constants.PROJECT_NAME') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/css/bootstrap.min.css') }}">
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
