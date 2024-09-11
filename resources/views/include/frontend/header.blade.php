    <div class="container-fluid bg-light position-relative shadow">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5 fixed-top">
            <a href="" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px">
                <img src="{{asset('images/buku/smk.png')}}" alt="" width="90" />
                <span class="text-primary">SMK ASSALAAM </span>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-nav font-weight-bold mx-auto py-0">
                <a href="{{route('AssalaamPerpustakaan')}}" class="nav-item nav-link ">Home</a>
                <a href="{{route('listbuku')}}" class="nav-item nav-link">Buku</a>
            </div>
            @guest
            <a href="{{route('login')}}" class="btn btn-primary px-4">Login</a>
            <a href="{{route('register')}}" class="btn btn-primary px-4">Register</a>
            @endguest
            @auth
            <ul class="navbar-nav gap-1 nav-right-links align-items-center">
                <li class="nav-item dropdown pt-4">
                    <a href="javascrpt:;" data-bs-toggle="dropdown">
                        <img src="{{ asset('images/user/' . $user->fotoprofile) }}" class="rounded-circle p-1 border mb-4" width="50" height="45" style="object-fit: cover;" alt="">
                    </a>
                    <div class="dropdown-menu dropdown-user dropdown-menu-end shadow" style="width: 250px;border-radius:5%;">
                        <a class="dropdown-item  gap-2 py-2" href="javascript:;">
                            <div class="text-center">
                                <img src="{{ asset('images/user/' . $user->fotoprofile) }}"  class="rounded-circle p-1 shadow mb-3" width="90" height="90" style="object-fit: cover;" alt="">
                                <h5 class="user-name mb-0 fw-bold">Hello {{Auth::user()->name}}</h5>
                            </div>
                        </a>
                        <hr class="dropdown-divider">
                        @auth
                        @if(auth()->user()->isAdmin)
                        <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ route('dashboard') }}">
                            <i class="material-icons-outlined">admin_panel_settings</i>Admin Dashboard
                        </a>
                        @endif
                        @endauth
                        <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{route('dashboarduser')}}">
                            <i class="material-icons-outlined">home</i>Profile</a>
                        <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ route('login') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="material-icons-outlined">power_settings_new</i>Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
            @endauth
        </nav>
    </div>
