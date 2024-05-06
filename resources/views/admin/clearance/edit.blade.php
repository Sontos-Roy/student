    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
                <h2 class="fw-bold">Edit Clearance</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary"
                data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span
                            class="path2"></span></i>
                </div>
            </div>
            <div class="modal-body px-5 my-7">
                <form id="ajax_form"
                            class="form fv-plugins-bootstrap5 fv-plugins-framework" action="{{route('admin.clearance.update', $item->id)}}" method="POST">
                            @csrf
                            @method("PUT")
                            <div class="d-flex flex-column scroll-y px-5 px-lg-10"
                                id="kt_modal_add_user_scroll">
                                @if ($degree->accept_faculty == 1)
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="required fw-semibold fs-6 mb-2">Faculty</label>
                                    <select name="faculty_id" id="" data-control="select2" class="form-control">
                                        <option value="">Select Your Faculty</option>
                                        @foreach ($faculties as $faculty)
                                        <option value="{{$faculty->id}}" {{$item->faculty_id == $faculty->id ? 'selected' : ''}}>{{ $faculty->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif
                                @if ($degree->accept_department == 1)
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="required fw-semibold fs-6 mb-2">Department</label>
                                    <select name="department_id" data-control="select2" id="" class="form-control">
                                        <option value="">Select Your Department</option>
                                        @foreach ($departments as $department)
                                        <option value="{{$department->id}}" {{$item->department_id == $department->id ? 'selected' : ''}}>{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="required fw-semibold fs-6 mb-2">Degree Name</label>
                                    <input type="text" name="" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="{{$degree->name}}" disabled>
                                    <input type="hidden" name="degree_id" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="{{$degree->id}}">
                                </div>
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="required fw-semibold fs-6 mb-2">Thesis/Internship Title</label>
                                    <input type="text" name="internship_title" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="{{$item->internship_title}}">
                                </div>
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="required fw-semibold fs-6 mb-2">Hall Name</label>
                                    <select name="hall_id" id="" data-control="select2" class="form-control">
                                        <option value="">Select Your Hall</option>
                                        @foreach ($halls as $hall)
                                        <option value="{{$hall->id}}" {{$item->hall_id == $hall->id ? 'selected' : ''}}>{{ $hall->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="fv-row mb-7 fv-plugins-icon-container">
                                    <label class="required fw-semibold fs-6 mb-2">Attach No</label>
                                    <input type="text" name="attach_no" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="" value="{{$item->attach_no}}">
                                </div>
                            </div>
                            <div class="text-center pt-10">
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
