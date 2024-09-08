@extends('user.profileuser')
@section('content')
<div class="row">

    <div class="col-12 col-lg-4 col-xxl-3 d-flex">
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

    <div class="col-12 col-lg-4 col-xxl-3 d-flex">
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
                        <img src="{{asset('backend/assets/images/leptop/cart.avif')}}" width="100" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-4 col-xxl-3 d-flex">
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
                        <img src="{{asset('backend/assets/images/leptop/cart.avif')}}" width="100" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-xxl-12 d-flex">
        <div class="card rounded-4 w-100">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between mb-3">
                    <div class="">
                        <h5 class="mb-0">Daftar Peminjaman</h5>
                    </div>
                    <div class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle" data-bs-toggle="dropdown">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>



@endsection
