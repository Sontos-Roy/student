    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
                <h2 class="fw-bold">View Help/Complaint</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary"
                data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                            class="path2"></span></i>
                </div>
            </div>
            <div class="modal-body px-5 my-7">
                    <div class="d-flex flex-column scroll-y px-5 px-lg-10"
                        id="kt_modal_add_user_scroll" data-kt-scroll="true"
                        data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_user_header"
                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                        data-kt-scroll-offset="300px">
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <label class="required fw-semibold fs-6 mb-2">Summary</label>
                            <p>{{ $item->summary }}</p>
                        </div>
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <label class="required fw-semibold fs-6 mb-2">Brief</label>
                            <p>{{ $item->brief }}</p>
                        </div>
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <label class="required fw-semibold fs-6 mb-2">Created At</label>
                            <p>{{ $item->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <div class="text-center pt-10">
                        <button type="reset" class="btn btn-light me-3"
                        data-bs-dismiss="modal" aria-label="Close">
                            Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
