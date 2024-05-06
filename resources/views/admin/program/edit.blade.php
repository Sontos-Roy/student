    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
                <h2 class="fw-bold">Edit Program</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary"
                data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                            class="path2"></span></i>
                </div>
            </div>
            <div class="modal-body px-5 my-7">
                <form id="ajax_form"
                    class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{route('admin.programs.update', $item->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10"
                        id="kt_modal_add_user_scroll" data-kt-scroll="true"
                        data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_user_header"
                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                        data-kt-scroll-offset="300px">
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <label class="required fw-semibold fs-6 mb-2">Title</label>
                            <input type="text" name="title"
                                class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="Program title" value="{{$item->title}}">
                        </div>
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <label class="required fw-semibold fs-6 mb-2">Code</label>
                            <input type="text" name="code"
                                class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="Code " value="{{$item->code}}">
                        </div>
                        <div class="fv-row mb-5">
                            <div class="d-flex flex-stack">
                                <div class="me-5">
                                    <label class="fs-5 fw-semibold">Accept CGPA</label>
                                </div>
                                <label class="form-check form-switch form-check-custom form-check-solid">
                                    <input class="form-check-input" name="cgpa_status" type="checkbox" value="1" {{ $item->cgpa_status ? 'checked' : ''}}>
                                    <span class="form-check-label fw-semibold text-muted">
                                        Yes
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="fv-row mb-5">
                            <div class="d-flex flex-stack">
                                <div class="me-5">
                                    <label class="fs-5 fw-semibold">Accept Exam Date</label>
                                </div>
                                <label class="form-check form-switch form-check-custom form-check-solid">
                                    <input class="form-check-input" name="exam_date_status" type="checkbox" value="1" {{$item->exam_date_status ? 'checked' : ''}}>
                                    <span class="form-check-label fw-semibold text-muted">
                                        Yes
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="fv-row mb-5">
                            <div class="d-flex flex-stack">
                                <div class="me-5">
                                    <label class="fs-5 fw-semibold">Accept Defense Semester</label>
                                </div>
                                <label class="form-check form-switch form-check-custom form-check-solid">
                                    <input class="form-check-input" name="defense_semester_status" type="checkbox" value="1" {{$item->defense_semester_status ? 'checked' : ''}}>
                                    <span class="form-check-label fw-semibold text-muted">
                                        Yes
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="text-center pt-10">
                        <button type="reset" class="btn btn-light me-3"
                        data-bs-dismiss="modal" aria-label="Close">
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
                </form>
            </div>
        </div>
    </div>
