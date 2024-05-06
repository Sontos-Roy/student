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
                        View Roles
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
                            <a href="{{ route('admin.roles.index') }}" class="text-muted text-hover-primary">
                                Roles </a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            Roles </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content  flex-column-fluid ">
            <div id="kt_app_content_container" class="app-container  container-xxl ">
                <div class="d-flex flex-column flex-lg-row">
                    <div class="flex-column flex-lg-row-auto w-100 w-lg-200px w-xl-300px mb-10">
                        <div class="card card-flush">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2 class="mb-0">{{$item->name}}</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="d-flex flex-column text-gray-600">
                                    @foreach ($item->permissions as $permission)
                                        <div class="d-flex align-items-center py-2"><span class="bullet bg-primary me-3"></span>
                                            {{$permission->name}}</div>
                                        @endforeach

                                </div>
                            </div>
                            <div class="card-footer pt-0">

                                <a href="{{route('admin.roles.edit', $item->id)}}" class="btn btn-light btn-active-primary modal_btn" data-bs-toggle="modal">Edit Role</a>
                            </div>
                        </div>
                    </div>
                    <div class="flex-lg-row-fluid ms-lg-10">
                        <div class="card card-flush mb-6 mb-xl-9">
                            <div class="card-header pt-5">
                                <div class="card-title">
                                    <h2 class="d-flex align-items-center"> Users Assigned<span
                                            class="text-gray-600 fs-6 ms-1">({{$item->users->count()}})</span></h2>
                                </div>
                                <div class="card-toolbar">

                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <table class="table align-middle table-row-dashed fs-6 gy-5 mb-0"
                                    id="kt_roles_view_table">
                                    <thead>
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                            <th class="min-w-50px">ID</th>
                                            <th class="min-w-150px">User</th>
                                            <th class="min-w-125px">Joined Date</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-600">
                                        @foreach ($item->users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td class="d-flex align-items-center">
                                                <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                    <a href="{{route('admin.manage.users.show', $user->id)}}" class="modal_btn">
                                                        <div class="symbol-label">
                                                            <img src="{{getImage('admins', $user->image)}}"
                                                                alt="{{$user->name}}" class="w-100" />
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <a href="{{route('admin.manage.users.show', $user->id)}}"
                                                        class="text-gray-800 text-hover-primary mb-1 modal_btn">{{$user->name}}</a>
                                                    <span>{{$user->email}}</span>
                                                </div>
                                            </td>
                                            <td>
                                                {{date('d M Y H:i a', strtoTime($user->created_at))}} </td>

                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                    </div>
                    <!--end::Content-->
                </div>
            </div>
            <!--end::Content-->

        </div>
    @endsection
    @push('script')
        <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
        <script src="{{ asset('assets/js/custom/apps/user-management/users/list/table.js') }}"></script>
        <script src="{{ asset('assets/js/custom/apps/user-management/roles/list/update-role.js') }}"></script>
        <script>
            $(document).ready(function() {
                $("#kt_roles_select_all").on("change", function() {
                    var isChecked = $(this).is(":checked");
                    $('[type="checkbox"]').prop("checked", isChecked);
                });
            });
        </script>
    @endpush
