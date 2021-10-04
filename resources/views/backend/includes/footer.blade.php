 <!--begin::Javascript-->
      <!--begin::Global Javascript Bundle(used by all pages)-->
      <script src="{{  asset('public/backend/assets/plugins/global/plugins.bundle.js') }}"></script>
      <script src="{{  asset('public/backend/assets/js/scripts.bundle.js') }}"></script>
      <!--end::Global Javascript Bundle-->
      <!--begin::Page Vendors Javascript(used by this page)-->
      <script src="{{  asset('public/backend/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
      <!--end::Page Vendors Javascript-->
      <!--begin::Page Custom Javascript(used by this page)-->
      <script src="{{  asset('public/backend/assets/js/custom/widgets.js') }}"></script>
      <script src="{{  asset('public/backend/assets/js/custom/apps/chat/chat.js') }}"></script>
      <script src="{{  asset('public/backend/assets/js/custom/modals/create-app.js') }}"></script>
      <script src="{{  asset('public/backend/assets/js/custom/modals/upgrade-plan.js') }}"></script>
      <!--end::Page Custom Javascript-->
      <!--end::Javascript-->

      <script type="text/javascript">
        jQuery(document).ready(function () {
            $('#loader').show();
            $('#loader').fadeOut(2000);
        });
    </script>
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

