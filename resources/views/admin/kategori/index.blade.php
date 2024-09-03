@extends('layouts.backend')
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
        <a href="{{ route('kategori.create') }}" class="btn btn-grd btn-primary px-5 mb-2">Tambah Data Kategori</a>
        <table class="table mb-0 table-striped" id="example2">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategori as $data)
                <tr>
                    <th scope="row">{{ $loop->index+1 }}</th>
                    <td>{{ $data->nama_kategori }}</td>
                    <td>
                        <form action="{{ route('kategori.destroy', $data->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('kategori.edit', $data->id) }}" class="btn btn-warning px-5">Edit</a>
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
