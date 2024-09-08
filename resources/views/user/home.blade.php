@extends('layouts.frontend.frontend')
@section('content')
<!-- Header Start -->
<div class="container-fluid bg-primary px-0 px-md-5 mb-5">
    <div class="row align-items-center px-3">
        <div class="col-lg-6 text-center text-lg-left">
            <h4 class="text-white mb-4 mt-5 mt-lg-0">SMK ASSALAAM</h4>
            <h1 class="display-3 font-weight-bold text-white">
                SMK ASSALAAM PERPUSTAKAAN
            </h1>
            <p class="text-white mb-4">
                Buku adalah jendela dunia. Dengan membaca, Anda membuka pintu ke pengalaman dan pengetahuan yang tak terhingga.
            </p>
            {{-- <a href="" class="btn btn-secondary mt-1 py-3 px-5">Learn More</a> --}}
        </div>
        <div class="col-lg-6 text-center text-lg-right">
            <img class="img-fluid mt-5" src="{{asset('frontend/img/header.png')}}" alt="" />
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Facilities Start -->
<div class="container-fluid pt-5">
    <div class="container pb-3">
        <div class="row">
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;height:200px;">
                    <i class="flaticon-050-fence h1 font-weight-normal text-primary mb-3"></i>
                    <div class="pl-4">
                        <h4>Meningkatkan Pengetahuan</h4>
                        <p class="m-0">

                            Membaca menambah wawasan dan informasi baru.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;height:200px;">
                    <i class="flaticon-022-drum h1 font-weight-normal text-primary mb-3"></i>
                    <div class="pl-4">
                        <h4>Mengasah Keterampilan Berpikir Kritis</h4>
                        <p class="m-0">
                            Membantu menganalisis dan memahami berbagai perspektif.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;height:200px;">
                    <i class="flaticon-030-crayons h1 font-weight-normal text-primary mb-3"></i>
                    <div class="pl-4">
                        <h4>Meningkatkan Konsentrasi</h4>
                        <p class="m-0">
                            Membaca meningkatkan fokus dan ketahanan mental.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;height:200px;">
                    <i class="flaticon-017-toy-car h1 font-weight-normal text-primary mb-3"></i>
                    <div class="pl-4">
                        <h4>Mengurangi Stres</h4>
                        <p class="m-0">
                            Membaca dapat menjadi pelarian dari tekanan dan kecemasan.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;height:200px;">
                    <i class="flaticon-025-sandwich h1 font-weight-normal text-primary mb-3"></i>
                    <div class="pl-4">
                        <h4> Meningkatkan Keterampilan Komunikasi</h4>
                        <p class="m-0">
                            Memperluas kosakata dan kemampuan berbahasa.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;height:200px;">
                    <i class="flaticon-047-backpack h1 font-weight-normal text-primary mb-3"></i>
                    <div class="pl-4">
                        <h4>Mendorong Kreativitas</h4>
                        <p class="m-0">
                            Memicu imajinasi dan ide-ide baru.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Facilities Start -->


<!-- Class Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="text-center pb-2">
            <p class="section-title px-5">
                <span class="px-2">Buku Terbaru</span>
            </p>
            <h1 class="mb-4">Buku</h1>
        </div>
        <div class="row">
            @php
            $limitedbuku = $buku ->take(4)
            @endphp
            @foreach ($limitedbuku as $data )
            <div class="col-lg-3 mb-5">
                <div class="card border-0 bg-light shadow-sm pb-2">
                    <a href="{{ url('show' , $data->id) }}">
                        <img src="{{ asset('images/buku/' . $data->foto) }}" alt="" class="card-img-top" alt="..." width="50" height="350">
                    </a>
                    <div class="card-body text-center">
                        <h4 class="card-title">{{$data->judul}}</h4>
                        <p class="card-text">
                            {{-- {{$data->deskripsi}} --}}
                        </p>
                    </div>
                    <div class="d-flex justify-content-center gap-2">
                        {{-- <a href="" type="button" class="btn btn-primary px-4 float-end mb-4 mr-5" data-bs-toggle="modal" data-bs-target="#ScrollableModal">Kembali</a> --}}
                        <a href="{{route('peminjaman.create')}}" type="button" class="btn btn-primary">Pinjam</a>
                        <a href="{{ url('show', $data->id) }}" type="button" class="btn btn-success">Ulas</a>
                        <a href="{{ url('user/show', $data->id) }}" type="button" class="btn btn-warning">Detail</a>
                    </div>

                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Class End -->
@endsection

{{-- <div class="modal fade" id="ScrollableModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 bg-grd-primary py-2">
                <h5 class="modal-title">Buku {{$bukus->judul}}</h5>
                <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="modal">
                    <i class="material-icons-outlined"></i>
                </a>
            </div>
            <div class="modal-body">
                <div class="des col-lg-8 col-md-6 pb-1">
                    <p>Judul : {{$bukus->judul}}</p>
                    <p>Penulis : {{$bukus->penuli->nama_penulis}}</p>
                    <p>Penerbit : {{$bukus->penerbit->nama_penerbit}}</p>
                    <p>Kategori : {{$bukus->kategori->nama_kategori}}</p>
                    <p>Jumlah : {{$bukus->jumlah}}</p>
                    <p>Sinopsis : {{$bukus->deskripsi}}</p>
                </div>
            </div>
            <div class="modal-footer border-top-0">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary">Kembali</button>  
            </div>
        </div>
    </div>
</div> --}}


