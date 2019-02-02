<!DOCTYPE html>
<html lang="es">
@include('__partials.head')
<body class="sidebar-fixed">
@if(isset(\Illuminate\Support\Facades\Auth::user()->id))
    <div class="container-scroller">
        @include('__partials.nav')
        <div class="container-fluid page-body-wrapper">
            @include('__partials.settings-panel')
            @include('__partials.menu')
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                @include('__partials.footer')
            </div>
        </div>
    </div>
@else
    @if (\Request::is('/'))
        <body class="sidebar-fixed">
        <div class="container-scroller">
            @yield('content')
        </div>
        </body>
    @endif
    @if (\Request::is('login') || \Request::is('register'))
        <body>
            <div class="container-scroller">
                @yield('content')
            </div>
        </body>
    @endif
@endif
@include('__partials.scripts')

@if(\Illuminate\Support\Facades\Session::has('success'))
    <script>
        swal("Proceso Completado", "{{\Illuminate\Support\Facades\Session::get('success')}}", "success");
    </script>
    <?php
    \Illuminate\Support\Facades\Session::remove('success');
    ?>
@endif

@if(\Illuminate\Support\Facades\Session::has('error'))
    <script>
        swal("Error", "{{\Illuminate\Support\Facades\Session::get('error')}}", "error");
    </script>
    <?php
    \Illuminate\Support\Facades\Session::remove('error');
    ?>
@endif

</body>
</html>
