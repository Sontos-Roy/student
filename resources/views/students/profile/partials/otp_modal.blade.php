    <!--begin::Modal header-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header flex-stack">
                <!--begin::Title-->
                <h2>Choose An Authentication Method</h2>
                <div class="btn btn-sm btn-icon btn-active-color-primary dismiss_modal2" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>
            <div class="modal-body scroll-y pt-10 pb-15 px-lg-17">
                <div class="" data-kt-element="sms">
                    <!--begin::Heading-->
                    <h3 class="text-gray-900 fw-bold fs-3 mb-5">
                        SMS: Verify Your Mobile Number
                    </h3>
                    <!--end::Heading-->

                    <!--begin::Notice-->
                    <div class="text-muted fw-semibold mb-10">
                        Enter your mobile phone number with country code and we will send you a verification code upon
                        request.
                    </div>
                    <div class="text-muted fw-semibold mb-10">
                        {{$msg}}
                    </div>
                    <!--end::Notice-->
                    <!--begin::Form-->
                    <form data-kt-element="sms-form" class="form fv-plugins-bootstrap5 fv-plugins-framework ajax_form"
                        action="{{route('students.enable.two.factor')}}" method="POST">
                        @csrf
                        <!--begin::Input group-->
                        <div class="mb-10 fv-row fv-plugins-icon-container">
                            <input type="text" class="form-control form-control-lg form-control-solid"
                                placeholder="Enter 6 Digit of Code" name="otp">
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="d-flex flex-center">
                            <button type="reset" data-kt-element="sms-cancel" class="btn btn-light me-3 dismiss_modal"
                                data-bs-dismiss="modal">
                                Cancel
                            </button>

                            <button type="submit" data-kt-element="sms-submit" class="btn btn-primary submit">
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
                <!--end::SMS-->
            </div>
            <!--begin::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <script>
$(document).ready(function(){
            $('.dismiss_modal').click(function(){
                window.location.reload();
            })
        })
    </script>
