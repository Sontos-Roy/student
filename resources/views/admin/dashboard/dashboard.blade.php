@extends('layouts.admin.app')
@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
        <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack ">
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                <h1
                    class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                    Student Portal Student Dashboard
                </h1>
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="../index-2.html" class="text-muted text-hover-primary">
                            Home </a>
                    </li>
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-500 w-5px h-2px"></span>
                    </li>
                    <li class="breadcrumb-item text-muted">
                        Dashboards </li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-2 gap-lg-3">
                <a href="#" class="btn btn-sm fw-bold btn-secondary" data-bs-toggle="modal"
                    data-bs-target="#kt_modal_create_app">
                    Rollover </a>
                <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                    data-bs-target="#kt_modal_create_campaign">
                    Add Campaign </a>
            </div>
        </div>
    </div>
    <div id="kt_app_content" class="app-content  flex-column-fluid ">
        <div class="container">
            <div class="row g-5 g-xl-8">
                <div class="col-xl-3">
                    <a href="{{route('admin.students.index')}}" class="card bg-body hoverable card-xl-stretch mb-xl-8">
                        <div class="card-body">
                            <i class="ki-duotone ki-chart-simple text-primary fs-2x ms-n1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i>
                            <div class="text-gray-900 fw-bold fs-2 mb-2 mt-5">
                                {{$students->count()}}
                            </div>
                            <div class="fw-semibold text-gray-400">
                                Total Students
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <h3>All Roles</h3>
            <div class="row g-5 g-xl-8">
                @foreach ($roles as $item)
                <div class="col-xl-3">
                    <a href="#" class="card bg-dark hoverable card-xl-stretch mb-xl-8">
                        <div class="card-body">
                            <i class="ki-duotone ki-cheque text-gray-100 fs-2x ms-n1"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span></i>
                            <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">
                                {{$item->users->count()}}
                            </div>
                            <div class="fw-semibold text-gray-100">
                                {{$item->name}}
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
