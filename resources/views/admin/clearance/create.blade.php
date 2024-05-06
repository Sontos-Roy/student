@extends('layouts.admin.app')
@section('content')
    <div class="d-flex flex-column flex-column-fluid" data-select2-id="select2-data-135-c4t5">
        <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
            <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Clearence Form
                    </h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('admin.dashboard')}}" class="text-muted text-hover-primary">
                                Home </a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            Clearence </li>
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
                            class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{route('admin.clearance.store')}}" method="POST">
                            @csrf
                            <div class="d-flex flex-column scroll-y px-5 px-lg-10"
                                id="kt_modal_add_user_scroll">
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="required fw-semibold fs-6 mb-2">Select Student</label>
                                    <select name="user_id" id="" data-control="select2" class="form-control">
                                        <option value="">Select Student</option>
                                        @foreach ($users as $user)
                                        <option value="{{$user->id}}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @if ($degree->accept_faculty == 1)
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="required fw-semibold fs-6 mb-2">Faculty</label>
                                    <select name="faculty_id" id="" data-control="select2" class="form-control">
                                        <option value="">Select Faculty</option>
                                        @foreach ($faculties as $item)
                                        <option value="{{$item['id']}}">{{ $item['title'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif
                                @if ($degree->accept_department == 1)
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="required fw-semibold fs-6 mb-2">Department</label>
                                    <select name="department_id" data-control="select2" id="" class="form-control">
                                        <option value="">Select Department</option>
                                        @foreach ($departments as $item)
                                        <option value="{{$item['id']}}">{{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="required fw-semibold fs-6 mb-2">Degree Name</label>
                                    <input type="text" name="" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="{{$degree->name}}" disabled>
                                    <input type="hidden" name="degree_id" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="{{$degree->id}}">
                                </div>
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="required fw-semibold fs-6 mb-2">Program Name</label>
                                    <input type="text" name="" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="{{$program->title}}" disabled>
                                    <input type="hidden" name="program_id" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="{{$program->id}}">
                                </div>
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="required fw-semibold fs-6 mb-2">Thesis/Internship Title</label>
                                    <input type="text" name="internship_title" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="">
                                </div>
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="required fw-semibold fs-6 mb-2">Hall Name</label>
                                    <select name="hall_id" id="" data-control="select2" class="form-control">
                                        <option value="">Select Your Hall</option>
                                        @foreach ($halls as $item)
                                        <option value="{{$item['id']}}">{{ $item['title'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="required fw-semibold fs-6 mb-2">Attach No</label>
                                    <input type="text" name="attach_no" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="">
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
