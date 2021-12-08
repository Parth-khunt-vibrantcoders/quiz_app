<div id="loader"></div>
<!-- Plugins JS Ends-->
<script src="{{ asset('public/frontend/js/customjs/jquery.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script>

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
