@extends('layouts.admin.app')
@section('content')
    <div class="d-flex flex-column flex-column-fluid" data-select2-id="select2-data-135-c4t5">
        <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
            <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        All Clearance
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
                            Clearance </li>
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
                        @if (Auth::guard('admin')->user()->hasRole('admin'))
                        <div class="card-toolbar" data-select2-id="select2-data-132-ib8y">
                            <div class="d-flex justify-content-end pe-2" data-kt-user-table-toolbar="base">
                                <a href="{{route('admin.check.clearance.approve', $item->id)}}" class="btn btn-primary">
                                    <i class="ki-duotone ki-plus fs-2"></i>Check Status
                                </a>
                            </div>
                            <div class="d-flex justify-content-end pe-2" data-kt-user-table-toolbar="base">
                                <button type="button" class="btn btn-primary" {{$pay ? 'disabled' : ''}} data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_add_user4">
                                    <i class="ki-duotone ki-plus fs-2"></i>Has No Due
                                </button>
                            </div>
                            <div class="d-flex justify-content-end pe-2" data-kt-user-table-toolbar="base">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_add_user">
                                    <i class="ki-duotone ki-plus fs-2"></i> Has Due
                                </button>
                            </div>
                            <div class="d-flex justify-content-end pe-2" data-kt-user-table-toolbar="base">
                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_add_user2">
                                    <i class="ki-duotone ki-plus fs-2"></i> Accept has No Due
                                </button>
                            </div>
                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_add_user3">
                                    <i class="ki-duotone ki-plus fs-2"></i> Approve Clearance
                                </button>
                            </div>
                        </div>
                        @else
                        <div class="card-toolbar" data-select2-id="select2-data-132-ib8y">
                            <div class="d-flex justify-content-end pe-2" data-kt-user-table-toolbar="base">
                                <button type="button" class="btn btn-primary" {{$pay ? 'disabled' : ''}} data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_add_user4">
                                    <i class="ki-duotone ki-plus fs-2"></i>Has No Due
                                </button>
                            </div>
                            <div class="d-flex justify-content-end pe-2" data-kt-user-table-toolbar="base">
                                <button type="button" class="btn btn-primary" {{$pay ? 'disabled' : ''}} data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_add_user">
                                    <i class="ki-duotone ki-plus fs-2"></i> Has Due
                                </button>
                            </div>
                            @if ($pay && $pay->status == 0)
                            <div class="d-flex justify-content-end pe-2" data-kt-user-table-toolbar="base">
                                <button type="button" class="btn btn-info" {{$pay && $pay->status == 1 || !$pay ? 'disabled' : ''}} data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_add_user2">
                                    <i class="ki-duotone ki-plus fs-2"></i> Accept has No Due
                                </button>
                            </div>
                            @endif
                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                <button type="button" class="btn btn-info" {{$pay && $pay->status == 1 ? '' : 'disabled'}} data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_add_user3">
                                    <i class="ki-duotone ki-plus fs-2"></i> Approve Clearance
                                </button>
                            </div>
                        </div>
                        @endif
                        @include('admin.clearance.details.create_payment')
                    </div>
                    <div class="card-body py-4">
                    @if ($pay)
                        @if ($pay->status == 0)
                        <div class="notice d-flex bg-light-warning rounded border-primary border border-dashed  p-6">
                            <i class="ki-duotone ki-shield-tick fs-2tx text-primary me-4"><span class="path1"></span><span
                                    class="path2"></span></i>
                            <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                <div class="mb-3 mb-md-0 fw-semibold">
                                    <h4 class="text-gray-900 fw-bold">Already Sent Notification</h4>
                                    <div class="fs-6 text-gray-700 pe-7">
                                        Already Sent Notification to <b>{{$item->user->name}}</b>. Wait for Payment....
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed  p-6">
                            <i class="ki-duotone ki-shield-tick fs-2tx text-primary me-4"><span class="path1"></span><span
                                    class="path2"></span></i>
                            <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                <div class="mb-3 mb-md-0 fw-semibold">
                                    <h4 class="text-gray-900 fw-bold">No Due...</h4>
                                    <div class="fs-6 text-gray-700 pe-7">
                                        <b>{{$item->user->name}}</b> Has No Due. You Can Create Authorized Sign....
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @else
                    <div class="notice d-flex bg-light-danger rounded border-danger border border-dashed  p-6">
                        <i class="ki-duotone ki-information fs-2tx text-danger me-4"><span class="path1"></span><span
                                class="path2"></span><span class="path3"></span></i>
                        <div class="d-flex flex-stack flex-grow-1 ">
                            <div class=" fw-semibold">
                                <h4 class="text-gray-900 fw-bold">We need your attention!</h4>
                                <div class="fs-6 text-gray-700 ">There Has a new Clearance Application. Please Check Due and Approve Clearance....</div>
                            </div>
                        </div>
                    </div>
                    @endif
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
                        <h3 class="my-5">Clearance Information</h3>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Faculty</label>
                            <div class="col-lg-8 fv-row">
                                <span class="fw-semibold text-gray-800 fs-6">{{ $item->faculty ? $item->faculty->title : 'No Faculty' }}</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Department</label>
                            <div class="col-lg-8 fv-row">
                                <span class="fw-semibold text-gray-800 fs-6">{{ $item->department ? $item->department->name : 'No Department' }}</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Hall</label>
                            <div class="col-lg-8 fv-row">
                                <span class="fw-semibold text-gray-800 fs-6">{{ $item->hall ? $item->hall->title : 'No Hall' }}</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Degree</label>
                            <div class="col-lg-8 fv-row">
                                <span class="fw-semibold text-gray-800 fs-6">{{ $item->degree ? $item->degree->name : 'No Degree' }}</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Thesis/Internship Title</label>
                            <div class="col-lg-8 fv-row">
                                <span class="fw-semibold text-gray-800 fs-6">{{ $item->internship_title }}</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Attach No</label>
                            <div class="col-lg-8 fv-row">
                                <span class="fw-semibold text-gray-800 fs-6">{{ $item->attach_no }}</span>
                            </div>
                        </div>
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
