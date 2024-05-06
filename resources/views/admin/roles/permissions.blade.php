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
                        All Permissions
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
                            Permissions </li>
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

                <!--begin::Card-->
                <div class="card card-flush ">
                    <!--begin::Card header-->
                    <div class="card-header mt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1 me-5">
                                <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5"><span
                                        class="path1"></span><span class="path2"></span></i> <input type="text"
                                    data-kt-permissions-table-filter="search"
                                    class="form-control form-control-solid w-250px ps-13"
                                    placeholder="Search Permissions" />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--end::Card title-->

                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <button type="button" class="btn btn-light-primary" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_add_permission">
                                <i class="ki-duotone ki-plus-square fs-3"><span class="path1"></span><span
                                        class="path2"></span><span class="path3"></span></i> Add Permission
                            </button>
                            <!--end::Button-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->

                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0" id="kt_permissions_table">
                            <thead>
                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">Name</th>
                                    <th class="min-w-250px">Guard Name</th>
                                    <th class="min-w-250px">Assigned to</th>
                                    <th class="min-w-125px">Created Date</th>
                                    <th class="text-end min-w-100px">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="fw-semibold text-gray-600">
                                @foreach ($items as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->guard_name}}</td>
                                    <td>
                                        @foreach ($item->roles as $role)
                                        <a href="{{route('admin.roles.show', $role->id)}}"
                                            class="badge badge-light-primary fs-7 m-1">{{$role->name}}</a>
                                        @endforeach
                                    </td>
                                    <td>
                                        {{date('d M Y H:i A', strtoTime($item->created_at))}} </td>
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end">
                                            <a href="{{route('admin.permissions.edit', $item->id)}}" class="modal_btn btn btn-icon btn-active-light-primary w-30px h-30px me-3"
                                                data-bs-toggle="modal" data-bs-target="#kt_modal_update_permission">
                                                <i class="ki-duotone ki-setting-3 fs-3"><span class="path1"></span><span
                                                        class="path2"></span><span class="path3"></span><span
                                                        class="path4"></span><span class="path5"></span></i> </a>
                                            <form action="{{route('admin.permissions.destroy', $item->id)}}" class="delete_form" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-icon btn-active-light-primary w-30px h-30px" type="submit">
                                                <i class="ki-duotone ki-trash fs-3"><span class="path1"></span><span
                                                        class="path2"></span><span class="path3"></span><span
                                                        class="path4"></span><span class="path5"></span></i> </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal fade" id="kt_modal_add_permission" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="fw-bold">Add a Permission</h2>
                                <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                data-bs-dismiss="modal">
                                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </div>
                            </div>
                            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                <!--begin::Form-->
                                <form class="form" id="ajax_form" action="{{route('admin.permissions.store')}}" method="POST">
                                    @csrf
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mb-2">
                                            <span class="required">Permission Name</span>
                                            <span class="ms-2" data-bs-toggle="popover" data-bs-trigger="hover"
                                                data-bs-html="true"
                                                data-bs-content="Permission names is required to be unique.">
                                                <i class="ki-duotone ki-information fs-7"><span
                                                        class="path1"></span><span class="path2"></span><span
                                                        class="path3"></span></i> </span>
                                        </label>
                                        <input class="form-control form-control-solid"
                                            placeholder="Enter a permission name" name="name" />
                                    </div>
                                    <div class="fv-row mb-7">
                                        <label class="fs-6 fw-semibold form-label mb-2">
                                            <span class="required">Guard Name</span>
                                            <span class="ms-2" data-bs-toggle="popover" data-bs-trigger="hover"
                                                data-bs-html="true"
                                                data-bs-content="Permission names is required to be unique.">
                                                <i class="ki-duotone ki-information fs-7"><span
                                                        class="path1"></span><span class="path2"></span><span
                                                        class="path3"></span></i> </span>
                                        </label>
                                        <select name="guard_name" id="" class="form-control form-control-solid">
                                            <option value="admin">Admin</option>
                                        </select>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Disclaimer-->

                                    <!--begin::Actions-->
                                    <div class="text-center pt-15">
                                        <button type="reset" class="btn btn-light me-3"
                                            data-bs-dismiss="modal">
                                            Discard
                                        </button>

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
                <!--end::Modal - Add permissions--><!--begin::Modal - Update permissions-->

                <!--end::Modal - Update permissions--><!--end::Modals-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->

    </div>
@endsection
@push('script')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/custom/apps/user-management/users/list/table.js') }}"></script>
@endpush
