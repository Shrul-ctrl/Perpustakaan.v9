<header class="top-header">
    <nav class="navbar navbar-expand align-items-center gap-4 bg-dark
    ">
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

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative m-4" data-bs-auto-close="outside" data-bs-toggle="dropdown" href="javascript:;">
                    <i class="material-icons-outlined">notifications</i>
                    @if($jumlahditerima > 0)
                    <span class="badge-notify bg-danger" style="font-size: 0.6rem; padding: 0.2em 0.4em;">
                        {{ $jumlahditerima }}
                    </span>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-notify dropdown-menu-end shadow">
                    <div class="px-3 py-1 d-flex align-items-center justify-content-between border-bottom">
                        <h5 class="notiy-title mb-0">Notifications</h5>
                    </div>
                    <div class="notify-list ps">
                        @foreach($peminjamannotif as $data)
                        <div>
                            <a class="dropdown-item border-bottom py-2" href="{{ route('peminjaman.index') }}">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="">
                                        <h5 class="notify-title">{{ $loop->index+1 }}. Pengajuan <span class="text-primary">{{ $data->buku->judul }}</span> Buku Diterima</h5>
                                        <p class="mb-0 notify-desc">Buku <span class="text-primary">{{ $data->buku->judul }}</span> telah diterima oleh admin.</p>
                                        <p class="mb-0 notify-time">Hari Ini</p>
                                    </div>
                                    <div class="notify-close position-absolute end-0 me-3">
                                        <i class="material-icons-outlined fs-6">close</i>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </li>


            @include('include.fullstack.dropdown')
        </ul>

    </nav>
</header>
