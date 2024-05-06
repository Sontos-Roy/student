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
                        All Testimonials
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
                            Testimonials </li>
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
                                <a href="{{route('admin.testimonials.create')}}" class="btn btn-primary">
                                    <i class="ki-duotone ki-plus fs-2"></i> Add Testimonial
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body py-4">
                        <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="">
                                    <thead>
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                            <th class="min-w-125px">Student</th>
                                            <th class="min-w-125px">Semester of first enrollment</th>
                                            <th class="min-w-125px">Defense Semester</th>
                                            <th class="min-w-125px">Department</th>
                                            <th class="min-w-125px">Program </th>
                                            <th class="min-w-125px">Degree </th>
                                            <th class="min-w-125px">Applied AT</th>
                                            <th class="min-w-125px">Approve Status</th>
                                            <th class="text-end min-w-100px sorting_disabled" rowspan="1"
                                                colspan="1" aria-label="Actions" style="width: 130.188px;">Actions
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 fw-semibold">
                                        @foreach ($items as $key => $item)
                                        <tr class="{{$key+1 / 2 ? 'even' : 'odd'}}">
                                            <td>
                                                {{$item->user->name ?? ''}}
                                            </td>
                                            <td>
                                                {{$item->first_enrollment}}
                                            </td>
                                            <td>
                                                {{$item->defense_semester}}
                                            </td>
                                            <td>
                                                {{$item->department ? $item->department->name : ''}}
                                            </td>
                                            <td>
                                                {{$item->program ? $item->program->title : ''}}
                                            </td>
                                            <td>
                                                {{$item->degree ? $item->degree->name : ''}}
                                            </td>
                                            <td>
                                                {{date('d M y H:i a', strtoTime($item->created_at))}}
                                            </td>
                                            <td>
                                                @if ($item->supervisor_approve == 1 && $item->chairman_approve == 1 && $item->dean_approve == 1)
                                                    <span class="badge rounded-pill text-bg-success">Approved</span>
                                                    @else
                                                    <span class="badge rounded-pill text-bg-muted">Waiting</span>
                                                @endif
                                            </td>
                                            <td class="text-end">
                                                <a href="#"
                                                    class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                    Actions
                                                    <i class="ki-duotone ki-down fs-5 ms-1"></i> </a>
                                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                    data-kt-menu="true">
                                                    <div class="menu-item px-3">
                                                        <a href="{{route('admin.testimonials.show', $item->id)}}" class="menu-link px-3">
                                                            View
                                                        </a>
                                                    </div>
                                                    <div class="menu-item px-3">
                                                            <form action="{{ route('admin.testimonials.destroy', $item->id) }}" method="POST" class="delete_form" id="delete{{$item->id}}">
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
                            {{$items->links('pagination::bootstrap-5')}}
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
