@extends('layouts.students.app')
@section('content')
    <div class="d-flex flex-column flex-column-fluid" data-select2-id="select2-data-135-c4t5">
        <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
            <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Application for Testimonial
                    </h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('students.dashboard')}}" class="text-muted text-hover-primary">
                                Home </a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            Testimonial </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content  flex-column-fluid " data-select2-id="select2-data-kt_app_content">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container  container-xxl "
                data-select2-id="select2-data-kt_app_content_container">
                <!--begin::Card-->
                <div class="card" data-select2-id="select2-data-134-m6wh">
                    <div class="card-body py-4">
                        <form id="ajax_form"
                            class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{route('students.testimonials.store')}}" method="POST">
                            @csrf
                            @if (getCompletion(auth()->id()) != 100)
                            <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed  p-6 my-4">
                                <i class="ki-duotone ki-information fs-2tx text-warning me-4"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                <div class="d-flex flex-stack flex-grow-1 ">
                                    <div class=" fw-semibold">
                                        <h4 class="text-gray-900 fw-bold">We need your attention!</h4>
                                        <div class="fs-6 text-gray-700 ">You Must have to Complete Your Profile First.......</div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="d-flex flex-column scroll-y px-5 px-lg-10"
                                id="kt_modal_add_user_scroll">
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="required fw-semibold fs-6 mb-2">Student Name</label>
                                    <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="{{ $user->name }}" disabled>
                                </div>
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="required fw-semibold fs-6 mb-2">Father's Name</label>
                                    <input type="text" name="father_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="{{ $user->father_name }}" disabled>
                                </div>
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="required fw-semibold fs-6 mb-2">Mother's Name</label>
                                    <input type="text" name="mother_name" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="{{ $user->mother_name }}" disabled>
                                </div>
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="required fw-semibold fs-6 mb-2">Present Address</label>
                                    <input type="text" name="address" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="{{ $user->address }}" disabled>
                                </div>
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="required fw-semibold fs-6 mb-2">Parmanent Address</label>
                                    <input type="text" name="permanent_address" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="{{ $user->permanent_address }}" disabled>
                                </div>
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="required fw-semibold fs-6 mb-2">Nationality</label>
                                    <input type="text" name="nationality" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="{{ $user->nationality }}" disabled>
                                </div>
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="required fw-semibold fs-6 mb-2">Date Of Birth</label>
                                    <input type="date" name="dob" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="{{ $user->dob }}" disabled>
                                </div>
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="required fw-semibold fs-6 mb-2">Gender</label>
                                    <input type="text" name="gender" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="{{ $user->gender }}" disabled>
                                </div>
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="required fw-semibold fs-6 mb-2">Registration No</label>
                                    <input type="text" name="registration_no" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="{{ $user->registration_no }}" disabled>
                                </div>
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="required fw-semibold fs-6 mb-2">Session</label>
                                    <input type="text" name="session" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="{{ $user->session }}" disabled>
                                </div>
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="required fw-semibold fs-6 mb-2">Semester of first enrollment</label>
                                    <input type="text" name="first_enrollment" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="">
                                </div>
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="required fw-semibold fs-6 mb-2">Defense Semester</label>
                                    <input type="text" name="defense_semester" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="">
                                </div>
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="required fw-semibold fs-6 mb-2">Department</label>
                                    <select name="department_id" data-control="select2" id="" class="form-control">
                                        <option value="">Select Your Department</option>
                                        @foreach ($departments as $item)
                                        <option value="{{$item['id']}}">{{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="required fw-semibold fs-6 mb-2">Program </label>
                                    <select name="program_id" data-control="select2" id="" class="form-control">
                                        <option value="">Select Your Program</option>
                                        @foreach ($programs as $item)
                                        <option value="{{$item['id']}}">{{ $item['title'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="required fw-semibold fs-6 mb-2">Degree </label>
                                    <select name="degree_id" data-control="select2" id="" class="form-control">
                                        <option value="">Select Your Degree</option>
                                        @foreach ($degrees as $item)
                                        <option value="{{$item['id']}}">{{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="text-center pt-10">
                                <button type="submit" class="btn btn-primary submit">
                                    <span class="indicator-label">
                                        Submit
                                    </span>
                                    <span class="indicator-progress">
                                        Please wait... <span
                                            class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/user-management/users/list/table.js') }}"></script>
@endpush
