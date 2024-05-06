@extends('layouts.auth.student')

@section('content')
    <!--begin::Aside-->
    <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
        <!--begin::Aside-->
        <div class="d-flex flex-center flex-lg-start flex-column justify-content-center">
            <!--begin::Logo-->
            <a href="{{route('student.index')}}" class="mb-7">
                <img alt="Logo" src="{{getImage('settings', getSetting('logo'))}}">
            </a>
            <!--end::Logo-->
            <!--begin::Title-->
            <h2 class="text-white fw-normal m-0">
                Student Portal Registration
            </h2>
            <!--end::Title-->
        </div>
        <!--begin::Aside-->
    </div>
    <!--begin::Aside-->
    <!--begin::Body-->
    <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12 p-lg-20">
        <!--begin::Card-->
        <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
            <!--begin::Wrapper-->
            <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">
            <!--begin::Form-->
            <form class="form w-100 mb-13" method="POST" id="ajax_form" action="{{route('student.otp.verify')}}">
                @csrf
                <!--begin::Icon-->
                <div class="text-center mb-10">
                    <img alt="Logo" class="mh-125px" src="assets/media/svg/misc/smartphone-2.svg">
                </div>
                <!--end::Icon-->

                <!--begin::Heading-->
                <div class="text-center mb-10">
                    <!--begin::Title-->
                    <h1 class="text-gray-900 mb-3">
                        Forget Password OTP
                    </h1>
                    <!--end::Title-->

                    <!--begin::Sub-title-->
                    <div class="text-muted fw-semibold fs-5 mb-5">
                        {{$msg}}
                    </div>
                    <!--end::Sub-title-->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <!--begin::Mobile no-->
                    <div class="fw-bold text-gray-900 fs-3">*********{{$lastFourDigits = substr($user['phone'], -4)}}</div>
                    <!--end::Mobile no-->
                </div>
                <!--end::Heading-->
                <!--begin::Section-->
                <div class="mb-10">
                    <!--begin::Label-->
                    <div class="fw-bold text-start text-gray-900 fs-6 mb-1 ms-1">Type your 6 digit security code</div>
                    <!--end::Label-->

                    <!--begin::Input group-->
                    <div class="d-flex flex-wrap flex-stack">
                        <input type="text" name="code_1" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" inputmode="text">
                        <input type="text" name="code_2" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" inputmode="text">
                        <input type="text" name="code_3" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" inputmode="text">
                        <input type="text" name="code_4" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" inputmode="text">
                        <input type="text" name="code_5" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" inputmode="text">
                        <input type="text" name="code_6" data-inputmask="'mask': '9', 'placeholder': ''" maxlength="1" class="form-control bg-transparent h-60px w-60px fs-2qx text-center mx-1 my-2" value="" inputmode="text">
                    </div>
                    <input type="hidden" name="otp" class="form-control">
                    <!--begin::Input group-->
                </div>
                <!--end::Section-->

                <!--begin::Submit-->
                <div class="d-flex flex-center">
                    <button type="submit"  class="btn btn-lg btn-primary fw-bold submit">
                        <span class="indicator-label">
                            Submit
                        </span>
                        <span class="indicator-progress">
                            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                </div>
                <!--end::Submit-->
            </form>
            <!--end::Form-->

            <!--begin::Notice-->
            <div class="text-center fw-semibold fs-5">
                <span class="text-muted me-1">Didn’t get the code ?</span>

                <a href="{{route('student.otp.resend')}}" class="link-primary fs-5 me-1">Resend</a>

                <span class="text-muted me-1">or</span>

                <a href="#" class="link-primary fs-5">Call Us</a>
            </div>
<!--end::Notice-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Body-->
@endsection
@push('script')
<script src="{{asset('assets/js/custom/authentication/sign-in/two-factor.js')}}"></script>
@endpush
