 <!-- latest jquery-->
 <script src="{{ asset('public/backend/assets/js/jquery-3.5.1.min.js') }}"></script>
 <!-- feather icon js-->
 <script src="{{ asset('public/backend/assets/js/icons/feather-icon/feather.min.js') }}"></script>
 <script src="{{ asset('public/backend/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
 <!-- Sidebar jquery-->
 <script src="{{ asset('public/backend/assets/js/sidebar-menu.js') }}"></script>
 <script src="{{ asset('public/backend/assets/js/config.js') }}"></script>
 <!-- Bootstrap js-->
 <script src="{{ asset('public/backend/assets/js/bootstrap/popper.min.js') }}"></script>
 <script src="{{ asset('public/backend/assets/js/bootstrap/bootstrap.min.js') }}"></script>


 <!-- Plugins JS Ends-->

 <script type="text/javascript">
    jQuery(document).ready(function () {
        $('#loader').show();
        $('#loader').fadeOut(2000);
    });
</script>


 <!-- Theme js-->
 <script src="{{ asset('public/backend/assets/js/script.js') }}"></script>
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
