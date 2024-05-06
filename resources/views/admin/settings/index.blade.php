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
                        All Setting Informations
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
                            settings </li>
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
                            <form action="{{route('admin.manage.users.index')}}" method="GET" class="d-flex align-items-center flex-wrap">

                                <div class="d-flex align-items-center position-relative my-1 gap-1">
                                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-5"><span
                                        class="path1"></span><span class="path2"></span></i> <input type="text"
                                        data-kt-user-table-filter="search"
                                        class="form-control form-control-solid w-250px ps-13" placeholder="Search user" name="search" value="{{request('search')}}">
                                </div>
                                <button class="btn btn-success" type="submit">Search</button>
                                        @if (request('search'))
                                        <a href="{{route('admin.manage.users.index')}}" class="btn btn-dark">Reset</a>
                                        @endif
                            </form>
                        </div>
                        <div class="card-toolbar" data-select2-id="select2-data-132-ib8y">
                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_add_user">
                                    <i class="ki-duotone ki-plus fs-2"></i> Add Setting
                                </button>
                            </div>
                            @include('admin.settings.add')
                        </div>
                    </div>
                    <div class="card-body py-4">
                        <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="">
                                    <thead>
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users"
                                                rowspan="1" colspan="1"
                                                aria-label="Name: activate to sort column ascending"
                                                style="width: 276.75px;">Heading</th>
                                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users"
                                                rowspan="1" colspan="1"
                                                aria-label="Last login: activate to sort column ascending"
                                                style="width: 162px;">Type</th>
                                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users"
                                                rowspan="1" colspan="1"
                                                aria-label="Two-step : activate to sort column ascending"
                                                style="width: 162px;">Key </th>
                                            <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users"
                                                rowspan="1" colspan="1"
                                                aria-label="Joined Date: activate to sort column ascending"
                                                style="width: 211.672px;">Value</th>
                                            <th class="text-end min-w-100px sorting_disabled" rowspan="1"
                                                colspan="1" aria-label="Actions" style="width: 130.188px;">Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 fw-semibold">
                                        @foreach ($settings as $key => $item)
                                        <tr class="{{$key+1 / 2 ? 'even' : 'odd'}}">
                                            <td>
                                                {{$item->name}} </td>
                                            <td>{{$item->type}} </td>
                                            <td>{{$item->key}} </td>
                                            <td>
                                                @if ($item->type == "image")
                                                    <img src="{{ getImage('settings', $item->value) }}" alt="{{ $item->type }}" width="100">
                                                @else
                                                    {{ $item->value }}
                                                @endif
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
                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                        <a href="{{route('admin.settings.edit', $item->id)}}" class="menu-link px-3">
                                                            Edit
                                                        </a>
                                                    </div>
                                                    <!--end::Menu item-->

                                                    <!--begin::Menu item-->
                                                    <div class="menu-item px-3">
                                                            <form action="{{ route('admin.settings.destroy', $item->id) }}" method="POST" class="delete_form" id="delete{{$item->id}}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="menu-link btn border-0 text-danger">delete</button>
                                                            </form>
                                                    </div>
                                                    <!--end::Menu item-->
                                                </div>
                                                <!--end::Menu-->
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
