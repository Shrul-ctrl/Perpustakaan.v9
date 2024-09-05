@extends('layouts.backend.backend')

@section('content')
<h3 class="mb-0 text-uppercase pb-3">TABEL PENERBIT</h3>
<hr>
<div class="card">
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <a href="{{ route('penerbit.create') }}" class="btn btn-grd btn-primary px-5 mb-2">Tambah Data Penerbit</a>
        <table class="table mb-0 table-striped" id="example2">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Penerbit</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penerbit as $data)
                <tr>
                    <th scope="row">{{ $loop->index+1 }}</th>
                    <td>{{ $data->nama_penerbit }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>
                        <form action="{{ route('penerbit.destroy', $data->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('penerbit.edit', $data->id) }}" class="btn btn-warning px-5">Edit</a>
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
