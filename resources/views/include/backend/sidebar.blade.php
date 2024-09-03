<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div class="logo-icon">
            {{-- <img src="{{asset('backend/assets/images/logo-icon.png')}}" class="logo-img" alt=""> --}}
        </div>
        <div class="logo-name flex-grow-1">
            <h5 class="mb-0">Perpustakaan</h5>
        </div>
        <div class="sidebar-close">
            <span class="material-icons-outlined">close</span>
        </div>
    </div>
    <div class="sidebar-nav">
        <!--navigation-->
        <ul class="metismenu" id="sidenav">
            <li>
                <a href="{{route('dashboard')}}">
                    <div class="parent-icon"><i class="material-icons-outlined">home</i>
                    </div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
            <li>
                <a href="{{route('user.index')}}">
                    <div class="parent-icon"><i class="material-icons-outlined">person</i>
                    </div>
                    <div class="menu-title">User</div>
                </a>
            </li>
            <li class="menu-label">Tabel</li>
            <li>
                <a href="{{route('kategori.index')}}">
                    <div class="parent-icon"><i class="material-icons-outlined">inventory_2</i>
                    </div>
                    <div class="menu-title">kategori</div>
                </a>
            </li>
            <li>
                <a href="{{route('penerbit.index')}}">
                    <div class="parent-icon"><i class="material-icons-outlined">shopping_bag</i>
                    </div>
                    <div class="menu-title">penerbit</div>
                </a>
            </li>
            <li>
                <a href="{{route('penulis.index')}}">
                    <div class="parent-icon"><i class="material-icons-outlined">card_giftcard</i>
                    </div>
                    <div class="menu-title">penulis</div>
                </a>
            </li>
            <li>
                <a href="{{route('buku.index')}}">
                    <div class="parent-icon"><i class="material-icons-outlined">apps</i>
                    </div>
                    <div class="menu-title">buku</div>
                </a>
            </li>
        </ul>
        <!--end navigation-->
    </div>
</aside>
