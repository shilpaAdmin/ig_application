@extends('frontend.layouts.master')
@section('title') Add Advertisment @endsection
<link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" id="bootstrap-light" rel="stylesheet" type="text/css" />

@section('content')
    <div class="preloader">
        <img src="{{ URL::asset('assets/frontend/images/loader.png') }}" class="preloader__image" alt="">
    </div><!-- /.preloader -->

    <div class="page-wrapper" id="AdvertismentFormHideTitle">

        <section class="page-header backgroundimgaddadv">
            <div class="overlayforcontactbg"></div>
            <div class="container">
                <h2 class="h2_oth_pgs">Add Advertisement</h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{route('/')}}">Home</a></li>
                    <li><span>Add Advertisement</span></li>
                </ul>
            </div>
        </section>


        <section class="forum_padding mb-20 pt-5 mt-2" id="AdvertismentForm">
            <div class="container">


                <h3 class="text-center pb-5">You are one step far from Posting a Free Advertisement</h3>
                <form class="needs-validation" method="post" enctype="multipart/form-data" id='advertisement-store'
                    action="{{ route('advertisements.save') }}" novalidate >
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label_theme" for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter adv title" required>
                                <div class="invalid-feedback">
                                    Please provide a Title.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">

                            <div class="form-group">
                                <label class="label_theme" for="exampleFormControlSelect2">Select Category</label>
                                <select class="form-control" name="category_id" id="exampleFormControlSelect2" required>
                                    <option value="">Select</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach

                                </select>
                                <div class="invalid-feedback">
                                    Please provide a Select Category.
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="label_theme" for="exampleFormControlTextarea1">Description</label>
                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1"
                                    rows="3" required></textarea>
                                <div class="invalid-feedback">
                                    Please provide a Description.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12"> <label class="label_theme">Duration</label> </div>
                        <div class="col-md-12">
                            <div class="form-check ">
                                <input class="form-check-input theme-check-form" type="radio" name="inlineRadioOptions"
                                    id="inlineRadio1" value="Yes" required>
                                <label class="form-check-label theme-check-label" for="inlineRadio1">Run this
                                    advertisement continuously</label>


                            </div>
                            <div class="form-check">
                                <input class="form-check-input theme-check-form" type="radio" name="inlineRadioOptions"
                                    id="inlineRadio2" value="No" required>
                                <label class="form-check-label theme-check-label" for="inlineRadio2">Choose when this
                                    ad will end</label>
                                <div class="invalid-feedback">
                                    Please provide a Duration.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_theme" for="exampleInputEmail3">Start Date</label>
                                <input type="date" class="form-control" id="exampleInputEmail3"
                                    aria-describedby="emailHelp" placeholder="Enter adv title" required>
                                <div class="invalid-feedback">
                                    Please provide a Start Date.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="label_theme" for="exampleInputEmail4">End Date</label>
                                <input type="date" class="form-control disable" id="exampleInputEmail4"
                                    aria-describedby="emailHelp" placeholder="Enter adv title" required>
                                <div class="invalid-feedback">
                                    Please provide a End Date.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-12 mt-2">
                            <div class="form-group">
                                <div class="label_theme mb-2"> Upload Your File </div>
                                <label class="label_theme uploadfile_label" for="exampleFormControlFile1"> Drag and
                                    drop or Browse </label>
                                <input type="file" class="form-control-file file-upload-input" name="media"
                                    id="exampleFormControlFile1" required>
                                <div class="invalid-feedback">
                                    Please Upload Your File.
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <input type="hidden" name="action" id="action" value="email" />
                            {{-- <input type="hidden" name="email" id="email" value="{{ $user[0]['email'] }}" /> --}}
                            {{-- <button type="submit" class="btn thm-btn2 px-5">Click to get verification code</button> --}}
                            <a href="#" id="Getotp" class="btn thm-btn2 px-5">Click to get verification code</a>
                        </div>

                    </div>
                </form>
            </div>
        </section>

    </div><!-- /.page-wrapper -->

    {{-- Verifying your email --}}
    <div class="page-wrapper" id="verifyform" style="display: none">
        <section class="page-header backgroundimglogin">
            <div class="overlayforcontactbg"></div>
            <div class="container">
                <h2 class="h2_oth_pgs">Verifying your email</h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="{{route('/')}}">Home</a></li>
                    <li><span>Verifying your email</span></li>
                </ul>
            </div>
        </section>


        <section class="forum_padding mb-20 pt-5 mt-2 pt-2">
            <div class="container">
                <form action="">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <h2 class="text-center pb-2">Verifying your email</h2>
                            <div class="login_box">

                                <div class="text-center verify_img_box">
                                    <img src="{{ URL::asset('assets/frontend/images/resources/verify-email.png') }}"
                                        alt="">
                                </div>

                                <div class="text-center mt-3 mb-3"> Please Enter the 4 digit code sent to
                                    <Br /> {{ $user[0]['email'] }}
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <div class="verify_email_box">
                                            <input type="text" class="form-control otpverify" name="firstbox" id="firstbox" maxlength="1"
                                                aria-describedby="emailHelp" autofocus>
                                        </div>

                                        <div class="verify_email_box">
                                            <input type="text" class="form-control otpverify" name="secondbox" maxlength="1"
                                                id="secondbox" aria-describedby="emailHelp" autofocus>
                                        </div>

                                        <div class="verify_email_box">
                                            <input type="text" class="form-control otpverify" name="thirdbox" id="thirdbox" maxlength="1"
                                                aria-describedby="emailHelp" autofocus>
                                        </div>

                                        <div class="verify_email_box">
                                            <input type="text" class="form-control otpverify" name="fourthbox" maxlength="1"
                                                id="fourthbox" aria-describedby="emailHelp" autofocus>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center mt-3 mb-3"> <a href="#"> Resend Code </a> </div>

                                {{-- <button type="submit" class="btn btn-primary thm-btn2 px-5 mt-3 w-100" onClick="verifyOTP();">Confirm</button> --}}
                                <a href="#" id="verifyOtp" class="btn btn-primary thm-btn2 px-5 mt-3 w-100">Confirm</a>
                                <input type="hidden" name="verifyemail" id="verifyemail"
                                    value="{{ $user[0]['email'] }}" />

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </div><!-- /.page-wrapper -->

    {{-- Verified! html --}}
    <div class="page-wrapper" id="verifiedEmailForm" style="display: none">

        <section class="page-header backgroundimglogin">
            <div class="overlayforcontactbg"></div>
            <div class="container">
                <h2 class="h2_oth_pgs">Verified email</h2>
                <ul class="thm-breadcrumb list-unstyled">
                    <li><a href="index.html">Home</a></li>
                    <li><span>Verified email</span></li>
                </ul>
            </div>
        </section>


        <section class="forum_padding mb-20 pt-5 mt-2 pt-2">
            <div class="container">
                <form action="#">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                            <h2 class="text-center pb-2">Verified! </h2>
                            <div class="login_box">

                                <div class="text-center verify_img_box">
                                    <img src="{{ URL::asset('assets/frontend/images/resources/verified-email.png') }}"
                                        alt="">
                                </div>

                                <div class="text-center mt-3 mb-3"> Yahoo! you have Successfully verified
                                    the Advertisement </div>


                                {{-- <button type="submit" class="btn btn-primary thm-btn2 px-5 mt-3 w-100">Send request for
                                    approval</button> --}}
                                <a href="#" id="submitData" class="btn btn-primary thm-btn2 px-5 mt-3 w-100">Send request for
                                    approval</a>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>

    </div><!-- /.page-wrapper -->


