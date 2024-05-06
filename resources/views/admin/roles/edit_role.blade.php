    <div class="modal-dialog modal-dialog-centered mw-750px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Edit Role</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                            class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body scroll-y mx-lg-5 my-7">
                <!--begin::Form-->
                <form id="ajax_form2" class="form fv-plugins-bootstrap5 fv-plugins-framework ajax_form"
                    action="{{route('admin.roles.update', $role->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                        data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_role_header"
                        data-kt-scroll-wrappers="#kt_modal_add_role_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
                        <div class="fv-row mb-10 fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold form-label mb-2">
                                <span class="required">Role name</span>
                            </label>
                            <input class="form-control form-control-solid" placeholder="Enter a role name"
                                name="name" value="{{$role->name}}">
                            <!--end::Input-->
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>
                        <div class="fv-row mb-10 fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold form-label mb-2">
                                <span class="required">Guard Name</span>
                            </label>
                                <select name="guard" id="" class="form-control form-control-solid">
                                    <option value="admin" {{$role->guard_name == 'admin' ? 'selected' : ''}}>Admin</option>
                                    {{-- <option value="web" {{$role->guard_name == 'web' ? 'selected' : ''}}>Web</option> --}}
                                </select>
                            <div
                                class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                            </div>
                        </div>
                        <div class="fv-row">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold form-label mb-2">Role Permissions</label>
                            <div class="d-flex flex-wrap mt-4">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-gray-800">
                                    <label
                                        class="form-check form-check-custom form-check-solid me-9">
                                        <input class="form-check-input" type="checkbox"
                                            value="kjdf" id="kt_roles_select_all2">
                                        <span class="form-check-label fs-6"
                                            for="kt_roles_select_all2">
                                            Select all
                                        </span>
                                    </label>
                                </div>
                                @foreach ($permissions as $item)
                                <div class="col-lg-4 col-md-4 col-sm-6 col-12 text-gray-800 p-3">
                                    <label
                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                        <input class="form-check-input" type="checkbox"
                                            value="{{$item->name}}" {{ in_array($item->id, $rolePermissions) ? 'checked' : '' }} name="permissions[]">
                                        <span class="form-check-label fs-6">
                                            {{$item->name}}
                                        </span>
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <!--end::Scroll-->

                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal">
                                Discard
                            </button>

                            <button type="submit" class="btn btn-primary" data-kt-roles-modal-action="submit">
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
    <script>
        $(document).ready(function() {
            $("#kt_roles_select_all2").on("change", function() {
                var isChecked = $(this).is(":checked");
                $('[type="checkbox"]').prop("checked", isChecked);
            });
        });
    </script>
