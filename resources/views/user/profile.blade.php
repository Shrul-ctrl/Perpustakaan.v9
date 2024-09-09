@extends('layouts.frontend.profileuser')
@section('content')
<div class="container   ">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8 col-xxl-8">
            <div class="card rounded-4 w-100 bg">
                <div class="card-body">
                    <div class="position-relative">
                        <img src="{{ asset('backend/assets/images/gallery/18.png') }}" class="img-fluid rounded" alt="">
                        <div class="position-absolute top-100 start-50 translate-middle">
                            <img src="{{ asset('backend/assets/images/gallery/02.png') }}" width="100" height="100" class="rounded-circle raised p-1 bg-white" alt="">
                        </div>
                    </div>
                    <div class="text-center mt-5 pt-4">
                        <h5 class="mb-2">{{ $user->name }}</h5>
                        {{-- <p class="mb-0">Marketing Executive</p> --}}
                    </div>
                    <div class="d-flex align-items-center justify-content-around mt-5">
                        <form class="row g-3" method="POST" action="{{ route('peminjaman.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label for="input13" class="form-label">Email</label>
                                <input class="form-control mb-3" type="text" name="nama_peminjam" placeholder="Nama Peminjam" value="{{ $user->email }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="input13" class="form-label">Nomor Telepon</label>
                                <input class="form-control mb-3" type="text" name="nama_peminjam" placeholder="Nama Peminjam" value="{{ $user->no_hp }}" disabled>
                            </div>

                            <div class="col-md-6">
                                <label for="input13" class="form-label">Alamat Rumah</label>
                                <input class="form-control mb-3" type="text" name="nama_peminjam" placeholder="Nama Peminjam" value="{{ $user->alamat }}" disabled>
                            </div>
                        </form>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
