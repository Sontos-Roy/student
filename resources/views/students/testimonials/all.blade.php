@extends('layouts.students.app')
@section('content')
    <div class="d-flex flex-column flex-column-fluid" data-select2-id="select2-data-135-c4t5">
        <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
            <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                       Your Testimonials
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
                            Testimonial </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content  flex-column-fluid " data-select2-id="select2-data-kt_app_content">
            <div id="kt_app_content_container" class="app-container  container-xxl "
                data-select2-id="select2-data-kt_app_content_container">
                <div class="card" data-select2-id="select2-data-134-m6wh">
                    <div class="card-body py-4">
                        <div id="kt_table_users_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="table-responsive">
                                <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="">
                                    <thead>
                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                            <th class="min-w-125px">Your Name</th>
                                            <th class="min-w-125px">Semester of first enrollment</th>
                                            <th class="min-w-125px">Defense Semester</th>
                                            <th class="min-w-125px">Department</th>
                                            <th class="min-w-125px">Program </th>
                                            <th class="min-w-125px">Degree </th>
                                            <th class="min-w-125px">Applied AT</th>
                                            <th class="min-w-125px">Approve Status</th>
                                            <th class="min-w-125px">View Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-600 fw-semibold">
                                        @foreach ($user->testimonials->sortBy('DESC') as $key => $item)
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
                                            <td>
                                                <a href="{{route('students.testimonials.status', $item->id)}}" class="nav-link">View Status</a>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
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
