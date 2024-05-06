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
                        All Approver Roles
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
                            Approver Roles </li>
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
                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_add_user">
                                    <i class="ki-duotone ki-plus fs-2"></i> Add Approver Role
                                </button>
                            </div>
                            @include('admin.approver_roles.add')
                        </div>
                    </div>
                    <div class="card-body py-4">
                        <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="">
                                    <thead>
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                            <th class="min-w-125px">Name</th>
                                            <th class="min-w-125px">Order</th>
                                            <th class="text-end min-w-100px sorting_disabled" rowspan="1"
                                                colspan="1" aria-label="Actions" style="width: 130.188px;">Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 fw-semibold">
                                        @foreach ($items as $key => $item)
                                        <tr class="{{$key+1 / 2 ? 'even' : 'odd'}}">
                                            <td>
                                                {{$item->name}}
                                            </td>
                                            <td>
                                                {{$item->order}}
                                            </td>
                                            <td class="text-end">
                                                <a href="#"
                                                    class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                    Actions
                                                    <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                <!--begin::Menu-->
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                    data-kt-menu="true">
                                                    <div class="menu-item px-3">
                                                        <a href="{{route('admin.approver.roles.edit', $item->id)}}" class="menu-link px-3 modal_btn">
                                                            Edit
                                                        </a>
                                                    </div>
                                                    <div class="menu-item px-3 ">
                                                            <form action="{{ route('admin.approver.roles.destroy', $item->id) }}" method="POST" class="delete_form" id="delete{{$item->id}}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="menu-link btn border-0 text-danger" disabled>delete</button>
                                                            </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
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
