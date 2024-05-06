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
                Student Portal
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
                <form class="form w-100 fv-plugins-bootstrap5 fv-plugins-framework" id="ajax_form" action="{{route('student.forget.password.store')}}" method="POST">
                    @csrf
                    <!--begin::Heading-->
                    <div class="text-center mb-11">
                        <h1 class="text-gray-900 fw-bolder mb-3">
                            Student Portal Forget password
                        </h1>
                    </div>
                    <!--end::Separator-->
                    <!--begin::Input group--->
                    <div class="fv-row mb-8 fv-plugins-icon-container">
                        <!--begin::Email-->
                        <input type="text" placeholder="Phone" name="phone" autocomplete="off" class="form-control bg-transparent">
                        <!--end::Email-->
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback"></div>
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
                            <!--end::Indicator progress-->
                        </button>
                    </div>
                    <!--end::Submit button-->
                    <!--begin::Sign up-->
                    <div class="text-gray-500 text-center fw-semibold fs-6">
                        Not a Member yet?
                        <a href="{{route('student.register')}}" class="link-primary">
                        Sign up
                        </a>
                    </div>
                    <!--end::Sign up-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Footer-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Body-->
@endsection
