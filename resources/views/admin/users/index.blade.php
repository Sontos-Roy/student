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
                        All Users List
                    </h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('admin.dashboard')}}" class="text-muted text-hover-primary">
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
                            Users </li>
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
        <div id="kt_app_content" class="app-content  flex-column-fluid " data-select2-id="select2-data-kt_app_content">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container  container-xxl "
                data-select2-id="select2-data-kt_app_content_container">
                <!--begin::Card-->
                <div class="card" data-select2-id="select2-data-134-m6wh">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6" data-select2-id="select2-data-133-65s4">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <form action="{{route('admin.manage.users.index')}}" method="GET">

                                <div class="d-flex align-items-center position-relative my-1 gap-1">
                                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5"><span
                                        class="path1"></span><span class="path2"></span></i> <input type="text"
                                        data-kt-user-table-filter="search"
                                        class="form-control form-control-solid w-250px ps-13" placeholder="Search user" name="search" value="{{request('search')}}">
                                        <button class="btn btn-success" type="submit">Search</button>
                                        @if (request('search'))
                                        <a href="{{route('admin.manage.users.index')}}" class="btn btn-dark">Reset</a>
                                        @endif
                                </div>
                            </form>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar" data-select2-id="select2-data-132-ib8y">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_export_users">
                                    <i class="ki-duotone ki-exit-up fs-2"><span class="path1"></span><span
                                            class="path2"></span></i> Export
                                </button>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_add_user">
                                    <i class="ki-duotone ki-plus fs-2"></i> Add User
                                </button>
                                <form class="delete_form" action="{{route('admin.delete.users')}}" method="POST" id="delete_form">
                                    @csrf
                                    <!--begin::Group actions-->
                                        <div class="d-flex justify-content-end ms-2 align-items-center"
                                                data-kt-user-table-toolbar="selected">
                                            <button type="submit" class="btn btn-danger"
                                                data-kt-user-table-select="delete_selected">
                                                Delete Selected
                                            </button>
                                        </div>
                                    </form>
                            </div>
                            @include('admin.users.add')
                        </div>
                    </div>
                    <div class="card-body py-4">
                        <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer"
                                    id="">
                                    <thead>
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                            <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1"
                                                aria-label="" style="width: 29.8906px;">
                                                <div
                                                    class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                        data-kt-check-target=".form-check-input"
                                                        value="1">
                                                </div>
                                            </th>
                                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users"
                                                rowspan="1" colspan="1"
                                                aria-label="Name: activate to sort column ascending"
                                                style="width: 276.75px;">Name</th>
                                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users"
                                                rowspan="1" colspan="1"
                                                aria-label="Last login: activate to sort column ascending"
                                                style="width: 162px;">Last login</th>
                                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users"
                                                rowspan="1" colspan="1"
                                                aria-label="Two-step : activate to sort column ascending"
                                                style="width: 162px;">Role </th>
                                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users"
                                                rowspan="1" colspan="1"
                                                aria-label="Joined Date: activate to sort column ascending"
                                                style="width: 211.672px;">Joined Date</th>
                                            <th class="text-end min-w-100px sorting_disabled" rowspan="1"
                                                colspan="1" aria-label="Actions" style="width: 130.188px;">Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 fw-semibold">
                                        @foreach ($users as $key => $user)
                                        <tr class="{{$key+1 / 2 ? 'even' : 'odd'}}">
                                            <td>
                                                <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                    <input class="form-check-input" name="users[]" form="delete_form" type="checkbox" value="{{$user->id}}">
                                                </div>
                                            </td>
                                            <td class="d-flex align-items-center">
                                                <!--begin:: Avatar -->
                                                <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                                    <a href="{{route('admin.manage.users.show', $user->id)}}" class="modal_btn">
                                                        <div class="symbol-label">
                                                            <img src="{{getImage('users', $user->image)}}"
                                                                alt="{{$user->name}}" class="w-100">
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="d-flex flex-column">
                                                    <a href="{{route('admin.manage.users.show', $user->id)}}" class="text-gray-800 text-hover-primary mb-1 modal_btn">{{$user->name}}</a>
                                                    <span>{{$user->email}}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="badge badge-light fw-bold">{{ $user->last_login_at ? \Carbon\Carbon::parse($user->last_login_at)->diffForHumans() : '' }}</div>
                                            </td>
                                            <td>
                                                @foreach ($user->roles as $item)
                                                    <span class="badge badge-{{$item->name == 'admin' ? 'primary' : 'info'}} text-capitalize">{{$item->name}}</span>
                                                @endforeach
                                            </td>
                                            <td data-order="2024-09-22T06:43:00+06:00">
                                                {{date('d M Y, h:i A', strToTime($user->created_at))}} </td>
                                            <td class="text-end">
                                                <a href="#"
                                                    class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                    Actions
                                                    <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                    data-kt-menu="true">
                                                    <div class="menu-item px-3">
                                                        <a href="{{route('admin.manage.users.show', $user->id)}}" class="menu-link px-3 modal_btn">
                                                            View
                                                        </a>
                                                        <a href="{{route('admin.manage.users.edit', $user->id)}}" class="menu-link px-3 modal_btn">
                                                            Edit
                                                        </a>
                                                    </div>
                                                    <div class="menu-item px-3">
                                                            <form action="{{ route('admin.manage.users.destroy', $user->id) }}" method="POST" class="delete_form" id="delete{{$user->id}}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="menu-link btn border-0 text-danger">delete</button>
                                                            </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div
                                    class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                                </div>
                                {{$users->links('pagination::bootstrap-5')}}
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
