@extends('layouts.students.app')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">

        <!--begin::Toolbar-->
        <div id="kt_app_content" class="app-content  flex-column-fluid ">


            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container  container-xxl ">

                <!--begin::Navbar-->
                @include('students.layout.profile_menu')
                <!--end::Navbar-->
                <!--begin::details View-->
                @include('students.profile.partials.signin_method')
                <div class="card  ">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_deactivate" aria-expanded="true"
                        aria-controls="kt_account_deactivate">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Deactivate Account</h3>
                        </div>
                    </div>
                    <!--end::Card header-->

                    <!--begin::Content-->
                    <div id="kt_account_settings_deactivate" class="collapse show">
                        <!--begin::Form-->
                        <form id="" class="form fv-plugins-bootstrap5 fv-plugins-framework delete_form" action="{{route('students.deactive.user', auth()->id())}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <!--begin::Card body-->
                            <div class="card-body border-top p-9">

                                <!--begin::Notice-->
                                <div
                                    class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
                                    <!--begin::Icon-->
                                    <i class="ki-duotone ki-information fs-2tx text-warning me-4"><span
                                            class="path1"></span><span class="path2"></span><span
                                            class="path3"></span></i> <!--end::Icon-->
                                    <!--begin::Wrapper-->
                                    <div class="d-flex flex-stack flex-grow-1 ">
                                        <!--begin::Content-->
                                        <div class=" fw-semibold">
                                            <h4 class="text-gray-900 fw-bold">You Are Deactivating Your Account</h4>

                                            <div class="fs-6 text-gray-700 ">For extra security, this requires you to
                                                confirm your email or phone number when you reset yousignr password. <br><a
                                                    class="fw-bold" href="#">Learn more</a></div>
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <div class="form-check form-check-solid fv-row fv-plugins-icon-container">
                                    <input name="deactivate" class="form-check-input" type="checkbox" value=""
                                        id="deactivate">
                                    <label class="form-check-label fw-semibold ps-2 fs-6" for="deactivate">I confirm my
                                        account deactivation</label>
                                    <div
                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    </div>
                                </div>
                                <!--end::Form input row-->
                            </div>
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button id="kt_account_deactivate_account_submit" type="submit"
                                    class="btn btn-danger fw-semibold">Deactivate Account</button>
                            </div>
                            <!--end::Card footer-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Content-->
                </div>
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Toolbar-->
    </div>
    <div class="modal fade" id="kt_modal_two_factor_authentication" tabindex="-1" aria-modal="true" role="dialog">
        <!--begin::Modal header-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header flex-stack">
                    <!--begin::Title-->
                    <h2>Choose An Authentication Method</h2>
                    <!--end::Title-->

                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->

                <!--begin::Modal body-->
                <div class="modal-body scroll-y pt-10 pb-15 px-lg-17">
                    <!--begin::Options-->
                    <div data-kt-element="options" class="">
                        <!--begin::Notice-->
                        <p class="text-muted fs-5 fw-semibold mb-10">
                            In addition to your username and password, you’ll have to enter a code (delivered via
                            SMS) to log into your account.
                        </p>
                        <div class="pb-10">
                            <!--begin::Option-->
                            <input type="radio" class="btn-check" name="auth_option" checked="checked" value="sms"
                                id="kt_modal_two_factor_authentication_option_2">
                            <label
                                class="btn btn-outline btn-outline-dashed btn-active-light-primary p-7 d-flex align-items-center"
                                for="kt_modal_two_factor_authentication_option_2">
                                <i class="ki-duotone ki-message-text-2 fs-4x me-4"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span></i>
                                <span class="d-block fw-semibold text-start">
                                    <span class="text-gray-900 fw-bold d-block fs-3">SMS</span>
                                    <span class="text-muted fw-semibold fs-6">We will send a code via SMS if you need to
                                        use your backup login method.</span>
                                </span>
                            </label>
                            <!--end::Option-->
                        </div>
                        <!--end::Options-->

                        <!--begin::Action-->
                        <button class="btn btn-primary w-100" id="continueButton" data-kt-element="options-select" data-bs-toggle="modal"
                            data-bs-target="#kt_modal_two_factor_authentication2">Continue</button>
                        <!--end::Action-->
                    </div>
                    <!--end::Options-->
                    <!--end::SMS-->
                </div>
                <!--begin::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal header-->

    </div>
    <div class="modal fade" id="kt_modal_two_factor_authentication2" tabindex="-1" aria-modal="true" role="dialog">

    </div>
@endsection
@push('script')
    <script src="{{ asset('assets/js/custom/account/settings/signin-methods.js') }}"></script>
    <script src="{{ asset('assets/js/custom/account/settings/profile-details.js') }}"></script>
    <script src="{{ asset('assets/js/custom/account/settings/deactivate-account.js') }}"></script>
    <script src="{{ asset('assets/js/custom/pages/user-profile/general.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#continueButton').click(function() {
                $.ajax({
                    url: "{{ route('students.getOtp.two.factor') }}",
                    type: "GET",
                    data: {

                    },
                    success: function(response) {
                        if (response.status) {
                            var htmlContent = response[1];
                            $('#kt_modal_two_factor_authentication2').html(htmlContent);
                            $('#kt_modal_two_factor_authentication2').addClass('show');
                        } else {
                            console.error('Error: ' + response.msg);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });

    </script>
@endpush
