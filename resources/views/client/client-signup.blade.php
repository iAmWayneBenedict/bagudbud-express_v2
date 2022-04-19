@extends('layouts.app-no-nav')

@section('content')
    <div class="con container-fluid h-full">
        <div class="row d-flex h-100">

            <!-- left container -->

            <div class="col col-lg-3 position-relative p-0 d-none d-md-block">
                <div
                    class="row position-fixed w-26 h-100 p-0 bg-primary d-flex flex-column justify-content-center align-items-end">
                    <div class="col d-flex justify-content-center align-items-center">
                        <div class="container-fluid d-flex flex-column px-5">
                            <a href="/client-login"
                                class="border border-outline-secondary position-relative d-flex justify-content-center align-items-center text-decoration-none display-9 fw-bold rounded bg-white text-black mb-4 p-2 p-xxl-3">
                                Already have an account? Sign in
                            </a>
                        </div>
                    </div>
                    <div
                        class=" col left-links d-flex flex-column justify-content-end align-items-center display-8 text-white pb-4">
                        <div class="links">
                            <a href="#" class="link-light text-decoration-none pe-md-1 pe-2">Terms and Conditions</a>
                            |
                            <a href="#" class="link-light text-decoration-none ps-md-1 ps-2">Privacy Policy</a>
                        </div>
                        <span class="display-8">All Rights Reserved 2021</span>
                    </div>
                </div>
            </div>

            <!-- right container -->

            <div class="col col-md-8 px-xl-5 mx-auto py-5 my-4">
                <form method="POST" class="container" id="form">
                    @csrf
                    <div class="row row-cols-1 row-cols-lg-2 mb-5">
                        <div class="col d-flex justify-content-center align-items-center px-1 px-lg-2 px-xxl-5">
                            <img src="{{ asset('img/logo.png') }}" class="w-75 img-fluid" alt="logo">
                        </div>
                        <span class="col"></span>
                    </div>

                    <!-- Title row -->

                    <div class="row row-cols-1 row-cols-lg-2">
                        <div class="col d-flex flex-column px-1 px-lg-2 px-xxl-5">
                            <div class="d-inline-flex">
                                <span class="signin-title title position-relative display-4 fw-bolder mt-2 mb-4">Sign
                                    up</span>
                            </div>
                        </div>
                        <div class="col-6 px-1 px-lg-2 px-xxl-5"></div>
                    </div>

                    <!-- First name and Last name row -->

                    <!-- First name -->

                    <div class="row row-cols-1 row-cols-lg-2">
                        <div class="col ps-1 ps-lg-2 ps-xxl-5">
                            <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                <label for="first-name"
                                    class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">First
                                    name</label>
                                <input type="text" name="f_name"
                                    class="form-control form-control-sm py-2 py-xxl-3 fw-lighter" id="f_name"
                                    placeholder="First name">
                                <span class="text-danger text-center display-8 fw-bold mt-2 d-none alerts">Error
                                    message!</span>
                            </div>
                        </div>

                        <!-- Last name -->

                        <div class="col ps-1 pe-lg-2 pe-xxl-5">
                            <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                <label for="last-name"
                                    class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Last
                                    name</label>
                                <input type="text" name="l_name"
                                    class="form-control form-control-sm py-2 py-xxl-3 fw-lighter" id="l_name"
                                    placeholder="Last name">
                                <span class="text-danger text-center display-8 fw-bold mt-2 d-none alerts">Error
                                    message!</span>
                            </div>
                        </div>
                    </div>

                    <!-- <hr class="border border-0 border-top-1 border-black opacity-10"> -->

                    <!-- Phone Number and Email row -->

                    <!-- Phone number -->

                    <div class="row row-cols-1 row-cols-lg-2 mt-2">
                        <div class="col ps-1 ps-lg-2 ps-xxl-5">
                            <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                <label for="phone-number"
                                    class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Phone
                                    number</label>
                                <input type="number" name="contact_num"
                                    class="form-control form-control-sm py-2 py-xxl-3 fw-lighter" id="contact_num"
                                    placeholder="Phone number">
                                <span class="text-danger text-center display-8 fw-bold mt-2 d-none alerts">Error
                                    message!</span>
                            </div>
                        </div>

                        <!-- Email -->

                        <div class="col ps-1 pe-lg-2 pe-xxl-5">
                            <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                <label for="email"
                                    class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Email</label>
                                <input type="email" name="email"
                                    class="form-control form-control-sm py-2 py-xxl-3 fw-lighter" id="email"
                                    placeholder="Email">
                                <span class="text-danger text-center display-8 fw-bold mt-2 d-none alerts">Error
                                    message!</span>
                            </div>
                        </div>
                    </div>


                    <div class="row row-cols-1 row-cols-lg-2 mt-2">
                        <div class="col ps-1 ps-lg-2 ps-xxl-5">
                            <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                <label for="password"
                                    class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Password</label>
                                <input type="password" name="password"
                                    class="form-control form-control-sm py-2 py-xxl-3 fw-lighter" id="password"
                                    placeholder="Password">
                                <span class="text-danger text-center display-8 fw-bold mt-2 d-none alerts">Error
                                    message!</span>
                            </div>
                        </div>

                        <!-- Email -->

                        <div class="col ps-1 pe-lg-2 pe-xxl-5">
                            <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                <label for="municipality"
                                class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Municipality</label>
                            <input class="form-control form-control-sm py-2 py-xxl-3 fw-lighter"
                                list="municipality-list" id="municipality" placeholder="Municipality"
                                name="municipality">
                            <span class="text-danger text-center display-8 fw-bold mt-2 d-none alerts">Error
                                message!</span>
                            <datalist id="municipality-list">
                                <option value="Baao">
                                <option value="Bato">
                                <option value="Balatan">
                                <option value="Bula">
                                <option value="Buhi">
                                <option value="Nabua">
                                <option value="Iriga City">
                            </datalist>
                            </div>
                        </div>
                    </div>
                    <!-- zone and Barangay row -->

                    <div class="row row-cols-1 row-cols-lg-2">
                        <div class="col ps-1 ps-lg-2 ps-xxl-5">
                            <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                    <label for="barangay"
                                        class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Barangay</label>
                                    <input type="text" name="barangay"
                                        class="form-control form-control-sm py-2 py-xxl-3 fw-lighter" id="barangay"
                                        placeholder="Barangay">
                                    <span class="text-danger text-center display-8 fw-bold mt-2 d-none alerts">Error
                                        message!</span>
                                </div>
                            </div>
                        </div>

                        <!-- Email -->

                        <div class="col ps-1 pe-lg-2 pe-xxl-5">
                            <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                    <label for="zone-street"
                                        class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Zone
                                        / Street</label>
                                    <input type="text" name="zone"
                                        class="form-control form-control-sm py-2 py-xxl-3 fw-lighter" id="zone"
                                        placeholder="Zone or Street">
                                    <span class="text-danger text-center display-8 fw-bold mt-2 d-none alerts">Error
                                        message!</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Client Shop Name -->

                    <div class="row row-cols-1 row-cols-lg-2 mt-2">
                        <div class="col ps-1 ps-lg-2 ps-xxl-5">
                            <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                <label for="client-shop-name"
                                    class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Shop
                                    Name</label>
                                <input type="text" name="business_name"
                                    class="form-control form-control-sm py-2 py-xxl-3 fw-lighter" id="business_name"
                                    placeholder="Shop Name">
                                <span class="text-danger text-center display-8 fw-bold mt-2 d-none alerts">Error
                                    message!</span>
                            </div>
                        </div>

                        <!-- Product Name -->

                        <div class="col ps-1 pe-lg-2 pe-xxl-5">
                            <div class="mt-xxl-3 mb-lg-2 d-flex flex-column">
                                <label for="product-name"
                                    class="fw-bold display-7 form-label col-form-label col-form-label-sm mt-1 mt-lg-0">Product
                                    Type</label>
                                <select class="form-select form-select-sm py-2 py-xxl-3 fw-lighter"
                                    aria-label=".form-select-sm example" name="product_type">
                                    <option value="All" selected>All</option>
                                    <option value="Beauty Products">Beauty Products</option>
                                    <option value="Fashion">Fashion</option>
                                    <option value="Food">Food</option>
                                    <option value="Gadgets">Gadgets</option>
                                    <option value="Home Products">Home Products</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Terms and Conditions -->

                    <div class="row row-cols-1 mt-3">
                        <div class="col ms-1 ms-lg-2 ms-xxl-5 form-check form-check-inline mt-xxl-3 mb-lg-2">
                            <input class="form-check-input" type="checkbox" id="notif-checkbox" value="">
                            <label class="form-check-label fw-lighter display-7" for="notif-checkbox">Yes, I want to
                                recieve notifications from <a href=""
                                    class="a-link2 position-relative text-decoration-none text-black fw-bold">Bagudbud
                                    Express</a></label>
                        </div>
                        <div class="col ms-1 ms-lg-2 ms-xxl-5 form-check form-check-inline mt-xxl-3 mb-lg-2">
                            <input class="form-check-input" type="checkbox" id="terms-and-policies" value="">
                            <label class="form-check-label fw-lighter display-7" for="terms-and-policies">I agree to the
                                <a href="" class="a-link2 position-relative text-decoration-none text-black fw-bold">Terms
                                    and
                                    Services</a>
                                and
                                <a href="" class="a-link2 position-relative text-decoration-none text-black fw-bold">Privacy
                                    policy</a>
                            </label>
                        </div>
                    </div>

                    <div class="col ps-1 pe-1 pe-lg-2 pe-xxl-5 mt-4 mb-0 pb-0">
                        <div class="d-flex flex-row-reverse justify-content-start align-items-center h-100">
                            <button type="submit"
                                class="submit-btn btn btn-primary border-2 text-black mt-3 px-4 px-xxl-5 py-xxl-2">
                                <span class="display-6 fw-bold text-white">Next</span>
                            </button>
                            <a href="/client-login"
                                class="btn btn-transparent button-active-transparent text-black mt-3 me-2 px-3 px-xxl-5 py-2">
                                <span class="display-7 fw-normal">Return</span>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script>
        $(document).ready(function () {
            $('#form').submit(function (e) { 
                e.preventDefault();

                // alert('Good');
                const fdata = new FormData(this);
                $.ajax({
                    url: '{{ route('store')}}',
                    method: 'post',
                    data: fdata,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    success: function (res) {
                        if(res.code == 200){
                            alert(res.mssg);
                            //it should be clear the form inputs and alert a message
                        }
                        if(res.code == 404){
                            $('.text-danger').addClass('d-none');
                            $.each(res.errors, function (key, val) { 
                                $(`#${key}`).next().text(val).removeClass('d-none');
                            });
                        }
                    }
                });
            });
        });
    </script>
@endsection
