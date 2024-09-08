    @extends('layouts.frontend.profileuser')
    @section('content')
    <div class="col-12 col-xl-12">
        <div class="card">
            <div class="card-body p-4">
                <h5 class="mb-4">Edit buku</h5>
                <form class="row g-3" method="POST" action="{{ route('peminjaman.update', $peminjaman->id) }}" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    
                    <div class="col-md-4x">
                        <label for="input13" class="form-label">Nama Peminjam</label>
                        <div class="position-relative">
                            <input class="form-control mb-3" type="text" name="nama_peminjam" placeholder="Nama" value="{{ Auth::user()->name }}" required>
                        </div>
                    </div>

                       
                    <div class="col-md-4x">
                        <label for="input13" class="form-label">Nama Buku</label>
                        <select class="form-control mb-3" name="id_buku" placeholder="Buku" required>
                            @php
                            $limitedbuku = $buku ->take(1)
                            @endphp
                            @foreach ($limitedbuku as $data)
                            <option value="{{ $data->id }}">{{ $data->judul }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4x">
                        <label for="input13" class="form-label">Jumlah</label>
                        <div class="position-relative">
                            <input class="form-control mb-3" name="jumlah" placeholder="penerbit" value="{{$peminjaman->jumlah}}" required>
                        </div>
                    </div>

                    <div class="col-md-4x">
                        <label for="input13" class="form-label">Tanggal Peminjaman</label>
                        <input class="form-control mb-3" type="date" name="tanggal_pinjam" value="{{ $peminjaman->tanggal_pinjam }}" required>
                    </div>

                    <div class="col-md-4x">
                        <label for="input13" class="form-label">Batas Pengembalian</label>
                        <input class="form-control mb-3" type="date" name="batas_pinjam" value="{{ $peminjaman->batas_pinjam }}" required>
                    </div>

                    <div class="col-md-4x">
                        <label for="input13" class="form-label">Tanggal Pengembalian</label>
                        <input class="form-control mb-3" type="date" name="tanggal_kembali" value="{{ $peminjaman->tanggal_kembali }}" required>
                    </div>

                    <div class="col-md-4x">
                        <label for="input19" class="form-label">Status</label>
                        <select id="input19" name="status" class="form-select">
                            <option selected="">Pilih...</option>
                            <option value="0">Pinjam</option>
                            <option value="1">Kembalikan</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <div class="d-md-flex d-grid align-items-center gap-3">
                            <a href="{{route('buku.index')}}" class="btn btn-danger px-4">Batal</a>
                            <button type="submit" class="btn btn-primary px-4">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
