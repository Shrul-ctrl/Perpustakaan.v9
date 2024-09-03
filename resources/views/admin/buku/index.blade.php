@extends('layouts.backend')
@section('content')
<h3 class="mb-0 text-uppercase pb-3">TABEL BUKU</h3>
<hr>
<div class="card">
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <a href="{{ route('buku.create') }}" class="btn btn-grd btn-primary px-5 mb-2">Tambah Data Buku</a>
        <table class="table mb-0 table-striped" id="example2">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Tahun Terbit</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($buku as $data)
                <tr>
                    <th scope="row">{{ $loop->index+1 }}</th>
                    <td>{{ $data->judul }}</td>
                    <td>
                        <img src="{{ asset('images/buku/' . $data->foto) }}" width="200" height="100" style="object-fit: cover;" alt="">
                    </td>
                    <td>{{ $data->penuli->nama_penulis }}</td>
                    <td>{{ $data->penerbit->nama_penerbit }}</td>
                    <td>{{ $data->kategori->nama_kategori }}</td>
                    <td>{{ $data->tahun_terbit }}</td>
                    <td>{{ $data->jumlah }}</td>

                    <td>
                        <form action="{{ route('buku.destroy', $data->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('buku.edit', $data->id) }}" class="btn btn-warning px-5">Edit</a>
                            <button type="submit" class="btn btn-danger px-5" onclick="return confirm('Apakah anda yakin??')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
