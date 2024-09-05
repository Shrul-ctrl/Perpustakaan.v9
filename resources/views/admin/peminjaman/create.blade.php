@extends('layouts.backend.backend')
@section('content')
<div class="col-12 col-xl-12">
    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Tambah Kategori</h5>
            <form class="row g-3" method="POST" action="{{ route('kategori.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-4x">
                    <label for="input13" class="form-label">Nama Buku</label>
                    <div class="position-relative ">
                        <select class="form-control mb-3" name="id_buku" placeholder="penulis" required>
                            @foreach ($buku as $data)
                            <option value="{{ $data->id }}">{{ $data->judul }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4x">
                    <label for="input13" class="form-label">Jumlah Peminjaman</label>
                    <div class="position-relative">
                        <input class="form-control mb-3" type="number" name="jumlah" min="1" placeholder="Masukkan Jumlah" required>
                    </div>
                </div>

                <div class="col-md-4x">
                    <label for="input13" class="form-label">Tanggal Peminjaman</label>
                    <div class="position-relative">
                        <input class="form-control mb-3" type="date" name="tanggal_pinjam" placeholder="Masukkan Tanggal" required>
                    </div>
                </div>

                <div class="col-md-4x">
                    <label for="input13" class="form-label">Tanggal Pengembalian</label>
                    <div class="position-relative">
                        <input class="form-control mb-3" type="date" name="tanggal_kembali" placeholder="Masukkan Tanggal" required>
                    </div>
                </div>

                <div class="col-md-4x">
                    <label for="input13" class="form-label">Nama Peminjam</label>
                    <div class="position-relative">
                        <input class="form-control mb-3" type="text" name="nama" placeholder="Masukkan Nama" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Status</label>
                    <select name="status" class="form-control" id="">
                        <option value="Sedang Diminjem">Sedang Diminjem</option>
                        <option value="Sudah Dikembalikan">Sudah Dikembalikan</option>
                    </select>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{ route('buku.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
