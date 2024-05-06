@extends('layouts.students.app')
@section('content')
    <div class="d-flex flex-column flex-column-fluid" data-select2-id="select2-data-135-c4t5">
        <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
            <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Testimonial Status
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
                                <div class="stepper-item" data-kt-stepper-element="nav">
                                    <div class="stepper-wrapper">
                                        <div class="stepper-icon w-40px h-40px {{$item->supervisor_approve ? 'bg-success' : 'bg-warning'}} text-light">
                                            <i class="ki-duotone ki-check fs-2 stepper-check"></i>
                                            <span class="stepper-number">1</span>
                                        </div>
                                        <div class="stepper-label">
                                            <h3 class="stepper-title">
                                                Supervisor
                                            </h3>
                                            <div class="stepper-desc fw-semibold">
                                                @if ($item->supervisor_approve)
                                                <div class="text-success">Successfully Approved Testimonial Form</div>
                                                @else
                                                Waiting For Sign Testimonial
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="stepper-line h-40px"></div>
                                </div>
                                <div class="stepper-item" data-kt-stepper-element="nav">
                                    <div class="stepper-wrapper">
                                        <div class="stepper-icon w-40px h-40px {{$item->chairman_approve ? 'bg-success' : 'bg-warning'}} text-light">
                                            <i class="ki-duotone ki-check fs-2 stepper-check"></i>
                                            <span class="stepper-number">2</span>
                                        </div>
                                        <div class="stepper-label">
                                            <h3 class="stepper-title">
                                                Chairman
                                            </h3>
                                            <div class="stepper-desc fw-semibold">
                                                @if ($item->chairman_approve)
                                                <div class="text-success">Successfully Approved Testimonial Form</div>
                                                @else
                                                Waiting For Sign Testimonial
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="stepper-line h-40px"></div>
                                </div>
                                <div class="stepper-item" data-kt-stepper-element="nav">
                                    <div class="stepper-wrapper">
                                        <div class="stepper-icon w-40px h-40px {{$item->dean_approve ? 'bg-success' : 'bg-warning'}} text-light">
                                            <i class="ki-duotone ki-check fs-2 stepper-check"></i>
                                            <span class="stepper-number">3</span>
                                        </div>
                                        <div class="stepper-label">
                                            <h3 class="stepper-title">
                                                Dean
                                            </h3>
                                            <div class="stepper-desc fw-semibold">
                                                @if ($item->dean_approve)
                                                <div class="text-success">Successfully Approved Testimonial Form</div>
                                                @else
                                                Waiting For Sign Testimonial
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
