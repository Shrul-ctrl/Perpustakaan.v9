@extends('layouts.backend.backend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-xl-12">
            <div class="card m-3">
                <div class="card-header">
                    <h3>Tambah Peminjaman</h3>
                </div>
                <div class="card-body">
                    <form class="row" method="POST" action="{{ route('peminjaman.store') }}">
                        @csrf
                        <div class="col-md-4x">
                            <label for="input13" class="form-label">Penulis</label>
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
                                <input class="form-control mb-3" type="number" name="jumlah" placeholder="Masukkan Jumlah" required>
                            </div>
                        </div>

                        <div class="col-md-4x">
                            <label for="input13" class="form-label">Tanggal Peminjaman</label>
                            <div class="position-relative">
                                <input class="form-control mb-3" type="date" name="tanggal_peminjaman" placeholder="Masukkan Tanggal" required>
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
    </div>
</div>
@endsection
