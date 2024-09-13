@extends('layouts.frontend.profileuser')
@section('content')
<h3 class="mb-0 text-uppercase pb-3">HISTORI PEMINJAMAN BUKU</h3>
<hr>
<div class="col-12 col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="container-fluid pb-3">
                <div class="container">
                    <div class="text-center pb-2">
                        <p class="section-title px-5">
                            <h3 class="px-2">Histori</h3>
                        </p>
                        <hr>
                        {{-- <h1 class="mb-4">Pinjam Buku</h1> --}}
                    </div>
                    <div class="row">
                        @foreach ($peminjaman as $data )
                        <div class="col-lg-3 mb-5">
                            <div class="card border-0 bg-light shadow-sm pb-2">
                                    <img src="{{ asset('images/buku/' . $data->buku->foto) }}" alt="" class="card-img-top" alt="..." width="40" height="350">
                                    <div class="text-center pb-4 pt-4">
                                        <h4 class="card-title">{{ $data->buku->judul }}</h4>
                                        {{-- <p class="card-text">
                                            <span>Jumlah pinjam: {{ $data->nama_peminjam }}</span>
                                        </p> --}}
                                        <p class="card-text">
                                            <span>Jumlah pinjam: {{ $data->jumlah_pinjam }}</span>
                                        </p>
                                        <p class="card-text">
                                            <span>Tanggal pinjam: {{ $data->tanggal_pinjam }}</span>
                                        </p>
                                        <p class="card-text">
                                            <span>Tanggal kembali: {{ $data->tanggal_kembali }}</span>
                                        </p>
                                    </div>
                                    
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="{{ route('peminjaman.create') }}" type="button" class="btn btn-primary" style="font-size: 12px; padding: 4px 8px;">Pinjam Lagi</a>
                                    <a href="{{ url('show', $data->id) }}" type="button" class="btn btn-success" style="font-size: 12px; padding: 4px 8px;">Ulas</a>
                                </div>
                                
            
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
