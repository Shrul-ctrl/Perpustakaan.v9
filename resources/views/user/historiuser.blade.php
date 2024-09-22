@extends('layouts.frontend.profileuser')
@section('content')
<h3 class="mb-0 text-uppercase pb-3">RIWAYAT PEMINJAMAN BUKU</h3>
<hr>
<div class="col-12 col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="container-fluid pb-3">
                <div class="container">
                    <div class="text-center pb-2">
                        <p class="section-title px-5">
                            <h3 class="px-2">RIWAYAT</h3>
                        </p>
                        <hr>
                        {{-- <h1 class="mb-4">Pinjam Buku</h1> --}}
                    </div>
                    @if($peminjaman->isEmpty())
                    <div class="alert alert-info" role="alert">
                        <h2 class="text-center p-3">Tidak ada Histori</h2>
                    </div>
                    @else
                    <div class="row">
                        @foreach ($peminjaman as $data )
                        <div class="col-lg-3 mb-5">
                            <div class="card border-0 bg-light shadow-sm pb-2">
                                <img src="{{ asset('images/buku/' . $data->buku->foto) }}" alt="" class="card-img-top" alt="..." width="40" height="350" onerror="this.onerror=null; this.src='{{ asset('images/tidakadafoto.jfif') }}';">
                                <div class="text-center pb-4 pt-4">
                                    <h4 class="card-title">{{ $data->buku->judul }}</h4>
                                </div>
                                <div class="d-flex justify-content-center gap-1">
                                    {{-- <a href="{{ route('peminjaman.create') }}" type="button" class="btn btn-primary" style="font-size: 12px; padding: 4px 8px;">Pinjam Lagi</a> --}}
                                    <a href="{{ url('show', $data->id) }}" type="button" class="btn btn-success" style="font-size: 12px; padding: 4px 8px;">Ulas</a>
                                    <a type="button" class="btn btn-primary" style="font-size: 12px; padding: 4px 8px;">Detail peminjaman</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif

                    {{-- <div>
                        Halaman : {{ $pagination->currentPage() }} <br />
                        Jumlah Data : {{ $pagination->total() }} <br />
                        Data Per Halaman : {{ $pagination->perPage() }} <br />
                    </div> --}}

                    <nav aria-label="Page navigation example">
                        <ul class="pagination" style="justify-content: center;">
                            <li class="page-item {{ $pagination->onFirstPage()}}">
                                <a class="page-link" href="{{ $pagination->previousPageUrl() }}" aria-label="Sebelum">
                                    <span aria-hidden="true">«</span>
                                </a>
                            </li>

                            @foreach ($pagination->getUrlRange(1, $pagination->lastPage()) as $page => $url)
                            <li class="page-item {{ $page == $pagination->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                            @endforeach

                            <li class="page-item {{ $pagination->hasMorePages()}}">
                                <a class="page-link" href="{{ $pagination->nextPageUrl() }}" aria-label="Next">
                                    <span aria-hidden="true">»</span>
                                </a>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
