@extends('layouts.frontend.frontend')
@section('content')

<!-- Facilities Start -->
<div class="container-fluid pt-5" style="margin-top: 50px ">
    <div class="container pb-3">
        <div class="row">
            <div class="col-lg-12 col-md-12 pb-1">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-4">
                    <div class="p-4 mt-5">
                        <h4>Buku {{$buku->judul}}</h4>
                        <p class="m-0'">
                            Buku{{$buku->judul}} lengkap. Buku {{$buku->judul}} yang ditulis oleh {{$buku->penuli->nama_penulis}}. Informasi selengkapnya mengenai Buku {{$buku->judul}} ada bawah ini.
                        </p>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 pb-1">
                                <div class="d-flex bg-light shadow-sm border-top rounded mb-4">
                                    <img src="{{ asset('images/buku/' . $buku->foto) }}" alt="" class="card-img-top" class="card-img-top" width="50" height="450">
                                </div>
                            </div>
                            <div class="des col-lg-8 col-md-6 pb-1">
                                <p>Judul : {{$buku->judul}}</p>
                                <p>Penulis : {{$buku->penuli->nama_penulis}}</p>
                                <p>Penerbit : {{$buku->penerbit->nama_penerbit}}</p>
                                <p>Kategori : {{$buku->kategori->nama_kategori}}</p>
                                <p>Jumlah : {{$buku->jumlah}}</p>
                                <p>Sinopsis : {{$buku->deskripsi}}</p>
                            </div>
                        </div>
                        <a href="{{route('AssalaamPerpustakaan')}}" class="btn btn-primary px-4 float-end mb-4 mr-5">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
