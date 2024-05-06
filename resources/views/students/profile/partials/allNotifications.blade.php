<div class="card">
    <!--begin::Card head-->
    <div class="card-header card-header-stretch">
        <!--begin::Title-->
        <div class="card-title d-flex align-items-center">
            <i class="ki-duotone ki-calendar-8 fs-1 text-primary me-3 lh-0"><span class="path1"></span><span
                    class="path2"></span><span class="path3"></span><span class="path4"></span><span
                    class="path5"></span><span class="path6"></span></i>

            <h3 class="fw-bold m-0 text-gray-800">Today {{ date('M d Y') }}</h3>
        </div>
    </div>
    <div class="card-body">
        <div id="kt_activity_today" class="card-body p-0 tab-pane fade active show" role="tabpanel"
                aria-labelledby="kt_activity_today_tab">
                <div class="timeline timeline-border-dashed">
                    @foreach ($user->notifications as $item)
                    <div class="timeline-item">
                        <div class="timeline-line"></div>
                        <div class="timeline-icon">
                            @if ($item->data['type'] == 'login')
                            <i class="ki-duotone ki-message-text-2 fs-2 text-gray-500"><span class="path1"></span><span
                                class="path2"></span><span class="path3"></span></i>
                            @elseif($item->data['type'] == 'Payment')

                            @elseif($item->data['type'] == 'Unauthorized Access')

                            @elseif(isset($item->data['for']) == 'Clearance')
                            <i class="ki-duotone ki-credit-cart fs-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            @else
                            <i class="ki-duotone ki-notification fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            </i>
                            @endif
                        </div>
                        <div class="timeline-content mb-10 mt-n1">
                            @if (isset($item->data['for']) == "Clearance")
                            <div class="pe-3 mb-5">
                                <div class="fs-5 fw-bolder mb-2">{{ $item->data['type'] }} (From : {{ $item->data['from'] }})</div>
                                <div class="fs-5 mb-2">{{ $item->data['message'] }}</div>
                                <div class="d-flex align-items-center mt-1 fs-6">
                                    <div class="text-muted me-2 fs-7">{{$item->created_at->diffForHumans(null, true, false)}}</div>
                                </div>
                            </div>
                            @else
                            <div class="pe-3 mb-5">
                                <div class="fs-5 fw-bolder mb-2">{{ $item->data['type'] }}</div>
                                <div class="fs-5 mb-2">{{ $item->data['message'] }}</div>
                                <div class="d-flex align-items-center mt-1 fs-6">
                                    <div class="text-muted me-2 fs-7">{{$item->created_at->diffForHumans(null, true, false)}}</div>
                                </div>
                            </div>
                            @endif

                        </div>
                        <form action="{{route('students.notifications.destroy', $item->id)}}" method="POST" class="delete_form">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-sm"><i class="ki-duotone ki-cross-square fs-2"><span class="path1"></span><span class="path2"></span></i></button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>
    </div>
    <!--end::Card body-->
</div>
