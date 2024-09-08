<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header mt-3">
        <div class="logo-icon">
            {{-- <img src="{{asset('images/buku/smk.png')}}" alt="" width="50"/>  --}}

        </div>
        <div class="logo-name flex-grow-1">
            <h5 class="mt-0">Profile</h5>
        </div>
        <div class="sidebar-close">
            <span class="material-icons-outlined">close</span>
        </div>
    </div>
    <div class="sidebar-nav">
        <!--navigation-->
        <ul class="metismenu" id="sidenav">
            <li>
                <a href="{{route('dashboarduser')}}">
                    <div class="parent-icon"><i class="material-icons-outlined">home</i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
            <li class="menu-label">List</li>
            <li>
                <a href="{{route('peminjaman.index')}}">
                    <div class="parent-icon"><i class="material-icons-outlined">inventory_2</i>
                    </div>
                    <div class="menu-title">favorite</div>
                </a>
            </li>
            <li>
            <li>
                <a href="{{route('peminjaman.index')}}">
                    <div class="parent-icon"><i class="material-icons-outlined">inventory_2</i>
                    </div>
                    <div class="menu-title">peminjaman</div>
                </a>
            </li>
            <li>
                <a href="{{route('pengembalian.index')}}">
                    <div class="parent-icon"><i class="material-icons-outlined">shopping_bag</i>
                    </div>
                    <div class="menu-title">pengembalian</div>
                </a>
            </li>
        </ul>
        <!--end navigation-->
    </div>
</aside>
