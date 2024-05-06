@php
    use Illuminate\Support\Facades\Request;
    use Illuminate\Support\Facades\Route;
    $currentUrl = Route::currentRouteName();
@endphp
<div class="card mb-5 mb-xl-10">
    <div class="card-body pt-9 pb-0">
        <!--begin::Details-->
        <div class="d-flex flex-wrap flex-sm-nowrap">
            <!--begin: Pic-->
            <div class="me-7 mb-4">
                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                    <img src="{{getImage('users', $user->image)}}" alt="image">
                    <div
                        class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px">
                    </div>
                </div>
            </div>
            <div class="flex-grow-1">
                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                    <div class="d-flex flex-column">
                        <div class="d-flex align-items-center mb-2">
                            <a href="#"
                                class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ $user->name }}</a>
                            @if ($user->two_factor && $user->status)
                                <a href="#"><i class="ki-duotone ki-verify fs-1 text-primary"><span
                                            class="path1"></span><span class="path2"></span></i></a>
                            @endif
                        </div>
                        <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                            @if ($user->address)
                                <a href="#"
                                    class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                                    <i class="ki-duotone ki-geolocation fs-4 me-1"><span
                                            class="path1"></span><span class="path2"></span></i>
                                    {{ $user->address }}
                                </a>
                            @endif
                            @if ($user->email)
                                <a href="mail:{{ $user->email }}"
                                    class="d-flex align-items-center text-gray-500 text-hover-primary mb-2">
                                    <i class="ki-duotone ki-sms fs-4"><span class="path1"></span><span
                                            class="path2"></span></i> {{ $user->email }}
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                        <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                            <span class="fw-semibold fs-6 text-gray-500">Profile Compleation</span>
                            <span class="fw-bold fs-6">{{ getCompletion($user->id) }}%</span>
                        </div>

                        <div class="h-5px mx-3 w-100 bg-light mb-3">
                            <div class="bg-success rounded h-5px" role="progressbar"
                                style="width: {{ getCompletion($user->id) }}%;" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap flex-stack">
                </div>
            </div>
        </div>
        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ in_array($currentUrl, ['students.dashboard', 'students.profile.edit']) ? 'active' : '' }}" href="{{route('students.dashboard')}}">
                    Overview </a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ in_array($currentUrl, ['students.profile.settings']) ? 'active' : '' }}" href="{{route('students.profile.settings')}}">
                    Settings </a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ in_array($currentUrl, ['students.profile.security']) ? 'active' : '' }}" href="{{route('students.profile.security')}}">
                    Security </a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ in_array($currentUrl, ['students.notifications']) ? 'active' : '' }}" href="{{route('students.notifications')}}">
                    Notifications </a>
            </li>
        </ul>
    </div>
</div>
