<div class="modal fade " id="kt_modal_import_users" tabindex="-1" aria-modal="true" role="dialog">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px" data-select2-id="select2-data-131-gnv0">
        <!--begin::Modal content-->
        <div class="modal-content" data-select2-id="select2-data-130-gkkb">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Import Users</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form id="ajax_form2" class="form fv-plugins-bootstrap5 fv-plugins-framework ajax_form" action="{{route('admin.student.import')}}" method="POST" data-select2-id="select2-data-kt_modal_import_users_form" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="sOadMh6rx3DfsVtlOX5ueO2JyErpDnvLmTlsdGsT" autocomplete="off">                                                <!--begin::Input group-->
                    <!--begin::Input group-->
                    <div class="fv-row mb-10 fv-plugins-icon-container">
                        <!--begin::Label-->
                        <label class="required fs-6 fw-semibold form-label mb-2">Select Import
                            File (Format must be .xlsx):</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="file" class="form-control" name="file">
                        <!--end::Input-->
                        <div class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                        </div>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close">
                            Cancle
                        </button>

                        <button type="submit" class="btn btn-primary submit" data-kt-users-modal-action="submit">
                            <span class="indicator-label">
                                Submit
                            </span>
                            <span class="indicator-progress">
                                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
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
    <!--end::Modal dialog-->
</div>
