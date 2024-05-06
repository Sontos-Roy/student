<div class="scroll-y mh-325px my-5 px-8">
    @foreach (getNotifications() as $notification)
    <div class="d-flex flex-stack py-4">
        <!--begin::Section-->
        <div class="d-flex align-items-center">
            <!--begin::Symbol-->
            <div class="symbol symbol-35px me-4">
                <span class="symbol-label bg-light-primary">
                    <i class="ki-duotone ki-abstract-28 fs-2 text-primary"><span
                            class="path1"></span><span
                            class="path2"></span></i>
                </span>
            </div>
            <!--end::Symbol-->
            <!--begin::Title-->
            <div class="mb-0 me-2">
                <a href="#"
                    class="fs-6 text-gray-800 text-hover-primary fw-bold text-capitalize">{{$notification->data['type'] ? $notification->data['type'] : ''}}</a>
                <div class="text-gray-500 fs-7">{{$notification->data['message']}}</div>
            </div>
            <!--end::Title-->
        </div>
        <!--end::Section-->

        <!--begin::Label-->
        <span class="badge badge-light fs-8">{{$notification->created_at->diffForHumans(null, true, false)}}</span>
        <!--end::Label-->
    </div>
    <!--end::Item-->
    @endforeach
</div>
@if (getNotifications()->count())
<div class="py-3 text-center border-top">
    <a href=""
        class="btn btn-color-gray-600 btn-active-color-primary">
        View All
        <i class="ki-duotone ki-arrow-right fs-5"><span
                class="path1"></span><span class="path2"></span></i> </a>
</div>
<!--end::View more-->
@else
<div class="py-3 text-center border-top">
    Not Found
</div>
<!--end::View more-->

@endif
