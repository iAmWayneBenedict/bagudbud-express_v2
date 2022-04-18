@extends('layouts.app-no-nav')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="height: 80vh">
        <div style="max-width: 30rem; width: 100%" class="p-5">
            <h1 class="mb-3 text-center fs-1">Reset Password</h1>
            <p class="mb-4 text-secondary">Fear not! We'll email you instructions to reset your password.</p>
            <form>
                <div class="mb-2 mb-xxl-3">
                    <label for="email" class="form-label col-form-label col-form-label-sm display-7 fw-normal">Email </label>
                    <input type="email" name="email" class="form-control form-control-sm py-2 py-xxl-3 fw-light" id="email"
                        placeholder="Email">
                </div>
                <div class="mb-1 mb-xxl-2">
                    <label for="password" class="form-label col-form-label col-form-label-sm display-7 fw-normal">New
                        Password</label>
                    <div class="position-relative">
                        <input type="password" name="password"
                            class="password-container form-control form-control-sm fw-light py-2 py-xxl-3 pe-5"
                            id="password" placeholder="New Password" disabled>
                        <span class="position-absolute top-50 translate-middle-y opacity-75"
                            style="right: 1rem; cursor: pointer;">
                            <img src="{{ asset('img/blind.png') }}" class="password-icon" style="width: 1.25rem;" alt="">
                        </span>
                    </div>
                </div>
                <div class="mb-2 mb-xxl-3">
                    <label for="confirmation-code"
                        class="form-label col-form-label col-form-label-sm display-7 fw-normal">Confirmation Code
                    </label>
                    <input type="text" name="confirmation-code" class="form-control form-control-sm py-2 py-xxl-3 fw-light"
                        id="confirmation-code" placeholder="Confirmation Code" disabled>
                </div>


                <!-- Submit button -->
                <div class="mt-5 d-flex">
                    <button type="button" id="get-code"
                        class="btn btn-outline-primary btn-block mb-4 flex-grow-1 py-2 me-1">Send
                        Code</button>
                    <button type="button" id="confirm" class="btn btn-primary btn-block mb-4 flex-grow-1 py-2 ms-1"
                        disabled>Confirm</button>
                </div>

            </form>
        </div>
    </div>
    <script>
        $(() => {
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

            $('#email').change(function() {
                if (!$(this).val()) { // if email is empty, keep the following input field disabled
                    $('#get-code').css('display', 'flex')
                    $('#password, #confirmation-code, #confirm').attr("disabled", true);
                    return;
                }

                // else, remove send code button and disabled property
                $('#get-code').css('display', 'none')
                $('#password, #confirmation-code, #confirm').removeAttr("disabled");
            })
        })
    </script>
@endsection
