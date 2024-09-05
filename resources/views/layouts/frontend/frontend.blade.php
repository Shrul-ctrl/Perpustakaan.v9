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
    <div class="container-fluid bg-light position-relative shadow">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5 fixed-top">
            <a href="" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px">
                <img src="{{asset('images/buku/smk.png')}}" alt="" width="90" />
                <span class="text-primary">SMK ASSALAAM </span>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                {{-- <div class="navbar-nav font-weight-bold mx-auto py-0">
                    <a href="index.html" class="nav-item nav-link active">Home</a>
                    <a href="about.html" class="nav-item nav-link">About</a>
                    <a href="class.html" class="nav-item nav-link">Classes</a>
                    <a href="team.html" class="nav-item nav-link">Teachers</a>
                    <a href="gallery.html" class="nav-item nav-link">Gallery</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="blog.html" class="dropdown-item">Blog Grid</a>
                            <a href="single.html" class="dropdown-item">Blog Detail</a>
                        </div>
                    </div>
                    <a href="contact.html" class="nav-item nav-link">Contact</a>
                </div> --}}
                <div style="margin-left: auto">
                    <a href="{{ route('login') }}" class="btn btn-primary px-4">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary px-4">Register</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->

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

    <!-- About Start -->
    {{-- <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <img class="img-fluid rounded mb-5 mb-lg-0" src="{{asset('frontend/img/about-1.jpg')}}" alt="" />
    </div>
    <div class="col-lg-7">
        <p class="section-title pr-5">
            <span class="pr-2">Learn About Us</span>
        </p>
        <h1 class="mb-4">Best School For Your Kids</h1>
        <p>
            Invidunt lorem justo sanctus clita. Erat lorem labore ea, justo
            dolor lorem ipsum ut sed eos, ipsum et dolor kasd sit ea justo.
            Erat justo sed sed diam. Ea et erat ut sed diam sea ipsum est
            dolor
        </p>
        <div class="row pt-2 pb-4">
            <div class="col-6 col-md-4">
                <img class="img-fluid rounded" src="{{asset('frontend/img/about-2.jpg')}}" alt="" />
            </div>
            <div class="col-6 col-md-8">
                <ul class="list-inline m-0">
                    <li class="py-2 border-top border-bottom">
                        <i class="fa fa-check text-primary mr-3"></i>Labore eos amet
                        dolor amet diam
                    </li>
                    <li class="py-2 border-bottom">
                        <i class="fa fa-check text-primary mr-3"></i>Etsea et sit
                        dolor amet ipsum
                    </li>
                    <li class="py-2 border-bottom">
                        <i class="fa fa-check text-primary mr-3"></i>Diam dolor diam
                        elitripsum vero.
                    </li>
                </ul>
            </div>
        </div>
        <a href="" class="btn btn-primary mt-2 py-2 px-4">Learn More</a>
    </div>
    </div>
    </div>
    </div> --}}
    <!-- About End -->

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
                        <a href="{{ url('show' , $data->id) }}" >
                            <img src="{{ asset('images/buku/' . $data->foto) }}" alt="" class="card-img-top" alt="..." width="50" height="350">
                        </a>
                        <div class="card-body text-center">
                            <h4 class="card-title">{{$data->judul}}</h4>
                            <p class="card-text">
                                {{-- {{$data->deskripsi}} --}}
                            </p>
                        </div>
                        <a href="{{ url('show' , $data->id) }}" type="button" class="btn btn-primary px-4 mx-auto mb-4" >Lihat Detail</a>
                    </div>
                </div>
                @endforeach
                <div class="col-12 col-xl-6">
                    <!-- Modal -->
                    <div class="modal fade" id="ScrollableModal" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0 bg-grd-primary py-2">
                                    <h5 class="modal-title">Detail</h5>
                                    <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="modal">
                                        <i class="material-icons-outlined"></i>
                                    </a>
                                </div>
                                <div class="modal-body">

                                </div>
                                <div class="modal-footer border-top-0">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Batal</button>
                                    <button type="button" class="btn btn-primary">Pinjam buku</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Class End -->

    <!-- Registration Start -->
    {{-- <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <p class="section-title pr-5">
                        <span class="pr-2">Book A Seat</span>
                    </p>
                    <h1 class="mb-4">Book A Seat For Your Kid</h1>
                    <p>
                        Invidunt lorem justo sanctus clita. Erat lorem labore ea, justo
                        dolor lorem ipsum ut sed eos, ipsum et dolor kasd sit ea justo.
                        Erat justo sed sed diam. Ea et erat ut sed diam sea ipsum est
                        dolor
                    </p>
                    <ul class="list-inline m-0">
                        <li class="py-2">
                            <i class="fa fa-check text-success mr-3"></i>Labore eos amet
                            dolor amet diam
                        </li>
                        <li class="py-2">
                            <i class="fa fa-check text-success mr-3"></i>Etsea et sit dolor
                            amet ipsum
                        </li>
                        <li class="py-2">
                            <i class="fa fa-check text-success mr-3"></i>Diam dolor diam
                            elitripsum vero.
                        </li>
                    </ul>
                    <a href="" class="btn btn-primary mt-4 py-2 px-4">Book Now</a>
                </div>
                <div class="col-lg-5">
                    <div class="card border-0">
                        <div class="card-header bg-secondary text-center p-4">
                            <h1 class="text-white m-0">Book A Seat</h1>
                        </div>
                        <div class="card-body rounded-bottom bg-primary p-5">
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control border-0 p-4" placeholder="Your Name" required="required" />
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control border-0 p-4" placeholder="Your Email" required="required" />
                                </div>
                                <div class="form-group">
                                    <select class="custom-select border-0 px-4" style="height: 47px">
                                        <option selected>Select A Class</option>
                                        <option value="1">Class 1</option>
                                        <option value="2">Class 1</option>
                                        <option value="3">Class 1</option>
                                    </select>
                                </div>
                                <div>
                                    <button class="btn btn-secondary btn-block border-0 py-3" type="submit">
                                        Book Now
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Registration End -->

    <!-- Team Start -->
    {{-- <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5">
                    <span class="px-2">Our Teachers</span>
                </p>
                <h1 class="mb-4">Meet Our Teachers</h1>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-3 text-center team mb-5">
                    <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%">
                        <img class="img-fluid w-100" src="{{asset('frontend/img/team-1.jpg')}}" alt="" />
    <div class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
        <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px" href="#"><i class="fab fa-twitter"></i></a>
        <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px" href="#"><i class="fab fa-facebook-f"></i></a>
        <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px" href="#"><i class="fab fa-linkedin-in"></i></a>
    </div>
    </div>
    <h4>Julia Smith</h4>
    <i>Music Teacher</i>
    </div>
    <div class="col-md-6 col-lg-3 text-center team mb-5">
        <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%">
            <img class="img-fluid w-100" src="{{asset('frontend/img/team-2.jpg')}}" alt="" />
            <div class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px" href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px" href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px" href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
        <h4>Jhon Doe</h4>
        <i>Language Teacher</i>
    </div>
    <div class="col-md-6 col-lg-3 text-center team mb-5">
        <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%">
            <img class="img-fluid w-100" src="{{asset('frontend/img/team-3.jpg')}}" alt="" />
            <div class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px" href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px" href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px" href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
        <h4>Mollie Ross</h4>
        <i>Dance Teacher</i>
    </div>
    <div class="col-md-6 col-lg-3 text-center team mb-5">
        <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%">
            <img class="img-fluid w-100" src="{{asset('frontend/img/team-4.jpg')}}" alt="" />
            <div class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px" href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px" href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px" href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
        <h4>Donald John</h4>
        <i>Art Teacher</i>
    </div>
    </div>
    </div>
    </div> --}}
    <!-- Team End -->

    <!-- Testimonial Start -->
    {{-- <div class="container-fluid py-5">
        <div class="container p-0">
            <div class="text-center pb-2">
                <p class="section-title px-5">
                    <span class="px-2">Testimonial</span>
                </p>
                <h1 class="mb-4">What Parents Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                <div class="testimonial-item px-3">
                    <div class="bg-light shadow-sm rounded mb-4 p-4">
                        <h3 class="fas fa-quote-left text-primary mr-3"></h3>
                        Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr
                        eirmod clita lorem. Dolor tempor ipsum clita
                    </div>
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle" src="{{asset('frontend/img/testimonial-1.jpg')}}" style="width: 70px; height: 70px" alt="Image" />
                        <div class="pl-3">
                            <h5>Parent Name</h5>
                            <i>Profession</i>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item px-3">
                    <div class="bg-light shadow-sm rounded mb-4 p-4">
                        <h3 class="fas fa-quote-left text-primary mr-3"></h3>
                        Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr
                        eirmod clita lorem. Dolor tempor ipsum clita
                    </div>
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle" src="{{asset('frontend/img/testimonial-2.jpg')}}" style="width: 70px; height: 70px" alt="Image" />
                        <div class="pl-3">
                            <h5>Parent Name</h5>
                            <i>Profession</i>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item px-3">
                    <div class="bg-light shadow-sm rounded mb-4 p-4">
                        <h3 class="fas fa-quote-left text-primary mr-3"></h3>
                        Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr
                        eirmod clita lorem. Dolor tempor ipsum clita
                    </div>
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle" src="{{asset('frontend/img/testimonial-3.jpg')}}" style="width: 70px; height: 70px" alt="Image" />
                        <div class="pl-3">
                            <h5>Parent Name</h5>
                            <i>Profession</i>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item px-3">
                    <div class="bg-light shadow-sm rounded mb-4 p-4">
                        <h3 class="fas fa-quote-left text-primary mr-3"></h3>
                        Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr
                        eirmod clita lorem. Dolor tempor ipsum clita
                    </div>
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle" src="{{asset('frontend/img/testimonial-4.jpg')}}" style="width: 70px; height: 70px" alt="Image" />
                        <div class="pl-3">
                            <h5>Parent Name</h5>
                            <i>Profession</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Testimonial End -->

    <!-- Blog Start -->
    {{-- <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5">
                    <span class="px-2">Latest Blog</span>
                </p>
                <h1 class="mb-4">Latest Articles From Blog</h1>
            </div>
            <div class="row pb-3">
                <div class="col-lg-4 mb-4">
                    <div class="card border-0 shadow-sm mb-2">
                        <img class="card-img-top mb-2" src="{{asset('frontend/img/blog-1.jpg')}}" alt="" />
    <div class="card-body bg-light text-center p-4">
        <h4 class="">Diam amet eos at no eos</h4>
        <div class="d-flex justify-content-center mb-3">
            <small class="mr-3"><i class="fa fa-user text-primary"></i> Admin</small>
            <small class="mr-3"><i class="fa fa-folder text-primary"></i> Web Design</small>
            <small class="mr-3"><i class="fa fa-comments text-primary"></i> 15</small>
        </div>
        <p>
            Sed kasd sea sed at elitr sed ipsum justo, sit nonumy diam
            eirmod, duo et sed sit eirmod kasd clita tempor dolor stet
            lorem. Tempor ipsum justo amet stet...
        </p>
        <a href="" class="btn btn-primary px-4 mx-auto my-2">Read More</a>
    </div>
    </div>
    </div>
    <div class="col-lg-4 mb-4">
        <div class="card border-0 shadow-sm mb-2">
            <img class="card-img-top mb-2" src="{{asset('frontend/img/blog-2.jpg')}}" alt="" />
            <div class="card-body bg-light text-center p-4">
                <h4 class="">Diam amet eos at no eos</h4>
                <div class="d-flex justify-content-center mb-3">
                    <small class="mr-3"><i class="fa fa-user text-primary"></i> Admin</small>
                    <small class="mr-3"><i class="fa fa-folder text-primary"></i> Web Design</small>
                    <small class="mr-3"><i class="fa fa-comments text-primary"></i> 15</small>
                </div>
                <p>
                    Sed kasd sea sed at elitr sed ipsum justo, sit nonumy diam
                    eirmod, duo et sed sit eirmod kasd clita tempor dolor stet
                    lorem. Tempor ipsum justo amet stet...
                </p>
                <a href="" class="btn btn-primary px-4 mx-auto my-2">Read More</a>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mb-4">
        <div class="card border-0 shadow-sm mb-2">
            <img class="card-img-top mb-2" src="{{asset('frontend/img/blog-3.jpg')}}" alt="" />
            <div class="card-body bg-light text-center p-4">
                <h4 class="">Diam amet eos at no eos</h4>
                <div class="d-flex justify-content-center mb-3">
                    <small class="mr-3"><i class="fa fa-user text-primary"></i> Admin</small>
                    <small class="mr-3"><i class="fa fa-folder text-primary"></i> Web Design</small>
                    <small class="mr-3"><i class="fa fa-comments text-primary"></i> 15</small>
                </div>
                <p>
                    Sed kasd sea sed at elitr sed ipsum justo, sit nonumy diam
                    eirmod, duo et sed sit eirmod kasd clita tempor dolor stet
                    lorem. Tempor ipsum justo amet stet...
                </p>
                <a href="" class="btn btn-primary px-4 mx-auto my-2">Read More</a>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div> --}}
    <!-- Blog End -->

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
