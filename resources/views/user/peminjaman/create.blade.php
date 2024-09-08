@extends('layouts.frontend.frontend')
@section('content')

<!-- Header Start -->
<div class="container-fluid bg-primary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
        <h3 class="display-3 font-weight-bold text-white">Pinjam Buku</h3>
        <div class="d-inline-flex text-white">
            <p class="m-0"><a class="text-white" href="">Home</a></p>
            <p class="m-0 px-2">/</p>
            <p class="m-0">Buku</p>
        </div>
    </div>
</div>
<!-- Header End -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="card rounded-4">
            <div class="row g-0 align-items-start">
                <div class="col-md-4">
                    <div class="p-3">
                        <img src="{{asset('backend/assets/images/gallery/12.png')}}" alt="..." class="img-fluid">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="mb-4">Pinjam Buku</h5>
                        <form class="row g-3" method="POST" action="{{ route('peminjaman.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6"> 
                                <label for="input13" class="form-label">Nama Peminjam</label>
                                <input class="form-control mb-3" type="text" name="nama_peminjam" placeholder="Nama Peminjam" value="{{ Auth::user()->name }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="input13" class="form-label">Nama Buku</label>
                                <select class="form-control mb-3" name="id_buku" placeholder="Buku" required>
                                    @foreach ($buku as $data)
                                    <option value="{{ $data->id }}">{{ $data->judul }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="input13" class="form-label">Jumlah</label>
                                <input class="form-control mb-3" type="text" name="jumlah" placeholder="Jumlah" required>
                            </div>

                            <div class="col-md-6">
                                <label for="input13" class="form-label">Tanggal Peminjaman</label>
                                <input class="form-control mb-3" type="date" name="tanggal_pinjam" value="{{ $sekarang }}" required>
                            </div>

                            <div class="col-md-6">
                                <label for="input13" class="form-label">Batas Pengembalian</label>
                                <input class="form-control mb-3" type="date" name="batas_pinjam" value="{{ $batastanggal }}" required>
                            </div>

                            <div class="col-md-6">
                                <label for="input13" class="form-label">Tanggal Pengembalian</label>
                                <input class="form-control mb-3" type="date" name="tanggal_kembali" required>
                            </div>

                            <div class="col-md-6">
                                <label for="input19" class="form-label">Status</label>
                                <select id="input19" name="status" class="form-select">
                                    <option selected="">Pilih...</option>
                                    <option value="0">Pinjam</option>
                                    <option value="1">Kembalikan</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <div class="d-md-flex d-grid align-items-center gap-3">
                                    <a href="{{route('AssalaamPerpustakaan')}}" class="btn btn-danger px-4">Batal</a>
                                    <button type="submit" class="btn btn-success px-4">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

@endsection
