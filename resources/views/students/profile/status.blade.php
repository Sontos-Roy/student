@extends('layouts.students.app')
@section('content')
    <div class="d-flex flex-column flex-column-fluid" data-select2-id="select2-data-135-c4t5">
        <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
            <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Clearence Status
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
                            Status </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content  flex-column-fluid " data-select2-id="select2-data-kt_app_content">
            <div id="kt_app_content_container" class="app-container  container-xxl "
                data-select2-id="select2-data-kt_app_content_container">
                <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid gap-10" id="kt_create_account_stepper" data-kt-stepper="true">
                    <div class="card d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px w-xxl-400px">
                        <div class="card-body px-6 px-lg-10 px-xxl-15 py-20">
                            <div class="stepper-nav">
                                @foreach ($roles as $key => $item)
                                <div class="stepper-item {{$item->order <= $clearence->improve ? 'current' : ''}}" data-kt-stepper-element="nav">
                                    <div class="stepper-wrapper">
                                        <div class="stepper-icon w-40px h-40px {{$item->order == $clearence->improve + 1 ? 'bg-warning text-light' : ''}}">
                                            <i class="ki-duotone ki-check fs-2 stepper-check"></i>
                                            <span class="stepper-number">{{ $key+1 }}</span>
                                        </div>
                                        <div class="stepper-label">
                                            <h3 class="stepper-title">
                                                {{$item->name}}
                                            </h3>
                                            <div class="stepper-desc fw-semibold">
                                                @if ($item->order <= $clearence->improve)
                                                <div class="text-success">Successfully Approved Clearance From {{$item->name}}</div>
                                                @elseif($item->order == $clearence->improve +1)
                                                <div class="text-warning">Waiting For Approved Clearance From {{$item->name}}</div>
                                                @else
                                                Waiting For Approved Clearance From {{$item->name}}
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="stepper-line h-40px"></div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="card d-flex flex-row-fluid flex-center">
                        <div class="card-header w-100 align-items-center">
                            <h2>Current Approver Information</h2>
                        </div>
                        <div class="card-body w-100">
                            @if ($user)
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">Image</label>
                                <div class="col-lg-8">
                                    <img src="{{getImage('admins', $user->image)}}" alt="{{$user->name}}" class="img-fluid" height="150">
                                </div>
                            </div>
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">Full Name</label>
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-800">{{ $user->name }}</span>
                                </div>
                            </div>
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">Full Name</label>
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-800">{{ $user->name }}</span>
                                </div>
                            </div>
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">Email</label>
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-800">{{ $user->email }}</span>
                                </div>
                            </div>
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-semibold text-muted">Phone</label>
                                <div class="col-lg-8">
                                    <span class="fw-bold fs-6 text-gray-800">{{ $user->phone }}</span>
                                </div>
                            </div>
                                @if ($pay)
                                    @if ($pay->status == 0)
                                    <div class="notice d-flex bg-light-warning rounded border-primary border border-dashed  p-6">
                                        <i class="ki-duotone ki-shield-tick fs-2tx text-primary me-4"><span class="path1"></span><span
                                                class="path2"></span></i>
                                        <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                            <div class="mb-3 mb-md-0 fw-semibold">
                                                <h4 class="text-gray-900 fw-bold">Wait For Payment</h4>
                                                <div class="fs-6 text-gray-700 pe-7">
                                                    You Have to pay for Approve Clearance...
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
                                                <h4 class="text-gray-900 fw-bold">Payment Successfuly...</h4>
                                                <div class="fs-6 text-gray-700 pe-7">
                                                    Your Payment is Successfully Approved. Now Wait for Clearance Approve....
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @else
                                <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed  p-6">
                                    <i class="ki-duotone ki-information fs-2tx text-warning me-4"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                    <div class="d-flex flex-stack flex-grow-1 ">
                                        <div class=" fw-semibold">
                                            <h4 class="text-gray-900 fw-bold">We need your attention!</h4>

                                            <div class="fs-6 text-gray-700 ">You Can Inform/Contact With Clearance Approver.</div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @else
                                @if ($roles->last()->order == $clearence->improve)
                                <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed  p-6">
                                    <i class="ki-duotone ki-shield-tick fs-2tx text-primary me-4"><span class="path1"></span><span
                                            class="path2"></span></i>
                                    <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                        <div class="mb-3 mb-md-0 fw-semibold">
                                            <h4 class="text-gray-900 fw-bold">Successfully Complete/Approved Clearance...</h4>
                                            <div class="fs-6 text-gray-700 pe-7">
                                                Now You can Download Clearance Form
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @else
                                <div class="notice d-flex bg-light-warning rounded border-primary border border-dashed  p-6">
                                    <i class="ki-duotone ki-shield-tick fs-2tx text-primary me-4"><span class="path1"></span><span
                                            class="path2"></span></i>
                                    <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                        <div class="mb-3 mb-md-0 fw-semibold">
                                            <h4 class="text-gray-900 fw-bold">Not Assiging Yet</h4>
                                            <div class="fs-6 text-gray-700 pe-7">
                                                No Authorizer Assigning Yet. Wait for Assigning...
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endif



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
