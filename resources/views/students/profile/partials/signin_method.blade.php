<div class="card  mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
        data-bs-target="#kt_account_signin_method">
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">Sign-in Method</h3>
        </div>
    </div>
    <!--end::Card header-->
    <div id="kt_account_settings_signin_method" class="collapse show">
        <!--begin::Card body-->
        <div class="card-body border-top p-9">
            <!--begin::Email Address-->
            <div class="d-flex flex-wrap align-items-center">
                <!--begin::Label-->
                <div id="kt_signin_email">
                    <div class="fs-6 fw-bold mb-1">Phone Number</div>
                    <div class="fw-semibold text-gray-600">{{ $user->phone }}</div>
                </div>
                <div id="kt_signin_email_edit" class="flex-row-fluid d-none">
                    <!--begin::Form-->
                    <form id="kt_signin_change_email" class="form fv-plugins-bootstrap5 fv-plugins-framework ajax_form"
                        method="POST" action="{{route('students.change.phone')}}">
                        @csrf
                        <div class="row mb-6">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="phone" class="form-label fs-6 fw-bold mb-3">Enter New
                                        Phone Number</label>
                                    <input type="tel"
                                        class="form-control form-control-lg form-control-solid"
                                        id="phone" placeholder="Phone Number" name="phone">
                                    <div
                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="confirmemailpassword"
                                        class="form-label fs-6 fw-bold mb-3">Confirm Password</label>
                                    <input type="password"
                                        class="form-control form-control-lg form-control-solid"
                                        name="password" id="confirmemailpassword">
                                    <div
                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <button type="submit" id="" class="btn btn-primary submit">
                                <!--begin::Indicator label-->
                                <span class="indicator-label">
                                    Update Phone</span>
                                <!--end::Indicator label-->
                                <!--begin::Indicator progress-->
                                <span class="indicator-progress">
                                    Please wait... <span
                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                                <!--end::Indicator progress-->
                            </button>
                            <button id="kt_signin_cancel" type="button"
                                class="btn btn-color-gray-500 btn-active-light-primary px-6">Cancel</button>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Edit-->

                <!--begin::Action-->
                <div id="kt_signin_email_button" class="ms-auto">
                    <button class="btn btn-light btn-active-light-primary">Change Phone Number</button>
                </div>
                <!--end::Action-->
            </div>
            <!--end::Email Address-->

            <!--begin::Separator-->
            <div class="separator separator-dashed my-6"></div>
            <!--end::Separator-->

            <!--begin::Password-->
            <div class="d-flex flex-wrap align-items-center mb-10">
                <!--begin::Label-->
                <div id="kt_signin_password">
                    <div class="fs-6 fw-bold mb-1">Password</div>
                    <div class="fw-semibold text-gray-600">************</div>
                </div>
                <!--end::Label-->

                <!--begin::Edit-->
                <div id="kt_signin_password_edit" class="flex-row-fluid d-none">
                    <!--begin::Form-->
                    <form id=""
                        class="form fv-plugins-bootstrap5 fv-plugins-framework ajax_form" method="POST" action="{{route('students.change.password')}}">
                        @csrf
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="currentpassword" class="form-label fs-6 fw-bold mb-3">Current
                                        Password</label>
                                    <input type="password"
                                        class="form-control form-control-lg form-control-solid "
                                        name="current_password" id="currentpassword">
                                    <div
                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="newpassword" class="form-label fs-6 fw-bold mb-3">New
                                        Password</label>
                                    <input type="password"
                                        class="form-control form-control-lg form-control-solid "
                                        name="password" id="newpassword">
                                    <div
                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="confirmpassword" class="form-label fs-6 fw-bold mb-3">Confirm
                                        New Password</label>
                                    <input type="password"
                                        class="form-control form-control-lg form-control-solid "
                                        name="password_confirmation" id="confirmpassword">
                                    <div
                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-text mb-5">Password must be at least 8 character and contain
                            symbols</div>
                        <div class="d-flex">
                                <button type="submit" id="" class="btn btn-primary submit">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">
                                        Update Password</span>
                                    <!--end::Indicator label-->
                                    <!--begin::Indicator progress-->
                                    <span class="indicator-progress">
                                        Please wait... <span
                                            class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                    <!--end::Indicator progress-->
                                </button>
                            <button id="kt_password_cancel" type="button"
                                class="btn btn-color-gray-500 btn-active-light-primary px-6">Cancel</button>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Edit-->

                <!--begin::Action-->
                <div id="kt_signin_password_button" class="ms-auto">
                    <button class="btn btn-light btn-active-light-primary">Reset Password</button>
                </div>
                <!--end::Action-->
            </div>
            <!--end::Password-->


            <!--begin::Notice-->
            <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed  p-6">
                <!--begin::Icon-->
                <i class="ki-duotone ki-shield-tick fs-2tx text-primary me-4"><span
                        class="path1"></span><span class="path2"></span></i> <!--end::Icon-->


                @if ($user->two_factor)
                <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                    <!--begin::Content-->
                    <div class="mb-3 mb-md-0 fw-semibold">
                        <h4 class="text-gray-900 fw-bold">Your Account is Secured With Two Step Verification</h4>

                        <div class="fs-6 text-gray-700 pe-7">Two-factor authentication adds an extra layer
                            of security to your account. To log in, in addition you'll need to provide a 6
                            digit code</div>
                    </div>
                    <!--end::Action-->
                    <button class="btn btn-success px-6 align-self-center text-nowrap">
                        Enabled </button>
                </div>
                @else
                <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                    <!--begin::Content-->
                    <div class="mb-3 mb-md-0 fw-semibold">
                        <h4 class="text-gray-900 fw-bold">Secure Your Account</h4>

                        <div class="fs-6 text-gray-700 pe-7">Two-factor authentication adds an extra layer
                            of security to your account. To log in, in addition you'll need to provide a 6
                            digit code</div>
                    </div>
                    <a href="#" class="btn btn-primary px-6 align-self-center text-nowrap"
                        data-bs-toggle="modal" data-bs-target="#kt_modal_two_factor_authentication">
                        Enable </a>
                    <!--end::Action-->
                </div>
                @endif
                <!--end::Wrapper-->
            </div>
            <!--end::Notice-->
        </div>
        <!--end::Card body-->
    </div>
</div>
