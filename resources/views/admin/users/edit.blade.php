    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="">
                <h2 class="fw-bold">Edit User</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>
            <div class="modal-body px-5 my-7">
                <form id="ajax_form" class="form fv-plugins-bootstrap5 fv-plugins-framework" method="POST"
                    action="{{ route('admin.manage.users.update', $user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="card-body border-top p-9">
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>
                            <div class="col-lg-8">
                                <div class="image-input image-input-outline" data-kt-image-input="true"
                                    style="background-image: url({{ asset('assets/media/svg/avatars/blank.svg') }})">
                                    <div class="image-input-wrapper w-125px h-125px"
                                        style="background-image: url({{ getImage('users', $user->avatar) }})"></div>
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                        aria-label="Change avatar" data-bs-original-title="Change avatar"
                                        data-kt-initialized="1">
                                        <i class="ki-duotone ki-pencil fs-7"><span class="path1"></span><span
                                                class="path2"></span></i>
                                        <input type="file" name="image" accept=".png, .jpg, .jpeg">
                                        <input type="hidden" name="avatar_remove">
                                    </label>
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                        aria-label="Cancel avatar" data-bs-original-title="Cancel avatar"
                                        data-kt-initialized="1">
                                        <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span
                                                class="path2"></span></i> </span>
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                        aria-label="Remove avatar" data-bs-original-title="Remove avatar"
                                        data-kt-initialized="1">
                                        <i class="ki-duotone ki-cross fs-2"><span class="path1"></span><span
                                                class="path2"></span></i> </span>
                                </div>
                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                            </div>
                        </div>
                        <div class="fv-row mb-5">
                            <div class="d-flex flex-stack">
                                <div class="me-5">
                                    <label class="fs-5 fw-semibold">Status</label>
                                </div>
                                <label class="form-check form-switch form-check-custom form-check-solid">
                                    <input class="form-check-input" name="status" type="checkbox" value="1" {{$user->status == 1 ? 'checked' : ''}}>
                                    <span class="form-check-label fw-semibold text-muted">
                                        Active
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                        <input type="text" name="name"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            placeholder="" value="{{ $user->name }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Contact Phone</label>
                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                <input type="tel" name="phone"
                                    class="form-control form-control-lg form-control-solid" placeholder="Phone number"
                                    value="{{ $user->phone }}">
                            </div>
                        </div>
                        <div class="row mb-6">
                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Email</label>
                            <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                <input type="email" name="email"
                                    class="form-control form-control-lg form-control-solid" placeholder="Email"
                                    value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <label class="required fw-semibold fs-6 mb-2">Select User Approver Role</label>
                            <select name="role_id" data-control="select2" id="" class="form-control">
                                <option value="">Select Role</option>
                                @foreach ($approver_roles as $item)
                                    <option value="{{$item->id}}" {{$user->role_id == $item->id ? 'selected' : ''}}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="fv-row mb-7">
                            <label class="fs-6 fw-semibold form-label mb-5">
                                <span class="required">Select a user Access role</span>
                            </label>
                            @foreach ($roles as $key=> $item)
                            <div class="d-flex">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input me-3" name="user_role" value="{{$item->name}}" {{$user->roles->contains($item->id) ? 'checked' : ''}} type="radio" id="kt_modal_update_role_option_{{$key}}">
                                    <label class="form-check-label" for="kt_modal_update_role_option_{{$key}}">
                                        <div class="fw-bold text-gray-800">{{$item->name}}</div>
                                    </label>
                                </div>
                            </div>
                            <div class="separator separator-dashed my-5"></div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                        <button type="submit" id="" class="btn btn-primary submit">
                            <span class="indicator-label">
                                Save Change</span>
                            <span class="indicator-progress">
                                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
