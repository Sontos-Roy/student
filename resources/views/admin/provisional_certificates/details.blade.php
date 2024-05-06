@extends('layouts.admin.app')
@section('content')
    <div class="d-flex flex-column flex-column-fluid" data-select2-id="select2-data-135-c4t5">
        <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
            <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        All Provisional Certificate
                    </h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">
                                Home </a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            Provisional Certificate </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content  flex-column-fluid " data-select2-id="select2-data-kt_app_content">
            <div id="kt_app_content_container" class="app-container  container-xxl "
                data-select2-id="select2-data-kt_app_content_container">
                <div class="card" data-select2-id="select2-data-134-m6wh">
                    <div class="card-header border-0 pt-6" data-select2-id="select2-data-133-65s4">
                        <div class="card-title">
                        </div>
                        <div class="card-toolbar" data-select2-id="select2-data-132-ib8y">
                            @if (!$item->supervisor_id)
                            <div class="d-flex justify-content-end me-2" data-kt-user-table-toolbar="base">
                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_add_user">
                                    <i class="ki-duotone ki-plus fs-2"></i> Assgin Supervisor
                                </button>
                            </div>
                            @endif
                            @if (!$item->chairman_id && $item->supervisor_approve && ($item->supervisor_id != auth()->guard('admin')->id() || auth()->guard('admin')->user()->hasRole('admin')))
                            <div class="d-flex justify-content-end me-2" data-kt-user-table-toolbar="base">
                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#assgin-chairman">
                                    <i class="ki-duotone ki-plus fs-2"></i> Assgin Chairman
                                </button>
                            </div>
                            @endif
                            @if (!$item->dean_id && $item->chairman_approve && $item->supervisor_approve && ($item->supervisor_id != auth()->guard('admin')->id() || auth()->guard('admin')->user()->hasRole('admin')))
                            <div class="d-flex justify-content-end me-2" data-kt-user-table-toolbar="base">
                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#assgin-dean">
                                    <i class="ki-duotone ki-plus fs-2"></i> Assgin Dean
                                </button>
                            </div>
                            @endif
                            @if ($item->supervisor_id == auth()->guard('admin')->id() && $item->supervisor_approve != 1)
                                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_add_user2">
                                        <i class="ki-duotone ki-plus fs-2"></i> Approve Provisional Certificate
                                    </button>
                                </div>
                            @endif
                            @if ($item->chairman_id == auth()->guard('admin')->id() && $item->chairman_approve != 1)
                                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                        data-bs-target="#approve_chairman">
                                        <i class="ki-duotone ki-plus fs-2"></i> Approve Provisional Certificate
                                    </button>
                                </div>
                            @endif
                            @if ($item->dean_id == auth()->guard('admin')->id() && $item->dean_approve != 1)
                                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                        data-bs-target="#approve_dean">
                                        <i class="ki-duotone ki-plus fs-2"></i> Approve Provisional Certificate
                                    </button>
                                </div>
                            @endif
                        </div>
                        @include('admin.provisional_certificates.approve')
                    </div>
                    <div class="card-body py-4">
                        @if ($item->supervisor_id == auth()->guard('admin')->id() && $item->supervisor_approve == 1)
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <strong>Approved</strong>
                                </div>
                            @endif
                            @if ($item->chairman_id == auth()->guard('admin')->id() && $item->chairman_approve == 1)
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <strong>Approved</strong>
                                </div>
                            @endif
                            @if ($item->dean_id == auth()->guard('admin')->id() && $item->dean_approve == 1)
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    <strong>Approved</strong>
                                </div>
                            @endif

                        <script>
                            var alertList = document.querySelectorAll(".alert");
                            alertList.forEach(function (alert) {
                                new bootstrap.Alert(alert);
                            });
                        </script>

                    <br>
                        <h3 class="my-5">Student Information</h3>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Image</label>
                            <div class="col-lg-8">
                                <img src="{{ getImage('users', $user->image) }}" alt="{{ $user->name }}"
                                    class="img-fluid" style="height: 150px;">
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Full Name</label>
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">{{ $user->name }}</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Registration No</label>
                            <div class="col-lg-8 fv-row">
                                <span class="fw-semibold text-gray-800 fs-6">{{ $user->registration_no }}</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Mobile No</label>
                            <div class="col-lg-8 fv-row">
                                <span class="fw-semibold text-gray-800 fs-6">{{ $user->phone }}</span>
                                @if ($user->two_factor)
                                    <span class="badge badge-success">Verified</span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">NID</label>
                            <div class="col-lg-8 fv-row">
                                <span class="fw-semibold text-gray-800 fs-6">{{ $user->nid }}</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Session</label>
                            <div class="col-lg-8 fv-row">
                                <span class="fw-semibold text-gray-800 fs-6">{{ $user->session }}</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Father Name</label>
                            <div class="col-lg-8 fv-row">
                                <span class="fw-semibold text-gray-800 fs-6">{{ $user->father_name }}</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Mother Name</label>
                            <div class="col-lg-8 fv-row">
                                <span class="fw-semibold text-gray-800 fs-6">{{ $user->mother_name }}</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Address</label>
                            <div class="col-lg-8 fv-row">
                                <span class="fw-semibold text-gray-800 fs-6">{{ $user->address }}</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Date of Birth</label>
                            <div class="col-lg-8 fv-row">
                                <span class="fw-semibold text-gray-800 fs-6">{{ $user->dob }}</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Nationality</label>
                            <div class="col-lg-8 fv-row">
                                <span class="fw-semibold text-gray-800 fs-6">{{ $user->nationality }}</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Gender</label>
                            <div class="col-lg-8 fv-row">
                                <span class="fw-semibold text-gray-800 fs-6">{{ $user->gender }}</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Signature</label>
                            <div class="col-lg-8 fv-row">
                                <span class="fw-semibold text-gray-800 fs-6">
                                    @if ($user->signature)
                                        <img src="{{ getImage('users', $user->signature) }}" alt="signature"
                                            width="100">
                                    @endif
                                </span>
                            </div>
                        </div>
                        <h3 class="my-5">Provisional Certificate Information</h3>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Program</label>
                            <div class="col-lg-8 fv-row">
                                <span class="fw-semibold text-gray-800 fs-6">{{ $item->program ? $item->program->title : 'No program' }}</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Department</label>
                            <div class="col-lg-8 fv-row">
                                <span class="fw-semibold text-gray-800 fs-6">{{ $item->department ? $item->department->name : 'No Department' }}</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Semester of first enrollment</label>
                            <div class="col-lg-8 fv-row">
                                <span class="fw-semibold text-gray-800 fs-6">{{ $item->first_enrollment }}</span>
                            </div>
                        </div>

                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Thesis/Dissertation Title </label>
                            <div class="col-lg-8 fv-row">
                                <span class="fw-semibold text-gray-800 fs-6">{{ $item->dissertation_title }}</span>
                            </div>
                        </div>
                        @if ($item->defense_semester)
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Defense Semester</label>
                            <div class="col-lg-8 fv-row">
                                <span class="fw-semibold text-gray-800 fs-6">{{ $item->defense_semester }}</span>
                            </div>
                        </div>
                        @endif
                        @if ($item->cgpa)
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">CGPA</label>
                            <div class="col-lg-8 fv-row">
                                <span class="fw-semibold text-gray-800 fs-6">{{ $item->cgpa }}</span>
                            </div>
                        </div>
                        @endif
                        @if ($item->date_pub_compiled_result)
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Date of Publication of Compiled Result</label>
                            <div class="col-lg-8 fv-row">
                                <span class="fw-semibold text-gray-800 fs-6">{{ date('d M Y', strToTime($item->date_pub_compiled_result)) }}</span>
                            </div>
                        </div>
                        @endif
                        @if ($item->exam_date)
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Exam Date</label>
                            <div class="col-lg-8 fv-row">
                                <span class="fw-semibold text-gray-800 fs-6">{{ date('M Y', strToTime($item->exam_date)) }}</span>
                            </div>
                        </div>
                        @endif
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
