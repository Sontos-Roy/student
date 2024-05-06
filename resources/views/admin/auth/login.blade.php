@extends('layouts.auth.admin')
@section('content')
<div class="d-flex flex-column flex-lg-row flex-column-fluid">
    <div class="d-flex flex-lg-row-fluid">
        <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
            <img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                src="{{ getImage('settings', getSetting('logo')) }}" alt="" />
            <img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20"
                src="{{ getImage('settings', getSetting('logo')) }}" alt="" />
            <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">
                {{getSetting('site_title')}}
            </h1>
            <div class="text-gray-600 fs-base text-center fw-semibold">
                In this kind of post, <a href="#" class="opacity-75-hover text-primary me-1">PSTU</a>
                introduces a person they’ve interviewed <br /> and provides some background information about
                <a href="#" class="opacity-75-hover text-primary me-1">the interviewee</a>
                and their <br /> work following this is a transcript of the interview.
            </div>
        </div>
    </div>
    <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
        <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10">
            <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
                <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">
                    <form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate" method="POST" id="ajax_form" action="{{route('admin.login')}}">
                        @csrf
                        <div class="text-center mb-11">
                            <h1 class="text-gray-900 fw-bolder mb-3">
                                Sign In
                            </h1>
                            <div class="text-gray-500 fw-semibold fs-6">
                                Your Social Campaigns
                            </div>
                            <div class="text-gray-500 fw-semibold fs-6">
                                admin@admin.com <br>
                                pass: Admin@admin1278
                            </div>
                        </div>
                        <div class="fv-row mb-8 fv-plugins-icon-container">
                            <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent">
                            <!--end::Email-->
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>

                        <!--end::Input group--->
                        <div class="fv-row mb-3 fv-plugins-icon-container">
                            <input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent">
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div></div>
                        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                            <div></div>

                            <!--begin::Link-->
                            <a href="reset-password.html" class="link-primary">
                                Forgot Password ?
                            </a>
                            <!--end::Link-->
                        </div>
                        <!--end::Wrapper-->

                        <!--begin::Submit button-->
                        <div class="d-grid mb-10">
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary submit">

                    <!--begin::Indicator label-->
                    <span class="indicator-label">
                        Sign In</span>
                    <!--end::Indicator label-->

                    <!--begin::Indicator progress-->
                    <span class="indicator-progress">
                        Please wait...    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                    </span>
                    <!--end::Indicator progress-->        </button>
                        </div>
                        <!--end::Submit button-->

                        <!--begin::Sign up-->
                        <div class="text-gray-500 text-center fw-semibold fs-6">
                            Not a Member yet?

                            <a href="{{route('admin.signup')}}" class="link-primary">
                                Sign up
                            </a>
                        </div>
                        <!--end::Sign up-->
                    </form>
                    <!--end::Form-->

                                    </div>
                <!--begin::Footer-->
                <!--end::Footer-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Body-->
</div>
@endsection
@push('script')
<script>
    $(document).on('submit', 'form#ajax_form', function(event) {
            event.preventDefault();
            $('p.textdanger').text('');
            $('p.failed').text('');
            var url = $(this).attr('action');
            var method = $(this).attr('method');
            var formData = new FormData($(this)[0]);
            var submitButton = $(this).find('.submit');
            submitButton.attr('data-kt-indicator', 'on');
            $.ajax({
                type: method,
                url: url,
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function(res){
                    submitButton.attr('data-kt-indicator', 'on');
                },
                success: function(res) {
                    if (res.status === true) {
                        var message = res.msg;
                        Swal.fire('Success!', message, 'success');
                        $(event.target).trigger('reset');
                        submitButton.removeAttr('data-kt-indicator');
                        if (res.url) {
                            setTimeout(function() {
                                window.location.href = res.url;
                            }, 2000);
                        } else {
                            window.location.reload();
                        }
                    } else if (res.status === false) {
                        Swal.fire('Failed!', res.msg, 'error');
                        submitButton.removeAttr('data-kt-indicator');
                    }
                },
                error: function(response) {
                    console.log(response.responseJSON);
                    if(response.responseJSON && response.responseJSON.errors) {
                        $.each(response.responseJSON.errors,function(field_name,error){
                            $('[name='+field_name+']').after('<p style="color:red" class="failed">' +error+ '</p>');
                            Swal.fire('Failed!', error, 'error');
                        });
                    } else {
                        Swal.fire('Failed!', 'An error occurred while processing your request.', 'error');
                    }
                    submitButton.removeAttr('data-kt-indicator');
                }
            });

            function showToast(icon, title, type) {
                Swal.fire(type, title, icon);
            }
        });
</script>
<script src="{{asset('assets/js/custom/authentication/sign-in/general.js')}}"></script>
@endpush
