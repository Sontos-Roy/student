<div class="modal-dialog modal-dialog-centered mw-650px">
    <div class="modal-content">
        <div class="modal-header" id="">
            <h2 class="fw-bold">Edit User</h2>
            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
            </div>
        </div>
        <div class="modal-body px-5 my-7">
            <form id="ajax_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                action="{{ route('admin.manage.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll"
                    data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                    data-kt-scroll-dependencies="#kt_modal_add_user_header"
                    data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>
                        <div class="col-lg-8">
                            <div class="image-input image-input-outline" data-kt-image-input="true"
                                style="background-image: url({{asset('assets/media/svg/avatars/blank.svg')}})">
                                <div class="image-input-wrapper w-125px h-125px"
                                    style="background-image: url({{getImage('users', $user->image)}})"></div>
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
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                    <input type="text" name="name"
                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                        placeholder="" value="{{$user->name}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Registration No</label>
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="text" name="registration_no"
                                class="form-control form-control-lg form-control-solid"
                                placeholder="Registration No" value="{{$user->registration_no}}">
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">NID No</label>
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="text" name="nid"
                                class="form-control form-control-lg form-control-solid"
                                placeholder="NID No" value="{{$user->nid}}">
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Contact Phone</label>
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="tel" name="phone"
                                class="form-control form-control-lg form-control-solid"
                                placeholder="Phone number" value="{{$user->phone}}">
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Email</label>
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="email" name="email"
                                class="form-control form-control-lg form-control-solid"
                                placeholder="Email" value="{{$user->email}}">
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Session</label>
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="text" name="session"
                                class="form-control form-control-lg form-control-solid"
                                placeholder="session" value="{{$user->session}}">
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Father Name</label>
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="text" name="father_name"
                                class="form-control form-control-lg form-control-solid"
                                placeholder="Father name" value="{{$user->father_name}}">
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Mother Name</label>
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="text" name="mother_name"
                                class="form-control form-control-lg form-control-solid"
                                placeholder="Mother name" value="{{$user->mother_name}}">
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Address</label>
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="text" name="address"
                                class="form-control form-control-lg form-control-solid"
                                placeholder="Address" value="{{$user->address}}">
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Date of Birth</label>
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="date" name="dob"
                                class="form-control form-control-lg form-control-solid"
                                placeholder="Date of Birth" value="{{$user->dob}}">
                        </div>
                    </div>
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Nationality</label>
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="text" name="nationality"
                                class="form-control form-control-lg form-control-solid"
                                placeholder="Nationality" value="{{$user->nationality}}">
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Gender</label>
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                <select name="gender" id="" class="form-control form-control-lg form-control-solid">
                                    <option value="">Select Gender</option>
                                    <option value="Male" {{$user->gender == 'Male' ? 'selected' : ''}}>Male</option>
                                    <option value="Female" {{$user->gender == 'Female' ? 'selected' : ''}}>Female</option>
                                    <option value="Other" {{$user->gender == 'Other' ? 'selected' : ''}}>Other</option>
                                </select>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Signature</label>
                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="file" name="signature" class="form-control form-control-lg form-control-solid">
                                </div>
                                <div class="col-lg-6">
                                    @if ($user->signature)
                                        <img src="{{getImage('users', $user->signature)}}" alt="signature" width="100">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center pt-10">
                    <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal" aria-label="Close">
                        Discard
                    </button>

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
