@extends('layouts.admin.app')
@section('content')
    <div class="d-flex flex-column flex-column-fluid" data-select2-id="select2-data-135-c4t5">
        <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
            <div id="kt_app_toolbar_container" class="app-container  container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        All Setting Informations
                    </h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('admin.dashboard')}}" class="text-muted text-hover-primary">
                                Home </a>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <a href="{{route('admin.settings.index')}}" class="text-muted text-hover-primary">
                                Setting </a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            Edit </li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content  flex-column-fluid " data-select2-id="select2-data-kt_app_content">
            <div id="kt_app_content_container" class="app-container  container-xxl "
                data-select2-id="select2-data-kt_app_content_container">
                <div class="card" data-select2-id="select2-data-134-m6wh">
                    <div class="card-header border-0 pt-6" data-select2-id="select2-data-133-65s4">
                        <div class="card-body">
                            <form id="ajax_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{ route('admin.settings.update', $setting->id) }}" method="POST">
                                @csrf
                                @method("PUT")
                                <div class="d-flex flex-column scroll-y px-5 px-lg-10">
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="required fw-semibold fs-6 mb-2">Heading</label>
                                        <input type="text" name="name" class="form-control form-control-solid mb-3 mb-lg-0"
                                            placeholder="Heading" value="{{$setting->name}}">
                                    </div>
                                    <div class="fv-row mb-7 fv-plugins-icon-container">
                                        <label class="required fw-semibold fs-6 mb-2">Key</label>
                                        <input type="text" class="form-control" name="key" placeholder="Key" value="{{ $setting->key }}">
                                        <input type="hidden" class="form-control" name="type" placeholder="Type" value="{{ $setting->type }}">
                                    </div>
                                    <div class="fv-row mb-7 fv-plugins-icon-container">

                                        @if ($setting->type === 'text')
                                            <input type="text" name="value" value="{{ $setting->value }}" class="form-control" placeholder="Add Value">
                                        @elseif ($setting->type === 'textarea')
                                            <textarea name="value" class="form-control" placeholder="Add Value">{{ $setting->value }}</textarea>
                                        @elseif ($setting->type === 'editor')
                                            <textarea name="value" class="form-control" id="editor" placeholder="Add Value">{{ $setting->value }}</textarea>
                                        @elseif ($setting->type === 'image')
                                            <div class="imageSelect">
                                                Select Image
                                                <input type="file" name="value" class="form-control" id="image-input">
                                                <img id="image-preview" src="#" alt="" width="100">
                                            </div>
                                            @if ($setting->value)
                                                <img src="{{ getImage('settings', $setting->value) }}" alt="{{ $setting->key }}" width="200" class="preview-image">
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <div class="text-center pt-10">
                                    <button type="submit" class="btn btn-primary submit">
                                        <span class="indicator-label">
                                            Submit
                                        </span>
                                        <span class="indicator-progress">
                                            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
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
