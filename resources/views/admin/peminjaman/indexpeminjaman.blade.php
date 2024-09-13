@extends('layouts.backend.backend')
@section('content')
<h3 class="mb-0 text-uppercase pb-3">PINJAMAN BUKU</h3>
<hr>
<div class="card">
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        {{-- <a href="{{ route('peminjaman.create') }}" class="btn btn-grd btn-primary px-5 mb-2">Tambah Data Peminjaman</a> --}}
        <div class="table-responsive">
            <table class="table mb-0" id="example">
                <thead class="table">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Buku</th>
                        <th scope="col">Nama Peminjam</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Tanggal Peminjaman</th>
                        <th scope="col">Batas Peminjaman</th>
                        <th scope="col">Tanggal Pengembalian</th>
                        <th scope="col">Status</th>
                        {{-- <th scope="col">Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peminjaman as $data)
                    <tr>
                        <th scope="row">{{ $loop->index+1 }}</th>
                        <td>{{ $data->buku->judul }}</td>
                        <td>{{ $data->nama_peminjam}}</td>
                        <td>{{ $data->jumlah_pinjam }}</td>
                        <td>{{ $data->tanggal_pinjam }}</td>
                        <td>{{ $data->batas_pinjam }}</td>
                        <td>{{ $data->tanggal_kembali }}</td>
                        <td>
                            @if($data->status_pengajuan === 'ditahan')
                            <p class="dash-lable mb-0 bg-primary bg-opacity-10 text-primary rounded-2">Ditahan</p>
                            @elseif($data->status_pengajuan === 'diterima')
                            <p class="dash-lable mb-0 bg-success bg-opacity-10 text-success rounded-2">Diterima</p>
                            @else
                            <p class="dash-lable mb-0 bg-danger bg-opacity-10 text-danger rounded-2">Ditolak</p>
                            @endif
                        </td>
                        {{-- <td>
                            <form action="{{ route('peminjaman.update', $data->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="redirect_to" value="peminjamanadmin">
                                <button type="submit" name="status_pengajuan" value="diterima" class="btn btn-success btn-sm">Terima</button>
                                <button type="submit" name="status_pengajuan" value="ditolak" class="btn btn-danger btn-sm">Tolak</button>
                            </form>
                        </td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
