@extends('layouts.students.app')
@section('content')
    <div class="d-flex flex-column flex-column-fluid">

        <!--begin::Toolbar-->
        <div id="kt_app_content" class="app-content  flex-column-fluid ">


            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container  container-xxl ">

                <!--begin::Navbar-->
                @include('students.layout.profile_menu')
                @include('students.profile.partials.allNotifications')
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Toolbar-->
    </div>
@endsection
@push('script')
    <script src="{{ asset('assets/js/custom/account/settings/signin-methods.js') }}"></script>
    <script src="{{ asset('assets/js/custom/account/settings/profile-details.js') }}"></script>
    <script src="{{ asset('assets/js/custom/account/settings/deactivate-account.js') }}"></script>
    <script src="{{ asset('assets/js/custom/pages/user-profile/general.js') }}"></script>
@endpush
