@extends('layouts.admin.app')
@section('content')
    <div class="d-flex flex-column flex-column-fluid" data-select2-id="select2-data-135-c4t5">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        All Roles
                    </h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">
                                Home </a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            Roles </li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->

        <!--begin::Content-->
        <div id="kt_app_content" class="app-content  flex-column-fluid ">


            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container  container-xxl ">

                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-5 g-xl-9">
                    @foreach ($roles as $item)
                        <div class="col-md-4">
                            <!--begin::Card-->
                            <div class="card card-flush h-md-100">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <!--begin::Card title-->
                                    <div class="card-title text-capitalize">
                                        <h2>{{ $item->name }}</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-1">
                                    <div class="fw-bold text-gray-600 mb-5">Total users with this role:
                                        {{$item->users()->count()}}</div>
                                    <div class="d-flex flex-column text-gray-600">
                                        @foreach ($item->permissions->take(5) as $permission)
                                        <div class="d-flex align-items-center py-2"><span
                                                class="bullet bg-primary me-3"></span>
                                            {{$permission->name}}</div>
                                        @endforeach
                                        @php
                                            $permissions_count = $item->permissions->count();
                                        @endphp
                                        @if ($permissions_count > 5)
                                        <div class="d-flex align-items-center py-2"><span
                                            class="bullet bg-primary me-3"></span>
                                        More {{$permissions_count - 5}} Permissions</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer d-flex gap-1 flex-nowrap pt-0">
                                    <a href="{{route('admin.roles.show', $item->id)}}" class="btn btn-light btn-sm btn-active-primary my-1 me-2">View Role</a>
                                    <a href="{{route('admin.roles.edit', $item->id)}}" class="btn btn-primary btn-sm btn-active-primary my-1 me-2 modal_btn">Edit Role</a>
                                    <form action="{{route('admin.roles.destroy', $item->id)}}" class="delete_form" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm btn-active-light-danger my-1"
                                        data-bs-toggle="modal" data-bs-target="#kt_modal_update_role">Delete Role</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="ol-md-4">
                        <div class="card h-md-100">
                            <div class="card-body d-flex flex-center">
                                <button type="button" class="btn btn-clear d-flex flex-column flex-center"
                                    data-bs-toggle="modal" data-bs-target="#kt_modal_add_role">
                                    <!--begin::Illustration-->
                                    <img src="{{asset('assets/media/illustrations/sketchy-1/4.png')}}" alt=""
                                        class="mw-100 mh-150px mb-7">
                                    <!--end::Illustration-->

                                    <!--begin::Label-->
                                    <div class="fw-bold fs-3 text-gray-600 text-hover-primary">Add New Role</div>
                                    <!--end::Label-->
                                </button>
                                <!--begin::Button-->
                            </div>
                            <!--begin::Card body-->
                        </div>
                        <!--begin::Card-->
                    </div>
                    <!--begin::Add new card-->
                </div>
                <div class="modal fade" id="kt_modal_add_role" tabindex="-1" aria-modal="true" role="dialog">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-750px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Modal header-->
                            <div class="modal-header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bold">Add a Role</h2>
                                <!--end::Modal title-->

                                <!--begin::Close-->
                                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </div>
                                <!--end::Close-->
                            </div>
                            <!--end::Modal header-->

                            <!--begin::Modal body-->
                            <div class="modal-body scroll-y mx-lg-5 my-7">
                                <!--begin::Form-->
                                <form id="ajax_form" class="form fv-plugins-bootstrap5 fv-plugins-framework ajax_form"
                                    action="{{route('admin.roles.store')}}" method="POST">
                                    @csrf
                                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll"
                                        data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                                        data-kt-scroll-max-height="auto"
                                        data-kt-scroll-dependencies="#kt_modal_add_role_header"
                                        data-kt-scroll-wrappers="#kt_modal_add_role_scroll" data-kt-scroll-offset="300px"
                                        style="max-height: 145px;">
                                        <!--begin::Input group-->
                                        <div class="fv-row mb-10 fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="fs-5 fw-bold form-label mb-2">
                                                <span class="required">Role name</span>
                                            </label>
                                            <!--end::Label-->

                                            <!--begin::Input-->
                                            <input class="form-control form-control-solid" placeholder="Enter a role name"
                                                name="name">
                                            <!--end::Input-->
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            </div>
                                        </div>
                                        <div class="fv-row mb-10 fv-plugins-icon-container">
                                            <!--begin::Label-->
                                            <label class="fs-5 fw-bold form-label mb-2">
                                                <span class="required">Guard Name</span>
                                            </label>
                                                <select name="guard" id="" class="form-control form-control-solid">
                                                    <option value="admin" selected>Admin</option>
                                                </select>
                                            <div
                                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                            </div>
                                        </div>
                                        <div class="fv-row">
                                            <!--begin::Label-->
                                            <label class="fs-5 fw-bold form-label mb-2">Role Permissions</label>
                                            <div class="d-flex flex-wrap mt-4">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-gray-800">
                                                    <label
                                                        class="form-check form-check-custom form-check-solid me-9">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="kjdf" id="kt_roles_select_all">
                                                        <span class="form-check-label fs-6"
                                                            for="kt_roles_select_all">
                                                            Select all
                                                        </span>
                                                    </label>
                                                </div>
                                                @foreach ($permissions as $item)
                                                <div class="col-lg-4 col-md-4 col-sm-6 col-12 text-gray-800 p-3">
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="{{$item->name}}" name="permissions[]">
                                                        <span class="form-check-label fs-6">
                                                            {{$item->name}}
                                                        </span>
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <!--end::Scroll-->

                                        <!--begin::Actions-->
                                        <div class="text-center pt-15">
                                            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">
                                                Discard
                                            </button>

                                            <button type="submit" class="btn btn-primary" data-kt-roles-modal-action="submit">
                                                <span class="indicator-label">
                                                    Submit
                                                </span>
                                                <span class="indicator-progress">
                                                    Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                                </span>
                                            </button>
                                        </div>
                                        <!--end::Actions-->
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Modal body-->
                            </div>
                            <!--end::Modal content-->
                        </div>
                        <!--end::Modal dialog-->
                    </div>
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->

        </div>
@endsection
@push('script')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
        <script src="{{ asset('assets/js/custom/apps/user-management/users/list/table.js') }}"></script>
        <script src="{{asset('assets/js/custom/apps/user-management/roles/list/update-role.js')}}"></script>
        <script>
            $(document).ready(function() {
                $("#kt_roles_select_all").on("change", function() {
                    var isChecked = $(this).is(":checked");
                    $('[type="checkbox"]').prop("checked", isChecked);
                });
            });
        </script>
@endpush
