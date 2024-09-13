@extends('layouts.frontend.profileuser')
@section('content')

<div class="row">
    <div class="col-12 col-lg-12 col-xxl-12">
        <div class="card bg-secondary text-light">
            <div class="card-header">
                <h4 class="card-title mb-0 py-1 text-light d-flex align-items-center gap-2 py-2"><i class="material-icons-outlined fs-2">warning_amber</i>Peraturan</h4>
            </div>
            <div class="card-body">
                <div class="row row-cols-auto g-3">
                    <li>Pastikan mengembalikan buku tepat waktu untuk menghindari denda.</li>
                    <li>Jaga kondisi buku dengan baik; kerusakan dapat dikenakan biaya.</li>
                    <li>Ajukan perpanjangan sebelum tanggal jatuh tempo jika perlu waktu lebih lama.</li>
                    <li>Laporkan segera jika buku hilang atau rusak untuk menghindari denda tambahan.</li>
                    <li>Bayar denda atau biaya keterlambatan segera untuk menghindari pembatasan peminjaman di masa depan.</li>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-lg-4 col-xxl-4">
        <div class="card rounded-4 w-100 bg ">
            <div class="card-body">
                <div class="">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <h5 class="mb-0">Peminjaman</h5>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="">
                            <h3 class="mb-0 text-indigo pb-3">{{$jumlahhistori}}</h3>
                            <a href="{{route('buku.index')}}" class="btn btn-primary rounded-5 border-0 px-4">Lihat Detail</a>
                        </div>
                        <img src="{{asset('backend/assets/images/leptop/cart.avif')}}" width="100" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-4 col-xxl-4">
        <div class="card rounded-4 w-100 bg ">
            <div class="card-body">
                <div class="">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <h5 class="mb-0">Favorit</h5>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="">
                            <h3 class="mb-0 text-indigo pb-3">{{$jumlahpenulis}}</h3>
                            <a href="{{route('penulis.index')}}" class="btn btn-primary rounded-5 border-0 px-4">Lihat Detail</a>
                        </div>
                        <img src="{{asset('backend/assets/images/leptop/p5.jfif')}}" width="100" alt="">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-4 col-xxl-4">
        <div class="card rounded-4 w-100 bg ">
            <div class="card-body">
                <div class="">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <h5 class="mb-0">Histori</h5>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="">
                            <h3 class="mb-0 text-indigo pb-3">{{$jumlahhistori}}</h3>
                            <a href="{{route('penerbit.index')}}" class="btn btn-primary rounded-5 border-0 px-4">Lihat Detail</a>
                        </div>
                        <img src="{{asset('backend/assets/images/leptop/cf.jfif')}}" width="149" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <!-- Profil -->
        <div class="col-lg-8 col-xxl-8 d-flex align-items-stretch">
        <div class="card w-100 rounded-4">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div class="">
                        <h5 class="mb-0">Daftar Peminjaman</h5>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-middle" id="example">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Buku</th>
                                {{-- <th scope="col">Nama Peminjam</th> --}}
                                <th scope="col">Jumlah</th>
                                <th scope="col">Tanggal Peminjaman</th>
                                <th scope="col">Batas Peminjaman</th>
                                {{-- <th scope="col">Tanggal Pengembalian</th> --}}
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjaman as $data)
                            @if ($data->status_pengajuan === 'diterima')
                            <tr>    
                                <th scope="row">{{ $loop->index+1 }}</th>
                                <td>{{ $data->buku->judul }}</td>
                                {{-- <td>{{ $data->nama_peminjam}}</td> --}}
                                <td>{{ $data->jumlah_pinjam }}</td>
                                <td>{{ $data->tanggal_pinjam }}</td>
                                <td>{{ $data->batas_pinjam }}</td>
                                {{-- <td>{{ $data->tanggal_kembali }}</td> --}}
                                <td>
                                    @if($data->status === 'Dikembalikan')
                                    <p class="badge bg-success">Sudah Dikembalikan</p>
                                    @else
                                    <p class="badge bg-danger">Masih Dipinjam</p>
                                    @endif
                                </td>
        
                                <td>
                                    <form action="{{ route('peminjaman.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('peminjaman.edit', $data->id) }}" class="btn btn-warning btn-small">Edit</a>
                                        {{-- <button type="submit" class="btn btn-danger btn-small" onclick="return confirm('Apakah anda yakin??')">Hapus</button> --}}
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel -->
    <div class="col-12 col-lg-4 col-xxl-4 d-flex flex-column">
        <div class="card rounded-4 w-100 bg ">
            <div class="card-body">
                <div class="col">
                    <h6 class="mb-0 text-uppercase">Baca Buku Terbaru</h6>
                    <hr>
                    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
                            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
                            <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            @foreach ($buku as $data)
                            <div class="carousel-item active">
                                <img src="{{ asset('images/buku/' . $data->foto) }}" alt="" class="card-img-top" alt="..." width="20" height="450" style=" filter: brightness(70%);object-fit:cover;">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5 class="text-light">{{$data->judul}}</h5>
                                    <p>{{$data->kategori->nama_kategori}}</p>
                                    <a href="{{ url('user/show', $data->id) }}" type="button" class="btn btn-primary">Detail</a>

                                </div>
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
