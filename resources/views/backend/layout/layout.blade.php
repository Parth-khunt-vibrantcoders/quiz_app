<!DOCTYPE html>
<html lang="en">
   @include('backend.includes.header')
    <body>
        <!-- Loader starts-->
        <div id="loader"></div>
        <!-- Loader ends-->
        <!-- page-wrapper Start       -->
        <div class="page-wrapper compact-wrapper" id="pageWrapper">
            @include('backend.includes.body_header')
            <!-- Page Body Start-->
            <div class="page-body-wrapper sidebar-icon">
                @include('backend.includes.sidebar')
                    <div class="page-body">
                        @include('backend.includes.breadcrumbs')
                        @yield('section')
                    </div>
                @include('backend.includes.body_footer')
            </div>
        </div>
        @include('backend.includes.footer')
    </body>
</html>
