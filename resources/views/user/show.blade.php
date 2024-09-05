<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>SMA ASSALAAM</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <link href="{{asset('backend/assets/css/pace.min.css')}}" rel="stylesheet">
    <script src="{{asset('backend/assets/js/pace.min.js')}}"></script>

    <!--plugins-->
    <link href="{{asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />

    <!-- Flaticon Font -->
    <link href="{{asset('frontend/lib/flaticon/font/flaticon.css')}}" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="{{asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href="{{asset('frontend/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet" />
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid bg-light position-relative shadow pb-5">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5 fixed-top">
            <a href="" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px">
                <img src="{{asset('images/buku/smk.png')}}" alt="" width="90" />
                <span class="text-primary"></span>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div style="margin-left: auto">
                    <a href="{{ route('login') }}" class="btn btn-primary px-4">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary px-4">Register</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->
    <!-- Facilities Start -->
    <div class="container-fluid pt-5" style="margin-top: 50px ">
        <div class="container pb-3">
            <div class="row">
                <div class="col-lg-12 col-md-12 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4">
                        <div class="p-4 mt-5">
                            <h4>Buku {{$buku->judul}}</h4>
                            <p class="m-0'">
                                Buku{{$buku->judul}} lengkap. Buku {{$buku->judul}} yang ditulis oleh {{$buku->penuli->nama_penulis}}. Informasi selengkapnya mengenai Buku {{$buku->judul}} ada bawah ini.
                            </p>
                            <div class="row">
                                <div class="col-lg-4 col-md-6 pb-1">
                                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4">
                                        <img src="{{ asset('images/buku/' . $buku->foto) }}" alt="" class="card-img-top" class="card-img-top" width="50" height="450">
                                    </div>
                                </div>
                                <div class="des col-lg-8 col-md-6 pb-1">
                                    <p>Judul : {{$buku->judul}}</p>
                                    <p>Penulis : {{$buku->penuli->nama_penulis}}</p>
                                    <p>Penerbit : {{$buku->penerbit->nama_penerbit}}</p>
                                    <p>Kategori : {{$buku->kategori->nama_kategori}}</p>
                                    <p>Jumlah : {{$buku->jumlah}}</p>
                                    <p>Sinopsis : {{$buku->deskripsi}}</p>
                                </div>
                            </div>

                            <a href="" type="button" class="btn btn-primary px-4 float-end mb-4 mr-5" data-bs-toggle="modal" data-bs-target="#ScrollableModal">Pinjam</a>
                        </div>


                        <div class="modal fade" id="ScrollableModal" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header border-bottom-0 bg-grd-primary py-2">
                                        <h5 class="modal-title">Buku {{$buku->judul}}</h5>
                                        <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="modal">
                                            <i class="material-icons-outlined"></i>
                                        </a>
                                    </div>
                                    <div class="modal-body">
                                        <div class="des col-lg-8 col-md-6 pb-1">
                                            <p>Judul : {{$buku->judul}}</p>
                                            <p>Penulis : {{$buku->penuli->nama_penulis}}</p>
                                            <p>Penerbit : {{$buku->penerbit->nama_penerbit}}</p>
                                            <p>Kategori : {{$buku->kategori->nama_kategori}}</p>
                                            <p>Jumlah : {{$buku->jumlah}}</p>
                                            <p>Sinopsis : {{$buku->deskripsi}}</p>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-top-0">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-primary">Pinjam buku</button>
                                    </div>
                                </div>
                            </div>
                        </div>\
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="" class="navbar-brand font-weight-bold text-primary m-0 mb-4 p-0" style="font-size: 40px; line-height: 40px">
                    <i class="flaticon-043-teddy-bear"></i>
                    <span class="text-white">SMA Assalaam</span>
                </a>
                <p>
                    Labore dolor amet ipsum ea, erat sit ipsum duo eos. Volup amet ea
                    dolor et magna dolor, elitr rebum duo est sed diam elitr. Stet elitr
                    stet diam duo eos rebum ipsum diam ipsum elitr.
                </p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            {{-- <div class="col-lg-3 col-md-6 mb-5">
                <h3 class="text-primary mb-4">Get In Touch</h3>
                <div class="d-flex">
                    <h4 class="fa fa-map-marker-alt text-primary"></h4>
                    <div class="pl-3">
                        <h5 class="text-white">Alamat</h5>
                        <p>123 Street, New York, USA</p>
                    </div>
                </div>
                <div class="d-flex">
                    <h4 class="fa fa-envelope text-primary"></h4>
                    <div class="pl-3">
                        <h5 class="text-white">Email</h5>
                        <p>info@example.com</p>
                    </div>
                </div>
                <div class="d-flex">
                    <h4 class="fa fa-phone-alt text-primary"></h4>
                    <div class="pl-3">
                        <h5 class="text-white">Phone</h5>
                        <p>+012 345 67890</p>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="container-fluid pt-5" style="border-top: 1px solid rgba(23, 162, 184, 0.2) ;">
            <p class="m-0 text-center text-white">
                &copy;
                <a class="text-primary font-weight-bold" href="#">SMK Perpustakaan</a>.
                All Rights Reserved.

                <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                by
                <a class="text-primary font-weight-bold" href="https://htmlcodex.com">FAIZ</a>
                <br />Distributed By:
                <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
            </p>
        </div>
    </div>
    <a href="#" class="btn btn-primary p-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>
    <!-- Footer End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{asset('backend/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('frontend/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/lib/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('frontend/lib/lightbox/js/lightbox.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{asset('frontend/mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{asset('frontend/mail/contact.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('frontend/js/main.js')}}"></script>
</body>
</html>
