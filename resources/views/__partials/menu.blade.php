<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="user-wrapper">
                    <div class="profile-image">
                        <img src="{{asset('assets/images/faces/user.png')}}" alt="profile image"></div>
                    <div class="text-wrapper">
                        <p class="profile-name">{{\Illuminate\Support\Facades\Auth::user()->name}}  </p>
                        <div>
                            <small
                                class="designation text-muted">{{\Illuminate\Support\Facades\Auth::user()->rol}}</small>
                            <span class="status-indicator online"></span>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}"
               @if(Request::is('/') || Request::is('/home')) class="active" @endif>
                <i class="menu-icon fa fa-tachometer-alt"></i>
                <span class="menu-title">Inicio</span>
            </a>
        </li>
        @if(\Illuminate\Support\Facades\Auth::user()->rol == 'cliente')
            <li class="nav-item">
                <a class="nav-link" href="{{route('pelicula')}}" @if(Request::is('/peliculas')) class="active" @endif>
                    <i class="menu-icon fa fa-film"></i>
                    <span class="menu-title">Peliculas</span>
                </a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link" href="{{route('existencia')}}" @if(Request::is('/peliculas/existencia')) class="active" @endif>
                    <i class="menu-icon fa fa-film"></i>
                    <span class="menu-title">Catalogo</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('agregarIndex')}}" @if(Request::is('/peliculas/agregar/index')) class="active" @endif>
                    <i class="menu-icon fa fa-video"></i>
                    <span class="menu-title">Agregar Peliculas</span>
                </a>
            </li>
        @endif
    </ul>
</nav>
