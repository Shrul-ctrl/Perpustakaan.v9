@extends('layouts.frontend.profileuser')
@section('content')
<h3 class="mb-0 text-uppercase pb-3">PINJAMAN BUKU</h3>
<hr>
<div class="col-12 col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="container-fluid pb-3">
                <div class="container">
                    <div class="text-center pb-2">
                        <p class="section-title px-5">
                            <h3 class="px-2">Kategori</h3>
                        </p>
                        <hr>
                        {{-- <h1 class="mb-4">Pinjam Buku</h1> --}}
                    </div>
                    <div class="row">
                        <div class="col-12 text-center mb-2">
                            <ul class="list-inline mb-4" id="portfolio-flters">
                                <li class="btn btn-outline-primary m-1">
                                    <a href="{{ route('listbuku') }}">Semua</a>
                                </li>
                                @foreach ($kategori as $data)
                                <li class="btn btn-outline-primary m-1">
                                    <a href="{{ route('buku.filter', $data->id) }}">{{ $data->nama_kategori }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    
                    @if($buku->isEmpty())
                    <div class="alert alert-info" role="alert">
                        <h2 class="text-center p-3">Buku Sedang Kosong</h2>
                    </div>
                    @else
                    <div class="row">
                        @php
                        $limitedbuku = $buku ->take(4)
                        @endphp
                        @foreach ($limitedbuku as $data )
                        <div class="col-lg-3 mb-5">
                            <div class="card border-0 bg-light shadow-sm pb-2">
                                <a href="{{ url('show' , $data->id) }}">
                                    <img src="{{ asset('images/buku/' . $data->foto) }}" alt="" class="card-img-top" alt="..." width="50" height="350">
                                </a>
                                <div class="card-body text-center">
                                    <h4 class="card-title">{{$data->judul}}</h4>
                                    <p class="card-text">
                                        {{-- {{$data->deskripsi}} --}}
                                    </p>
                                </div>
                                <div class="d-flex justify-content-center gap-1">
                                    {{-- <a href="" type="button" class="btn btn-primary px-4 float-end mb-4 mr-5" data-bs-toggle="modal" data-bs-target="#ScrollableModal">Kembali</a> --}}
                                    <a href="{{route('peminjaman.create')}}" type="button" class="btn btn-primary">Pinjam</a>
                                    <a href="{{ url('user/show', $data->id) }}#komentar" type="button" class="btn btn-success">Ulas</a>
                                    <a href="{{ url('user/show', $data->id) }}" type="button" class="btn btn-warning">Detail</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
