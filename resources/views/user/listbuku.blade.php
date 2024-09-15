@extends('layouts.frontend.frontend')
@section('content')

<!-- Header Start -->
<div class="container-fluid bg-primary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
        <h3 class="display-3 font-weight-bold text-white">List Buku</h3>
        <div class="d-inline-flex text-white">
            <p class="m-0"><a class="text-white" href="">Home</a></p>
            <p class="m-0 px-2">/</p>
            <p class="m-0">Buku</p>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Gallery Start -->
<div class="container-fluid pt-5 pb-3">
    <div class="container">
        <div class="text-center pb-2">
            <p class="section-title px-5">
                <span class="px-2">List Buku</span>
            </p>
            <h1 class="mb-4">Pinjam Buku</h1>
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
            @foreach ($buku as $data )
            <div class="col-lg-3 mb-5">
                <div class="card border-0 bg-light shadow-sm pb-2">
                    <a href="{{ url('show' , $data->id) }}">
                        <img src="{{ asset('images/buku/' . $data->foto) }}" alt="" class="card-img-top" alt="..." width="50" height="350">
                    </a>
                    <div class="card-body text-center">
                        <h4 class="card-title">{{$data->judul}}</h4>
                        <p class="card-text">
                        </p>
                    </div>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{route('peminjaman.create')}}" type="button" class="btn btn-primary">Pinjam</a>
                        <a href="{{ url('user/show', $data->id) }}#komentar" type="button" class="btn btn-success">Ulas</a>
                        <a href="{{ url('user/show', $data->id) }}" type="button" class="btn btn-warning">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
<!-- Gallery End -->
@endsection
