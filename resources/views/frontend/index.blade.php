<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Tracking Covid-19</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets2/img/favicon.png" rel="icon">
    <link href="assets2/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets2/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets2/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets2/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets2/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets2/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets2/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets2/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Medilab - v4.0.0
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <?php
    $dataid = file_get_contents('https://api.kawalcorona.com/indonesia');
    $id = json_decode($dataid, true);
    $dataidprovinsi = file_get_contents('https://api.kawalcorona.com/indonesia/provinsi');
    $idprovinsi = json_decode($dataidprovinsi, true);
    $datadunia = file_get_contents('https://api.kawalcorona.com/');
    $dunia = json_decode($datadunia, true);
    ?>


    <!-- Header -->
    <nav class="navbar navbar-expand-md navbar-light bg-grey shadow-sm">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto navbar-brand">
                <li class="nav-item active">
                    <a class="nav-link" href="#">
                        <img src="{{ asset('/assets/img/5.jpg') }}" height="50" weight="50" class="navbar-brand-img"
                            alt="...">
                        <h4>Project Raden</h4>
                    </a>
                </li>
            </ul>
        </div>

        <div class="navbar-collapse collapse w-100 order-3 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto">
            </ul>
        </div>
    </nav>

    <!-- End Header -->
    <!-- Content -->
    <div class="container-fluid">
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-4 text-center">DATA CORONA</h1>
                <p class="lead m-0 text-center">Data Corona Global & Indonesia Live Data</p>
                <br>
            </div>
            <br><br>
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card bg-info img-card box-primary-shadow" style="margin-top:50px">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="text-white">
                                    <p class="text-black mb-0">TOTAL POSITIF</p>
                                    <p class="text-white mb-0">{{ $positif }}</p>
                                    <p class="text-white mb-0">ORANG</p>
                                </div>
                                <div class="ml-auto">
                                    <img src="{{ asset('assets/img/1.png') }}" alt="Positif" width="50" height="50">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card bg-danger img-card box-secondary-shadow" style="margin-top:50px">

                        <div class="card-body">
                            <div class="d-flex">
                                <div class="text-white">
                                    <p class="text-white mb-0">TOTAL SEMBUH</p>
                                    <p class="text-white mb-0">{{ $sembuh }}</p>
                                    <p class="text-white mb-0">ORANG</p>
                                </div>
                                <div class="ml-auto">
                                    <img src="{{ asset('assets/img/2.png') }}" alt="Positif" width="50" height="50">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card bg-primary img-card box-success-shadow" style="margin-top:50px">

                        <div class="card-body">
                            <div class="d-flex">
                                <div class="text-white">
                                    <p class="text-white mb-0">TOTAL MENINGGAL</p>
                                    <p class="text-white mb-0">{{ $meninggal }}</p>
                                    <p class="text-white mb-0">ORANG</p>
                                </div>
                                <div class="ml-auto">
                                    <img src="{{ asset('assets/img/4.png') }}" alt="Positif" width="50" height="50">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="card bg-warning img-card box-success-shadow" style="margin-top:50px">

                        <div class="card-body">
                            <div class="d-flex">
                                <div class="text-white">
                                    <p class="text-white mb-0">INDONESIA</p>
                                    <p class="text-white mb-0">
                                    <p class="text-white mb-0"> &nbsp; POSITIF &nbsp;{{ $positif }}&nbsp; Orang,
                                        &nbsp;</p>
                                    <hr>
                                    <p class="text-white mb-0"> &nbsp; SEMBUH &nbsp;{{ $sembuh }}&nbsp; Orang,
                                        &nbsp;</p>
                                    <hr>
                                    <p class="text-white mb-0"> &nbsp; MENINGGAL &nbsp;{{ $meninggal }}&nbsp; Orang.
                                        &nbsp;</p>

                                    </p>
                                </div>

                                <div class="ml-auto">
                                    <img src="{{ asset('assets/img/3.png') }}" alt="Positif" width="50" height="50">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <hr>
            <a>
                <center>
                    <h2>Menginput Data Corona Berdasarkan Provinsi</h2>
                </center>
            </a>
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    <center>@auth
                            <a href="{{ url('/home') }}" class="btn btn-block btn-dark">
                                Klik Disini
                            </a>

                        @else
                            <a href="{{ url('/home') }}" class="btn btn-block btn-dark">
                                Klik Disini
                            </a>

                        @endauth
                    </center>
                </div>
            @endif
            <hr>
            <br>
            <div class="row row-cards">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-14">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Data Corona di Indonesia Berdasarkan Provinsi
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Provinsi</th>
                                            <th>Positif</th>
                                            <th>Sembuh</th>
                                            <th>Meninggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($provinsi as $data)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $data->nama_provinsi }}</td>
                                                <td>{{ $data->positif }}</td>
                                                <td>{{ $data->sembuh }}</td>
                                                <td>{{ $data->meninggal }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>

            <div class="row row-cards">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-14">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Data Corona Global
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Negara</th>
                                            <th>Positif</th>
                                            <th>Sembuh</th>
                                            <th>Meninggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        <?php for ($i = 0; $i <= 191; $i++) { ?> <tr>
                                            <td> <?php echo $i + 1; ?></td>
                                            <td> <?php echo $dunia[$i]['attributes']['Country_Region'];
                                                ?></td>
                                            <td> <?php echo $dunia[$i]['attributes']['Confirmed']; ?></td>
                                            <td><?php echo $dunia[$i]['attributes']['Recovered']; ?></td>
                                            <td><?php echo $dunia[$i]['attributes']['Deaths']; ?></td>
                                            </tr>
                                            <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Optional JavaScript -->

    <!-- Vendor JS Files -->
    <script src="assets2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets2/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets2/vendor/php-email-form/validate.js"></script>
    <script src="assets2/vendor/purecounter/purecounter.js"></script>
    <script src="assets2/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets2/js/main.js"></script>


</body>

</html>
