@extends('user.profileuser')
@section('content')
<h3 class="mb-0 text-uppercase pb-3">TABEL KATEGORI</h3>
<hr>
<div class="card">
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <a href="{{ route('peminjaman.create') }}" class="btn btn-grd btn-primary px-5 mb-2">Tambah Data Peminjaman</a>
        <table class="table mb-0 table-striped" id="example2">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Buku</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Tanggal Peminjaman</th>
                    <th scope="col">Tanggal Pengembalian</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjaman as $data)
                <tr>
                    <th scope="row">{{ $loop->index+1 }}</th>
                    <td>{{ $data->buku->judul }}</td>
                    <td>{{ $data->jumlah }}</td>
                    <td>{{ $data->tanggal_minjem }}</td>
                    <td>{{ $data->tanggal_kembali }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->status }}</td>
                    <td>
                        <a href="{{ route('peminjaman.edit', $data->id) }}" class="btn btn-grd-warning px-2">Edit</a>
                        <a href="{{ route('peminjaman.show', $data->id) }}" class="btn btn-grd-warning px-2">Show</a>
                        <a class="btn ripple btn-grd-danger px-3" href="#" onclick="event.preventDefault();
                            document.getElementById('destroy-form').submit();">
                            Hapus
                        </a>

                        <form id="destroy-form" action="{{ route('peminjaman.destroy', $data->id) }}" method="POST" class="d-none">
                            @method('DELETE')
                            @csrf
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
