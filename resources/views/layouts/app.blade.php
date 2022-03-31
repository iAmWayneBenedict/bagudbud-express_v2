<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bagudbud Express') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}"></script>

    <!-- JQuery Ajax -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.min.js"
        integrity="sha512-bztGAvCE/3+a1Oh0gUro7BHukf6v7zpzrAb3ReWAVrt+bVNNphcl2tDTKCBr5zk7iEDmQ2Bv401fX3jeVXGIcA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="bg-white">
    <div id="app">

        <!-- Header -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('img/logo.png') }}" style="max-width: 8rem" alt="">
                </a>

                <!-- Side Links -->
                <div class="d-flex align-items-center">

                    <!-- Deliveries -->
                    <a href="" class="nav-link" style="color: #000; padding: 0; margin-right: 2rem">Deliveries</a>

                    <!-- Hamburger -->
                    <button class="navbar-toggler" style="outline: none; border:none; background:none; box-shadow:none"
                        type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                        aria-controls="offcanvasNavbar">

                        <!-- Lines -->
                        <div class="hamburger">

                            <!-- Content -->
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <!-- Lines -->

                    </button>
                    <!-- Hamburger -->

                </div>
                <!-- Side Links -->

                <!-- Sidebar -->
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                    aria-labelledby="offcanvasNavbarLabel">

                    <!-- Close Button Section -->
                    <div class="offcanvas-header">

                        <!-- Close Button  -->
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                        <!-- Close Button  -->

                    </div>
                    <!-- Close Button Section -->

                    <!-- Sidebar Links Section -->
                    <div class="offcanvas-body">

                        <!-- Sidebar Links Container -->
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

                            <!-- Sidebar Link -->
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Home</a>
                            </li>
                            <!-- Sidebar Link -->

                            <!-- Sidebar Link -->
                            <li class="nav-item">
                                <a class="nav-link" href="#">Link</a>
                            </li>
                            <!-- Sidebar Link -->

                            <!-- Sidebar Link Dropdown -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Dropdown
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                            <!-- Sidebar Link Dropdown -->

                        </ul>
                        <!-- Sidebar Links Container -->

                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                    <!-- Sidebar Links Section -->

                </div>
                <!-- Sidebar -->


            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="text-center text-lg-start bg-light text-muted">
            <!-- Section: Social media -->
            <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom"
                style="background: #39de7b">
                <!-- Left -->
                <div class="me-5 d-none d-lg-block">
                    <span class="text-white">Get connected with us on social networks:</span>
                </div>
                <!-- Left -->

                <!-- Right -->
                <div>
                    <a href="" class="me-4 text-white">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="" class="me-4 text-white">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="me-4 text-white">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="me-4 text-white">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="" class="me-4 text-white">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
                <!-- Right -->
            </section>
            <!-- Section: Social media -->

            <!-- Section: Links  -->
            <section class="">
                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Bagudbud Express
                            </h6>
                            <p>
                                Bagudbud Express guarantees reliable delivery of your items your customer, at the right
                                location in the right time through its effective distribution management.
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Useful Links
                            </h6>
                            <p>
                                <a href="#!" class="text-reset">Your Account</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Track a Package</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">About Us</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Contact Us</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Contact
                            </h6>
                            <p><i class="fas fa-home me-3"></i> San Miguel, Nabua, Camarines Sur</p>
                            <p>
                                <i class="fas fa-envelope me-3"></i>
                                <a href="mailto:bagudbudexpressph@gmail.com" style="text-decoration: none"
                                    class="text-reset">bagudbudexpressph@gmail.com</a>
                            </p>
                            <p><i class="fas fa-phone me-3"></i> <a href="tel:+63 912 3456 789" class="text-reset"
                                    style="text-decoration: none">+63 912 3456 789</a></p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                © 2021 Copyright:
                <a class="text-reset fw-bold" href="/">Bagudbud Express</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </div>

</body>

</html>
