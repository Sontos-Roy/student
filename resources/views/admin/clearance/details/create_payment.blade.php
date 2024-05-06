@if (!$pay)
<div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
                <h2 class="fw-bold">
                    {{ Auth::guard('admin')->user()->approve_role ? Auth::guard('admin')->user()->approve_role->name : '' }}
                    Send SMS to {{$item->user->name }}</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>
            <div class="modal-body px-5 my-7">
                <form id="ajax_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                    action="{{ route('admin.payments.store') }}" method="POST">
                    @csrf
                    <div class="scroll-y" id="kt_modal_add_user_scroll" data-kt-scroll="true"
                        data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_user_header"
                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px"
                        style="max-height: 146px;">
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <label class="required fw-semibold fs-6 mb-2">Due Reason</label>
                            <input type="text" class="form-control" name="type">
                        </div>
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <label class="required fw-semibold fs-6 mb-2">Enter Due</label>
                            <input type="number" class="form-control" name="due">
                            <input type="hidden" class="form-control" name="user_id" value="{{ $item->user_id }}">
                            <input type="hidden" class="form-control" name="for" value="Clearance">
                            <input type="hidden" class="form-control" name="update_approver" value="{{$item->id}}">
                            <input type="hidden" class="form-control" name="from" value="{{Auth::guard('admin')->user()->approve_role ? Auth::guard('admin')->user()->approve_role->name : ''}}">
                        </div>
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <label class="required fw-semibold fs-6 mb-2">Enter Currency * (Default: Taka)</label>
                            <input type="text" class="form-control" name="currency">
                        </div>
                        <div class="fv-row mb-7 fv-plugins-icon-container">
                            <label class="required fw-semibold fs-6 mb-2">Enter Message * (If you don't Provide message
                                here, then it will send default notification to user. otherwish it will send your
                                custome notification to student profile and phone.)</label>
                            <textarea name="message" id="" class="form-control" cols="30" rows="3"></textarea>
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
</div>
@endif
@if ($pay && $pay->status == 0)
<div class="modal fade" id="kt_modal_add_user2" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
                <h2 class="fw-bold">No Due for
                    {{ Auth::guard('admin')->user()->approve_role ? Auth::guard('admin')->user()->approve_role->name : '' }}</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>
            <div class="modal-body px-5 my-7">
                <form id="ajax_form2" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                    action="{{ route('admin.change.payment.status', $pay->id) }}" method="POST">
                    @csrf
                    <div class="scroll-y" id="kt_modal_add_user_scroll" data-kt-scroll="true"
                        data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_user_header"
                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px"
                        style="max-height: 146px;">
                        <div class="fv-row mb-5">
                            <div class="d-flex flex-stack">
                                <div class="me-5">
                                    <label class="fs-5 fw-semibold">Approve No Due</label>
                                </div>
                                <label class="form-check form-switch form-check-custom form-check-solid">
                                    <input class="form-check-input" name="status" type="checkbox" value="1">
                                    <span class="form-check-label fw-semibold text-muted">
                                        Yes
                                    </span>
                                </label>
                                <input type="hidden" class="form-control" name="user_id" value="{{ $item->user_id }}">
                                <input type="hidden" class="form-control" name="for" value="Clearance">
                                <input type="hidden" class="form-control" name="from" value="{{Auth::guard('admin')->user()->approve_role ? Auth::guard('admin')->user()->approve_role->name : ''}}">
                            </div>
                        </div>
                        <div class="fv-row mb-5">
                            <label class="fs-5 fw-semibold">Select Approver</label>
                            <select name="" data-control="select2" class="form-controll">
                                @foreach ($users as $user2)
                                    <option value="{{$user2->id}}">{{ $user2->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="text-center pt-10">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal"
                            aria-label="Close">
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
</div>
@endif

<div class="modal fade" id="kt_modal_add_user3" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
                <h2 class="fw-bold">
                    {{ Auth::guard('admin')->user()->approve_role ? Auth::guard('admin')->user()->approve_role->name : '' }} Authorized Sign</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>
            <div class="modal-body px-5 my-7">
                <form class="form fv-plugins-bootstrap5 fv-plugins-framework ajax_form"
                    action="{{ route('admin.get.clearance.approve', $item->id) }}" method="POST">
                    @csrf
                    <div class="scroll-y" id="kt_modal_add_user_scroll" data-kt-scroll="true"
                        data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_user_header"
                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px"
                        style="max-height: 146px;">
                        <div class="fv-row mb-5">
                            <div class="d-flex flex-stack">
                                <div class="me-5">
                                    <label class="fs-5 fw-semibold">Approve Clearnace / Authorized Sign</label>
                                </div>
                                <label class="form-check form-switch form-check-custom form-check-solid">
                                    <input class="form-check-input" name="approve" type="checkbox">
                                    <span class="form-check-label fw-semibold text-muted">
                                        Yes
                                    </span>
                                </label>
                            </div>
                        </div>
                        @if (auth('admin')->user()->hasRole('admin'))
                            <div class="fv-row mb-5">
                                <label class="fs-5 fw-semibold">Select Approve Role</label>
                                <select name="approver_role_id" data-control="select2" class="form-control approver_roles">
                                    @foreach ($roles as $role)
                                        <option value="{{$role->approverRole->id}}">{{ $role->approverRole->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="fv-row mb-5">
                                <label class="fs-5 fw-semibold">Select Approver</label>
                                <select name="admin_id"  data-control="select2" class="form-control approver_users">
                                    @foreach ($users as $user2)
                                        <option value="{{$user2->id}}">{{ $user2->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @else
                            <input type="hidden" name="approver_role_id" value="{{auth('admin')->user()->role_id}}">
                            <input type="hidden" name="admin_id" value="{{auth('admin')->id()}}">
                        @endif
                    </div>
                    <div class="text-center pt-10">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal"
                            aria-label="Close">
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
</div>

<div class="modal fade" id="kt_modal_add_user4" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
                <h2 class="fw-bold">
                   {{$item->user->name}} has No Due</h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
            </div>
            <div class="modal-body px-5 my-7">
                <form id="" class="form fv-plugins-bootstrap5 fv-plugins-framework ajax_form"
                    action="{{ route('admin.no.due', $item->id) }}" method="POST">
                    @csrf
                    <div class="scroll-y" id="kt_modal_add_user_scroll" data-kt-scroll="true"
                        data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                        data-kt-scroll-dependencies="#kt_modal_add_user_header"
                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px"
                        style="max-height: 146px;">
                        <div class="fv-row mb-5">
                            <div class="d-flex flex-stack">
                                <div class="me-5">
                                    <label class="fs-5 fw-semibold">Approve For No Due</label>
                                </div>
                                <label class="form-check form-switch form-check-custom form-check-solid">
                                    <input class="form-check-input" name="no_due" type="checkbox" value="1">
                                    <span class="form-check-label fw-semibold text-muted">
                                        Yes
                                    </span>
                                    <input type="hidden" name="type" value="Clearance">
                                    <input type="hidden" name="user_id" value="{{$item->user_id}}">
                                    <input type="hidden" name="update_approver" value="{{$item->id}}">
                                </label>
                            </div>
                        </div>

                            <input type="hidden" name="admin_id" value="{{auth('admin')->id()}}">
                    </div>
                    <div class="text-center pt-10">
                        <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal"
                            aria-label="Close">
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
</div>

@push('script')
<script>
    $(document).ready(function(){
        $('.approver_roles').change(function(){
            let id = $(this).val();
            $.ajax({
                url: '{{ route("admin.role.wish.admins") }}',
                method: 'GET',
                data: {
                    id: id
                },
                success: function(response) {
                    $('.approver_users').empty();
                    $.each(response, function(key, value) {
                        $('.approver_users').append($('<option>', {
                            value: value.id,
                            text: value.name
                        }));
                    });
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    })
</script>
@endpush
