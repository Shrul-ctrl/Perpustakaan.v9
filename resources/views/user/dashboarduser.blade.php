@extends('layouts.frontend.profileuser')
@section('content')

<div class="row">
    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
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
                            <h3 class="mb-0 text-indigo pb-3">{{$jumlahbuku}}</h3>
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
                        <h5 class="mb-0">Pengembalian</h5>
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
                        <h5 class="mb-0">Favorite</h5>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="">
                            <h3 class="mb-0 text-indigo pb-3">{{$jumlahpenerbit}}</h3>
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
    <div class="col-12 col-lg-6 col-xxl-6 d-flex">
        <div class="card rounded-4 w-100 bg">
            <div class="card-body">
                <div class="position-relative">
                    <img src="{{asset('backend/assets/images/gallery/18.png')}}" class="img-fluid rounded" alt="">
                    <div class="position-absolute top-100 start-50 translate-middle">
                        <img src="{{asset('backend/assets/images/gallery/02.png')}}" width="100" height="100" class="rounded-circle raised p-1 bg-white" alt="">
                    </div>
                </div>
                <div class="text-center mt-5 pt-4">
                    <h5 class="mb-2">Julinee Moree</h5>
                    <p class="mb-0">Marketing Excutive</p>
                </div>
                <div class="d-flex align-items-center justify-content-around mt-5">
                    <div class="d-flex flex-column gap-2">
                        <h4 class="mb-0">798</h4>
                        <p class="mb-0">Posts</p>
                    </div>
                    <div class="d-flex flex-column gap-2">
                        <h4 class="mb-0">48K</h4>
                        <p class="mb-0">Following</p>
                    </div>
                    <div class="d-flex flex-column gap-2">
                        <h4 class="mb-0">24.3M</h4>
                        <p class="mb-0">Followers</p>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>


    <div class="col-6 col-lg-6 col-xxl-6 d-flex">
        <div class="row">
            <div class="card rounded-4 w-100 bg ">
                <div class="card-body">
                    <div class="">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <h5 class="mb-0">Pengembalian</h5>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="">
                                <h3 class="mb-0 text-indigo pb-3"></h3>
                                <a href="{{route('penulis.index')}}" class="btn btn-primary rounded-5 border-0 px-4">Lihat Detail</a>
                            </div>
                            <img src="{{asset('backend/assets/images/leptop/cart.avif')}}" width="100" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card rounded-4 w-100 bg ">
                <div class="card-body">
                    <div class="">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <h5 class="mb-0">Pengembalian</h5>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="">
                                <h3 class="mb-0 text-indigo pb-3"></h3>
                                <a href="{{route('penulis.index')}}" class="btn btn-primary rounded-5 border-0 px-4">Lihat Detail</a>
                            </div>
                            <img src="{{asset('backend/assets/images/leptop/cart.avif')}}" width="100" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






<div class="row">
    <div class="col-lg-12 col-xxl-8 d-flex align-items-stretch">
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
                                <th scope="col">Nama Peminjam</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Tanggal Peminjaman</th>
                                <th scope="col">Batas Peminjaman</th>
                                <th scope="col">Tanggal Pengembalian</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjaman as $data)
                            <tr>
                                <th scope="row">{{ $loop->index+1 }}</th>
                                <td>{{ $data->buku->judul }}</td>
                                <td>{{ $data->nama_peminjam}}</td>
                                <td>{{ $data->jumlah }}</td>
                                <td>{{ $data->tanggal_pinjam }}</td>
                                <td>{{ $data->batas_pinjam }}</td>
                                <td>{{ $data->tanggal_kembali }}</td>
                                <td>
                                    @if($data->status)
                                    <p class="dash-lable mb-0 bg-success bg-opacity-10 text-success rounded-2">Sudah di kembalikan</p>
                                    @else
                                    <p class="dash-lable mb-0 bg-danger bg-opacity-10 text-danger rounded-2">Masih dipinjam</p>
                                    @endif
                                </td>
                                {{-- <td>
                                    <p class="dash-lable mb-0 bg-success bg-opacity-10 text-success rounded-2">Completed</p>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
