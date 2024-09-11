<header class="top-header">
    <nav class="navbar navbar-expand align-items-center gap-4 bg-dark">
        <div class="btn-toggle">
            <a href="javascript:;"><i class="material-icons-outlined">menu</i></a>
        </div>
        <div class="search-bar flex-grow-1">
            <div class="position-relative">
                <div class="search-popup p-3">
                    <div class="card rounded-4 overflow-hidden">
                        <div class="card-body search-content">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ul class="navbar-nav gap-1 nav-right-links align-items-center">
            <li class="nav-item d-lg-none mobile-search-btn">
                <a class="nav-link" href="javascript:;"><i class="material-icons-outlined">search</i></a>
            </li>
            <li class="nav-item dropdown">
                <div class="dropdown-menu dropdown-notify dropdown-menu-end shadow">
                    <div class="notify-list">
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown pt-4">
                <a href="javascrpt:;" class="dropdown-toggle dropdown-toggle-nocaret" data-bs-toggle="dropdown">
                    <img src="{{ asset('images/user/' . $user->fotoprofile) }}" class="rounded-circle p-1 border mb-4" width="45" height="45" style="object-fit: cover;" alt="">
                </a>
                <div class="dropdown-menu dropdown-user dropdown-menu-end shadow">
                    <a class="dropdown-item  gap-2 py-2" href="javascript:;">
                        <div class="text-center">
                            <img src="{{ asset('images/user/' . $user->fotoprofile) }}" class="rounded-circle p-1 border mb-4" width="45" height="45" style="object-fit: cover;" alt="">
                            <h5 class="user-name mb-0 fw-bold">Hello  {{Auth::user()->name}}</h5>
                        </div>
                    </a>
                    <hr class="dropdown-divider">
                    <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ route('AssalaamPerpustakaan') }}">
                        <i class="material-icons-outlined">join_right</i>List Buku</a>
                        
                    <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ route('login') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="material-icons-outlined">power_settings_new</i>Logout</a>
                        
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>

    </nav>
</header>