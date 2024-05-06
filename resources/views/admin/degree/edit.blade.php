    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
                <h2 class="fw-bold">Add Student</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary"
                data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                            class="path2"></span></i>
                </div>
            </div>
            <div class="modal-body px-5 my-7">
                <form id="ajax_form"
                    class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{route('admin.degree.update', $item->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10"
                        id="kt_modal_add_user_scroll" data-kt-scroll="true"
                        data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_user_header"
                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                        data-kt-scroll-offset="300px">
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <label class="required fw-semibold fs-6 mb-2">Name</label>
                            <input type="text" name="name"
                                class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="Degree name" value="{{$item->name}}">
                        </div>
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <label class="required fw-semibold fs-6 mb-2">Code Name</label>
                            <input type="text" name="code_name"
                                class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="Code name" value="{{$item->code_name}}">
                        </div>
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <label class="required fw-semibold fs-6 mb-2">Select Roles</label>
                            <select name="roles[]" data-control="select2" id="" class="form-select" multiple>
                                @foreach ($roles as $role)
                                <option value="{{$role->id}}" {{$item->approverRoles->contains($role->id) ? 'selected' : ''}}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="fv-row mb-5">
                            <div class="d-flex flex-stack">
                                <div class="me-5">
                                    <label class="fs-5 fw-semibold">Accept Faculty</label>
                                </div>
                                <label class="form-check form-switch form-check-custom form-check-solid">
                                    <input class="form-check-input" name="accept_faculty" {{$item->accept_faculty == 1 ? 'checked' : ''}} type="checkbox" value="1" >
                                    <span class="form-check-label fw-semibold text-muted">
                                        Yes
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="fv-row mb-5">
                            <div class="d-flex flex-stack">
                                <div class="me-5">
                                    <label class="fs-5 fw-semibold">Accept Department</label>
                                </div>
                                <label class="form-check form-switch form-check-custom form-check-solid">
                                    <input class="form-check-input" name="accept_department" {{$item->accept_department == 1 ? 'checked' : ''}} type="checkbox" value="1" >
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
@include('layouts.admin.js')
