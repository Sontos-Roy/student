    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_add_user_header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Select Degree</h2>
                <!--end::Modal title-->

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary"
                data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                            class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body px-5 my-7">
                <!--begin::Form-->
                <form id="ajax_form"
                    class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{route('students.clearence.get.store')}}" method="POST">
                    @csrf
                    <div class=""
                        id="kt_modal_add_user_scroll" data-kt-scroll="true"
                        data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_user_header"
                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                        data-kt-scroll-offset="300px" style="max-height: 146px;">
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <label class="required fw-semibold fs-6 mb-2">Select Degree</label>
                            <select name="degree_id" id="" class="form-control">
                                @foreach ($items as $item)
                                <option value="{{$item->id}}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <label class="required fw-semibold fs-6 mb-2">Select Degree</label>
                            <select name="program_id" id="" class="form-control">
                                @foreach ($programs as $item)
                                <option value="{{$item->id}}">{{ $item->title }}</option>
                                @endforeach
                            </select>
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
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
