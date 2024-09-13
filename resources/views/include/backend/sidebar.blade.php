<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header mt-3">
        <div class="logo-icon">
            <img src="{{asset('images/buku/smk.png')}}" alt="" width="50" />

        </div>
        <div class="logo-name flex-grow-1">
            <h5 class="mt-0">Perpustakaan</h5>
        </div>
        <div class="sidebar-close">
            <span class="material-icons-outlined">close</span>
        </div>
    </div>
    <div class="sidebar-nav">
        <!--navigation-->
        <ul class="metismenu" id="sidenav">
            <li>
                <a href="{{ route('dashboard') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">home</i></div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
            <li>
                <a href="{{ route('user.index') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">account_circle</i></div>
                    <div class="menu-title">User</div>
                </a>
            </li>
            <li class="menu-label">Tabel</li>
            <li>
                <a href="{{ route('kategori.index') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">inventory_2</i></div>
                    <div class="menu-title">Kategori</div>
                </a>
            </li>
            <li>
                <a href="{{ route('penerbit.index') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">shopping_bag</i></div>
                    <div class="menu-title">Penerbit</div>
                </a>
            </li>
            <li>
                <a href="{{ route('penulis.index') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">card_giftcard</i></div>
                    <div class="menu-title">Penulis</div>
                </a>
            </li>
            <li>
                <a href="{{ route('buku.index') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">apps</i></div>
                    <div class="menu-title">Buku</div>
                </a>
            </li>
            <li class="menu-label">List</li>
            <li class="">
                <a class="has-arrow" href="javascript:;" aria-expanded="false">
                    <div class="parent-icon"><i class="material-icons-outlined">inventory_2</i>
                        {{-- <span class="badge-notify bg-danger text-light p-1">5</span> --}}
                    </div>
                    <div class="menu-title">Peminjaman</div>
                </a>
                <ul class="mm-collapse" style="height: 0px;">
                    <li><a href="{{ route('indexpengajuan') }}" aria-expanded="true"><i class="material-icons-outlined">arrow_right</i>Pengajuan Buku</a>
                    </li>
                    <li><a href="{{ route('indexpengembalian') }}" aria-expanded="true"><i class="material-icons-outlined">arrow_right</i>Pengembalian Buku</a>
                    </li>
                    <li><a href="{{ route('indexpeminjaman') }}" aria-expanded="true"><i class="material-icons-outlined">arrow_right</i>Peminjaman Buku</a>
                    </li>
                </ul>
            </li>
            {{-- <li>
                <a href="{{ route('pengembalian.index') }}">
            <div class="parent-icon"><i class="material-icons-outlined">shopping_bag</i></div>
            <div class="menu-title">Pengembalian</div>
            </a>
            </li> --}}
        </ul>

        <!--end navigation-->
    </div>
</aside>
