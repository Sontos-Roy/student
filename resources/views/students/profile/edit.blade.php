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
                <div class="card mb-5 mb-xl-10">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_profile_details" aria-expanded="true"
                        aria-controls="kt_account_profile_details">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Profile Details</h3>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--begin::Card header-->

                    <!--begin::Content-->
                    <div id="kt_account_settings_profile_details" class="collapse show">
                        <!--begin::Form-->
                        <form id="ajax_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                            method="POST" action="{{route('students.profile.edit.store')}}">
                            @csrf
                            <!--begin::Card body-->
                            <div class="card-body border-top p-9">
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>
                                    <div class="col-lg-8">
                                        <!--begin::Image input-->
                                        <div class="image-input image-input-outline" data-kt-image-input="true"
                                            style="background-image: url({{asset('assets/media/svg/avatars/blank.svg')}})">
                                            <!--begin::Preview existing avatar-->
                                            <div class="image-input-wrapper w-125px h-125px"
                                                style="background-image: url({{getImage('users', $user->image)}})"></div>
                                            <!--end::Preview existing avatar-->
                                            <!--begin::Label-->
                                            <label
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                aria-label="Change avatar" data-bs-original-title="Change avatar"
                                                data-kt-initialized="1">
                                                <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span
                                                        class="path2"></span></i>
                                                <!--begin::Inputs-->
                                                <input type="file" name="image" accept=".png, .jpg, .jpeg">
                                                <input type="hidden" name="avatar_remove">
                                                <!--end::Inputs-->
                                            </label>
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                aria-label="Cancel avatar" data-bs-original-title="Cancel avatar"
                                                data-kt-initialized="1">
                                                <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span
                                                        class="path2"></span></i> </span>
                                            <span
                                                class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                aria-label="Remove avatar" data-bs-original-title="Remove avatar"
                                                data-kt-initialized="1">
                                                <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span
                                                        class="path2"></span></i> </span>
                                        </div>
                                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                <input type="text" name="name"
                                                    class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                    placeholder="" value="{{$user->name}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Bangla Name</label>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                <input type="text" name="bangla_name"
                                                    class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                                    placeholder="" value="{{$user->bangla_name}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Registration No</label>
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="registration_no"
                                            class="form-control form-control-lg form-control-solid" disabled
                                            placeholder="Registration No" value="{{$user->registration_no}}">
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">NID No</label>
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="nid"
                                            class="form-control form-control-lg form-control-solid" disabled
                                            placeholder="NID No" value="{{$user->nid}}">
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Contact Phone</label>
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="tel" name="phone" disabled
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Phone number" value="{{$user->phone}}">
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Alternative Phone (if have)</label>
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="tel" name="alt_phone"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Phone number" value="{{$user->alt_phone}}">
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Email</label>
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="email" name="email"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Email" value="{{$user->email}}">
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Session</label>
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="session"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="session" value="{{$user->session}}">
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Father Name</label>
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="father_name"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Father name" value="{{$user->father_name}}">
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Mother Name</label>
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="mother_name"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Mother name" value="{{$user->mother_name}}">
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Present Address</label>
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="address"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Present Address" value="{{$user->address}}">
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Permanent Address</label>
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="permanent_address"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Permanent Address" value="{{$user->permanent_address}}">
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Date of Birth</label>
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="date" name="dob"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Date of Birth" value="{{$user->dob}}">
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Nationality</label>
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <input type="text" name="nationality"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Nationality" value="{{$user->nationality}}">
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Gender</label>
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                            <select name="gender" id="" class="form-control form-control-lg form-control-solid">
                                                <option value="">Select Gender</option>
                                                <option value="Male" {{$user->gender == 'Male' ? 'selected' : ''}}>Male</option>
                                                <option value="Female" {{$user->gender == 'Female' ? 'selected' : ''}}>Female</option>
                                                <option value="Other" {{$user->gender == 'Other' ? 'selected' : ''}}>Other</option>
                                            </select>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Signature</label>
                                    <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <input type="file" name="signature" class="form-control form-control-lg form-control-solid">
                                            </div>
                                            <div class="col-lg-6">
                                                @if ($user->signature)
                                                    <img src="{{getImage('users', $user->signature)}}" alt="signature" width="100">
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!--end::Card body-->

                            <!--begin::Actions-->
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="reset"
                                    class="btn btn-light btn-active-light-primary me-2">Discard</button>
                                    <button type="submit" id="" class="btn btn-primary submit">
                                        <!--begin::Indicator label-->
                                        <span class="indicator-label">
                                        Save Change</span>
                                        <!--end::Indicator label-->
                                        <!--begin::Indicator progress-->
                                        <span class="indicator-progress">
                                        Please wait...    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                        <!--end::Indicator progress-->
                                    </button>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Toolbar-->
    </div>
@endsection
@push('script')
    <script src="{{ asset('assets/js/custom/pages/user-profile/general.js') }}"></script>
@endpush