@endsection

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="{{ URL::asset('assets/js/pages/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap/bootstrap.min.js') }}"></script>

<script>
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();


    $(document).ready(function() {
        $("body").on('click', '#Getotp', function(event) {

            event.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });

            $.ajax({
                url: "{{ route('requestOtp') }}",
                method: "POST",
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {

                },
                success: function(data) {

                    $('#AdvertismentForm').hide();
                    $('#AdvertismentFormHideTitle').hide();
                    $('#verifiedEmailForm').hide();
                    $('#verifyform').show();

                }
            })
        });


        //verify otp

        $("body").on('click', '#verifyOtp', function(event) {

            firstbox = $("#firstbox").val();
            secondbox = $("#secondbox").val();
            thirdbox = $("#thirdbox").val();
            fourthbox = $("#fourthbox").val();

            verifyemail = $("#verifyemail").val();


            var str = firstbox + secondbox + thirdbox + fourthbox;


            $.ajax({
                url: "{{ route('otpverify') }}",
                type: 'POST',
                dataType: "json",
                data: {
                    'otp': str,
                    'email': verifyemail
                },
                success: function(response) {

                    $('#verifiedEmailForm').show();
                    $('#verifyform').hide();

                }
            });
        });


        //verified email
        $("body").on('click', '#submitData', function(event) {

            event.preventDefault();
            $('#advertisement-store').submit();
            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': "{{ csrf_token() }}"
            //     }
            // });

            // $.ajax({
            //     url: "{{ route('advertisement.store') }}",
            //     type: 'POST',
            //     dataType: "json",
            //     data: $('form#submitData').serialize(),
            //     success: function(response) {

            //       alert('hiii');

            //     }
            // });
        });


        $("body").on("keypress",".otpverify",function(e){
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            } else {
                $(this).parent().next().find('input').focus();
            }
        });
        $(".inputs").keyup(function () {
            if (this.value.length == this.maxLength) {
                 $(this).next('.inputs').focus();
                 $(this).parent().next().find('input').focus();
            }
        });
    });
</script>
