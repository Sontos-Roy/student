@extends('layouts.admin.app')
@section('content')
    <div class="d-flex flex-column flex-column-fluid" data-select2-id="select2-data-135-c4t5">
        <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
            <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Testimonial Form
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
                            class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{route('admin.testimonials.store')}}" method="POST">
                            @csrf

                            <div class="d-flex flex-column scroll-y px-5 px-lg-10"
                                id="kt_modal_add_user_scroll">
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="required fw-semibold fs-6 mb-2">Select Student</label>
                                    <select name="user_id" data-control="select2" id="" class="form-control">
                                        <option value="">Select Student</option>
                                        @foreach ($users as $item)
                                        <option value="{{$item['id']}}">{{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
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
