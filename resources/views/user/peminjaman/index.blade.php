@extends('layouts.frontend.profileuser')
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
                        {{-- @if ($peminjamanditerima  ) --}}
                        <th scope="col">Action</th>
                        {{-- @elseif ($peminjamanditolak === 'ditolak')
                        <th scope="col">Action</th> --}}
                        {{-- @endif --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peminjaman as $data)
                    {{-- @if ($data->status_pengajuan === 'diterima') --}}
                    <tr>
                        <th scope="row">{{ $loop->index+1 }}</th>
                        <td>{{ $data->buku->judul }}</td>
                        <td>{{ $data->nama_peminjam}}</td>
                        <td>{{ $data->jumlah_pinjam }}</td>
                        <td>{{ $data->tanggal_pinjam }}</td>
                        <td>{{ $data->batas_pinjam }}</td>
                        <td>{{ $data->tanggal_kembali }}</td>
                        <td>
                            @include('include.fullstack.ifelsestatus')
                        </td>

                        <td>
                            @if($data->status_pengajuan === 'ditahan')
                            <form action="{{ route('peminjaman.update', $data->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status_pengajuan" value="batalkan">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin membatalkan pengajuan?')">Batal</button>
                            </form>
                            @elseif($data->status_pengajuan === 'diterima')
                            <a href="{{ route('peminjaman.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                            {{-- @elseif($data->status_pengajuan === 'dikembalikan')
                                <p class="dash-lable mb-0 bg-warning bg-opacity-10 text-warning rounded-2">Dikembalikan</p> --}}
                            @else
                            <form action="{{ route('peminjaman.destroy', $data->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus Peminjaman')">Hapus</button>
                            </form>
                            @endif
                        </td>


                        {{-- @foreach ($peminjaman as $data)
                        @if($data->status_pengajuan === 'diterima')
                        <td>
                            <a href="{{ route('peminjaman.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                        </td>
                        @endif
                        @endforeach

                        @foreach ($peminjaman as $data)
                        @if($data->status_pengajuan === 'ditahan')
                        <td>
                            <form action="{{ route('peminjaman.update', $data->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status_pengajuan" value="batalkan">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin membatalkan pengajuan?')">Batal</button>
                            </form>

                        </td>
                        @endif
                        @endforeach

                        @foreach ($peminjaman as $data)
                        @if($data->status_pengajuan === 'ditolak')
                        <td>
                            <form action="{{ route('peminjaman.destroy', $data->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus Peminjaman')">Hapus</button>
                            </form>
                        </td>
                        @endif
                        @endforeach --}}

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
