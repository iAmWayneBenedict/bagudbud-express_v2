@extends('layouts.app-no-nav')

@section('content')
    <div class="con container-fluid h-full">
        <div class="row d-flex h-100">

            <!-- left container -->

            <div class="col container-fluid d-flex justify-content-center align-items-center">
                <div class="row h-100" style="width: 30rem;">
                    <div class="col form-container d-flex flex-column justify-content-center align-items-center my-3">
                        <img src="{{ asset('img/logo.png') }}" class="logo-form img-fluid w-75 mb-4 mb-xxl-5 px-5 pb-3"
                            alt="logo">
                        <form action="{{ url('login_Auth') }}" method="POST" class="container d-flex flex-column"
                            id="log_form">
                            @csrf
                            <div class="d-inline-flex mb-2 mb-xxl-3">
                                <h3 class="signin-title title position-relative fw-bolder display-4">Sign in</h3>
                            </div>

                            <!-- Error message -->
                            @if (Session::has('fail'))
                                <div class="alert alert-danger d-flex justify-content-center align-items-center p-2 py-3"
                                    role="alert">
                                    <p class="display-7 m-0 fw-normal">
                                        {{-- Message Here --}}
                                        {{ Session::get('fail') }}
                                    </p>
                                </div>
                            @endif
                            @if (Session::has('success'))
                                <div class="alert alert-danger d-flex justify-content-center align-items-center p-2 py-3"
                                    role="alert">
                                    <p class="display-7 m-0 fw-normal">
                                        {{-- Message Here --}}
                                        {{ Session::get('success') }}
                                    </p>
                                </div>
                            @endif

                            <!-- End of error message -->

                            <div class="mb-2 mb-xxl-3">
                                <label for="emailOrUsername"
                                    class="form-label col-form-label col-form-label-sm display-7 fw-normal">Email</label>
                                <input type="email" name="email" class="form-control form-control-sm py-2 py-xxl-3 fw-light"
                                    id="emailOrUsername" placeholder="Email or Username">
                                <span class="text-danger text-center display-8 fw-bold mt-2 alerts">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="mb-1 mb-xxl-2">
                                <label for="password"
                                    class="form-label col-form-label col-form-label-sm display-7 fw-normal">Password</label>
                                <div class="position-relative">
                                    <input type="password" name="password"
                                        class="password-container form-control form-control-sm fw-light py-2 py-xxl-3 pe-5"
                                        id="password" placeholder="Password">
                                    <span class="position-absolute top-50 translate-middle-y opacity-75"
                                        style="right: 1rem; cursor: pointer;">
                                        <img src="{{ asset('img/blind.png') }}" class="password-icon"
                                            style="width: 1.25rem;" alt="">
                                    </span>
                                </div>
                                <span class="text-danger text-center display-8 fw-bold mt-2 alerts">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="join-now-container d-flex justify-content-between flex-row-reverse px-xl-1">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Remember Me
                                    </label>
                                </div>
                                <div class="d-flex justify-content-center align-items-center">
                                    <p class="overflow-hidden">
                                        <a href="{{ route('forgot-password') }}"
                                            class="display-7 fw-bold link-dark text-decoration-none position-relative overflow-hidden a-link ms-1 pb-0">Forgot
                                            Password?</a>
                                    </p>
                                </div>
                            </div>
                            <button type="submit"
                                class="submit-btn btn btn-outline-primary border-2 btn-lg button-active-dark text-black position-relative mt-xxl-3">
                                <span class="display-6 fw-bold d-block p-xxl-2">Sign in</span>
                            </button>
                            <div class="join-now-container d-flex justify-content-center px-xl-1 mt-5 flex-column">
                                <div class="d-flex justify-content-center align-items-center">
                                    <p class="display-7">
                                        Don't have an account?
                                    </p>
                                    <p class="overflow-hidden">
                                        <a href="/client-signup"
                                            class="display-7 fw-bold link-dark text-decoration-none position-relative overflow-hidden a-link ms-1 pb-0">Join
                                            now</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- right container -->

            <div class="col d-none d-lg-block">
                <div class="row d-flex align-items-center position-relative h-100">
                    <svg class="position-absolute top-0 right-0 px-0" viewBox="0 0 728 1080" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect x="954.182" y="-65" width="1012.95" height="1285.99" rx="65"
                            transform="rotate(40.5 954.182 -65)" fill="#3CD87A" fill-opacity="0.83" />
                        <rect x="835.182" y="-459" width="1351.62" height="1285.99" rx="100"
                            transform="rotate(40.5 835.182 -459)" fill="#3CD87A" />
                        <rect x="857.182" y="-622" width="1012.95" height="1285.99" rx="100"
                            transform="rotate(40.5 857.182 -622)" fill="#3CD87A" fill-opacity="0.55" />
                    </svg>
                    <img src="{{ asset('img/delivery-express-courier-philippines-og.jpg') }}" class="z-index-1 w-full-90"
                        alt="">
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(() => {
            $('svg').height($('svg').parent().height());
            $(window).resize(() => {
                $('svg').height($('svg').parent().height());
            });

            $('.password-icon').click(function() {
                let getUrl = window.location;
                let baseUrl = `${getUrl.protocol}//${getUrl.host}/${getUrl.pathname.split('/')[0]}`;
                if ($(this).attr('src') === `${baseUrl}img/visible-eye.png`) {
                    $(this).attr('src', `${baseUrl}img/blind.png`);
                    $('.password-container').attr('type', 'password');
                } else {
                    $(this).attr('src', `${baseUrl}img/visible-eye.png`);
                    $('.password-container').attr('type', 'text');
                }
            });
        });
    </script>
@endsection
