@extends('layouts.backend.backend')
@section('js')
    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}    
@endsection
@section('content')
<div class="row">

    <div class="col-12 col-lg-3 col-xxl-3 d-flex">
        <div class="card rounded-4 w-100 bg ">
            <div class="card-body">
                <div class="">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <h5 class="mb-0">Tabel Buku</h5>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="">
                            <h3 class="mb-0 text-indigo pb-3">{{$jumlahbuku}}</h3>
                            <a href="{{route('buku.index')}}" class="btn btn-primary rounded-5 border-0 px-4">Detail</a>
                        </div>
                        <img src="{{asset('backend/assets/images/leptop/cf.jfif')}}" width="123" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-3 col-xxl-3 d-flex">
        <div class="card rounded-4 w-100 bg ">
            <div class="card-body">
                <div class="">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <h5 class="mb-0">Jumlah Peminjaman</h5>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="">
                            <h3 class="mb-0 text-indigo pb-3">{{$jumlahpeminjamanbuku}}</h3>
                            <a href="{{route('indexpeminjaman')}}" class="btn btn-primary rounded-5 border-0 px-4">Detail</a>
                        </div>
                        <img src="{{asset('backend/assets/images/leptop/cart.avif')}}" width="100" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-3 col-xxl-3 d-flex">
        <div class="card rounded-4 w-100 bg ">
            <div class="card-body">
                <div class="">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <h5 class="mb-0">Jumlah Pengguna</h5>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="">
                            <h3 class="mb-0 text-indigo pb-3">{{$jumlahuser}}</h3>
                            <a href="{{route('user.index')}}" class="btn btn-primary rounded-5 border-0 px-4">Detail</a>
                        </div>
                        <img src="{{asset('backend/assets/images/leptop/p5.jfif')}}" width="100" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-3 col-xxl-3 d-flex">
        <div class="card rounded-4 w-100 bg ">
            <div class="card-body">
                <div class="">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <h5 class="mb-0">Ulasan</h5>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="">
                            <h3 class="mb-0 text-indigo pb-3">{{$jumlahkomentar}}</h3>
                            <a href="{{route('kategori.index')}}" class="btn btn-primary rounded-5 border-0 px-4">Detail</a>
                        </div>
                        <img src="{{asset('backend/assets/images/leptop/cart.avif')}}" width="100" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-6 col-xxl-6 d-flex">
        <div class="card rounded-4 w-100">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div class="">
                        <h5 class="mb-0">Daftar Penugguna</h5>
                    </div>
                    <div class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle" data-bs-toggle="dropdown">
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-middle mb-0 table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pengguna</th>
                                <th>email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $data)
                            @if ($data->isAdmin == '0')
                            <tr>
                                <th scope="row">{{ $loop->index+1 }}</th>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-xl-6">
        <div class="card rounded-4">
            <div class="card-header py-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="">
                        <h5 class="mb-0">Chart Tabel</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{-- <div id="chart4"></div> --}}
                {!! $chart->container() !!}
            </div>
        </div>
    </div>

    <div class="col-12 col-xl-12">
        <div class="card rounded-4">
            <div class="card-header py-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="">
                        <h5 class="mb-0">Daftar Pinjaman Buku</h5>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div id="chartpeminjaman"></div>
            </div>
        </div>
    </div>
</div>
@endsection



