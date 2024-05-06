<div class="modal-dialog modal-dialog-centered mw-650px">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="fw-bold">Add a Permission</h2>
            <div class="btn btn-icon btn-sm btn-active-icon-primary"
            data-bs-dismiss="modal">
                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                        class="path2"></span></i>
            </div>
        </div>
        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
            <!--begin::Form-->
            <form class="form" id="ajax_form" action="{{route('admin.permissions.update', $item->id)}}" method="POST">
                @csrf
                @method('PUT')
                <!--begin::Input group-->
                <div class="fv-row mb-7">
                    <!--begin::Label-->
                    <label class="fs-6 fw-semibold form-label mb-2">
                        <span class="required">Permission Name</span>
                        <span class="ms-2" data-bs-toggle="popover" data-bs-trigger="hover"
                            data-bs-html="true"
                            data-bs-content="Permission names is required to be unique.">
                            <i class="ki-duotone ki-information fs-7"><span
                                    class="path1"></span><span class="path2"></span><span
                                    class="path3"></span></i> </span>
                    </label>
                    <input class="form-control form-control-solid"
                        placeholder="Enter a permission name" name="name" value="{{$item->name}}" />
                    <!--end::Input-->
                </div>
                <div class="fv-row mb-7">
                    <label class="fs-6 fw-semibold form-label mb-2">
                        <span class="required">Guard Name</span>
                        <span class="ms-2" data-bs-toggle="popover" data-bs-trigger="hover"
                            data-bs-html="true"
                            data-bs-content="Permission names is required to be unique.">
                            <i class="ki-duotone ki-information fs-7"><span
                                    class="path1"></span><span class="path2"></span><span
                                    class="path3"></span></i> </span>
                    </label>
                    <select name="guard_name" id="" class="form-control form-control-solid">
                        <option value="admin" {{$item->guard_name == 'admin' ? 'selected' : ''}}>Admin</option>
                    </select>
                    <!--end::Input-->
                </div>
                <!--end::Disclaimer-->

                <!--begin::Actions-->
                <div class="text-center pt-15">
                    <button type="reset" class="btn btn-light me-3"
                        data-bs-dismiss="modal">
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
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Modal body-->
    </div>
    <!--end::Modal content-->
</div>
