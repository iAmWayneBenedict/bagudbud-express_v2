@extends('layouts.app-no-nav')

@section('content')
@php
    $url = url()->previous();
    // $route = app('router')->getRoutes()->match(app('request')->create($url))->getName();
    $var = preg_split("#/#", $url); //manual extracting the route name
    $route = end($var)
    
@endphp
@if ($route == 'client-login' OR $route == 'rider-login')
    <div class="d-flex justify-content-center align-items-center" style="height: 80vh">
        <div style="max-width: 30rem; width: 100%" class="p-5">
            <h1 class="mb-3 text-center fs-1">Reset Password</h1>
            <p class="mb-4 text-secondary">Fear not! We'll email you instructions to reset your password.</p>
            <div class="mb-2 mb-xxl-3">
                <label for="email" class="form-label col-form-label col-form-label-sm display-7 fw-normal">Email </label>
                <input type="email" name="email" class="form-control form-control-sm py-2 py-xxl-3 fw-light" id="email"
                    placeholder="Email">
                <span class="text-danger text-center display-8 fw-bold mt-2 d-none alerts">Error
                    message!</span>
            </div>
            <div class="mb-1 mb-xxl-2">
                <label for="password" class="form-label col-form-label col-form-label-sm display-7 fw-normal">New
                    Password</label>
                <div class="position-relative">
                    <input type="password" name="password"
                        class="password-container form-control form-control-sm fw-light py-2 py-xxl-3 pe-5"
                        id="password" placeholder="New Password" disabled>
                    <span class="text-danger text-center display-8 fw-bold mt-2 d-none alerts">Error
                        message!</span>
                    <span class="position-absolute top-50 translate-middle-y opacity-75"
                        style="right: 1rem; cursor: pointer;">
                        <img src="{{ asset('img/blind.png') }}" class="password-icon" style="width: 1.25rem;" alt="">
                    </span>
                </div>
            </div>
            <div class="mb-2 mb-xxl-3">
                <label for="code"
                    class="form-label col-form-label col-form-label-sm display-7 fw-normal">Confirmation Code
                </label>
                <input type="text" name="code" class="form-control form-control-sm py-2 py-xxl-3 fw-light"
                    id="code" placeholder="Confirmation Code" disabled>
                <span class="text-danger text-center display-8 fw-bold mt-2 d-none alerts">Error
                    message!</span>
            </div>


            <!-- Submit button -->
            <div class="mt-5 d-flex">
                <button type="button" id="send_code"
                    class="btn btn-outline-primary btn-block mb-4 flex-grow-1 py-2 me-1">Send
                    Code</button>
                <button type="button" id="change_pass" class="btn btn-primary btn-block mb-4 flex-grow-1 py-2 ms-1"
                    disabled>Confirm</button>
            </div>
        </div>
    </div>
@else
    {{-- redirect the user to home page if the forgot password is directly call from the browser --}}
    <script type="text/javascript">
        window.location.href = "{{ route('home') }}";
    </script>
@endif
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

            // $('#email').change(function() {
            //     if (!$(this).val()) { // if email is empty, keep the following input field disabled
            //         $('#get-code').css('display', 'flex')
            //         $('#password, #code, #confirm').attr("disabled", true);
            //         return;
            //     }

            //     // else, remove send code button and disabled property
            //     $('#get-code').css('display', 'none')
            //     $('#password, #code, #confirm').removeAttr("disabled");
            // })

            let temp = "";
            $('#code').keyup(function(event) {

                // if the input field is empty, then reset temp variable and immediately exit the function
                if (!$(this).val()) {
                    temp = '';
                    return;
                }

                // if the clicked key is not a number, then remove the latest character added
                let rawData = $(this).val();
                if (isNaN(parseInt(event.key))) {
                    $(this).val(rawData.slice(0, this.value.length - 1));
                    return;
                }

                // store to the temp variable the last char added
                temp += $(this).val().charAt(this.value.length - 1);
                $(this).val(temp);
            })
        })

        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $('#send_code').click(function (e) { 
                e.preventDefault();
                var email = $('#email').val();
                var user = '{{$route}}';

                if(user == 'client-login'){
                    var url = "{{ route('client_SC')}}";
                }
                if(user == 'rider-login'){
                    var url = "{{ route('rider_SC')}}";
                }

                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        email: email
                    },
                    dataType: "json",
                    success: function (res) {
                        $('.text-danger').addClass('d-none');
                        if(res.code == 404){
                            $.each(res.errors, function (key, val) { 
                                $(`#${key}`).next().text(val).removeClass('d-none');
                            });
                        }                      
                        if(res.code == 202){
                            $('#password').removeAttr('disabled');
                            $('#code').removeAttr('disabled');
                            $('#change_pass').removeAttr('disabled');
                            $('#send_code').remove();
                        }
                    }
                });


            });

            $('#change_pass').click(function (e) { 
                e.preventDefault();
                var email = $('#email').val();
                var password = $('#password').val();
                var code = $('#code').val();
                const user = '{{$route}}';

                if(user == 'client-login'){
                    var url = "{{ route('client_RC')}}";
                }
                if(user == 'rider-login'){
                    var url = "{{ route('rider_RC')}}";
                }

                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        email: email,
                        password: password,
                        code: code 
                    },
                    dataType: "json",
                    success: function (res) {
                        $('.text-danger').addClass('d-none');
                        if(res.code == 404){
                            $.each(res.errors, function (key, val) { 
                                $(`#${key}`).next().text(val).removeClass('d-none');
                            });
                        }
                        
                        if(res.code == 202){
                            window.location.href = user;
                        }
                    }
                });


            });
        });
    </script>
@endsection
