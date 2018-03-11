<!DOCTYPE html>
<html>

@include('layouts.member.header')
<body>

  <!-- Wrapper-->
    <div id="wrapper">

        <!-- Navigation -->
        @include('layouts.member.navigation')

        <!-- Page wraper -->
        <div id="page-wrapper" class="gray-bg">

            <!-- Page wrapper -->
            @include('layouts.member.topnavbar')
            @include('layouts.member.breadcrumb')
            
            <!-- Main view  -->
            @yield('content')

            <!-- Footer -->
            @include('layouts.member.bodyfooter')

        </div>
        <!-- End page wrapper-->

    </div>
    <!-- End wrapper-->
@include('layouts.member.footer')

</body>
</html>
