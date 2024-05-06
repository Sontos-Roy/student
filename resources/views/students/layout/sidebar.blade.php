<div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu"
    data-kt-menu="true" data-kt-menu-expand="false">
    <div class="menu-item">
        <a class="menu-link {{ in_array($currentUrl, ['students.dashboard']) ? 'active' : '' }}" href="{{route('students.dashboard')}}">
            <span class="menu-icon">
                <i class="ki-duotone ki-user fs-2">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </span>
            <span class="menu-title">Profile</span>
        </a>
    </div>
    <div class="menu-item pt-5">
        <div class="menu-content"><span class="menu-heading fw-bold text-uppercase fs-7">Applications</span></div>
    </div>
    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
        <span class="menu-link"><span class="menu-icon"><i class="ki-duotone ki-address-book fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></span><span class="menu-title">Apply for Clearence</span><span class="menu-arrow"></span></span>
        <div class="menu-sub menu-sub-accordion" kt-hidden-height="250" style="display: none; overflow: hidden;">
            
            <div class="menu-item">
                <a class="menu-link" href="../pages/user-profile/overview.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Overview</span></a>
            </div>
            <div class="menu-item">
                <a class="menu-link" href="../pages/user-profile/projects.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Projects</span></a>
            </div>
            <div class="menu-item">
                <a class="menu-link" href="../pages/user-profile/campaigns.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Campaigns</span></a>
            </div>
            <div class="menu-item">
                <a class="menu-link" href="../pages/user-profile/documents.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Documents</span></a>
            </div>
            <div class="menu-item">
                <a class="menu-link" href="../pages/user-profile/followers.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Followers</span></a>
            </div>
            <div class="menu-item">
                <a class="menu-link" href="../pages/user-profile/activity.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Activity</span></a>
            </div>
        </div>
        <!--end:Menu sub-->
    </div>
    <div class="menu-item">
        <a class="menu-link modal_btn {{ in_array($currentUrl, ['students.clearence.create']) ? 'active' : '' }}" href="{{route('students.clearence.index')}}">
            <span class="menu-icon">
                <i class="ki-duotone ki-user fs-2">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </span>
            <span class="menu-title">Apply for Clearence</span>
        </a>
    </div>
    @if (auth()->user()->clearance)
    <div class="menu-item">
        <a class="menu-link {{ in_array($currentUrl, ['students.clearence.status']) ? 'active' : '' }}" href="{{route('students.clearence.status')}}">
            <span class="menu-icon">
                <i class="ki-duotone ki-user fs-2">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </span>
            <span class="menu-title">Check Application Status</span>
        </a>
    </div>
    @endif
    <div class="menu-item">
        <a class="menu-link {{ in_array($currentUrl, ['students.testimonials.create']) ? 'active' : '' }}" href="{{route('students.testimonials.create')}}">
            <span class="menu-icon">
                <i class="ki-duotone ki-user fs-2">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </span>
            <span class="menu-title">Apply for Testimonial</span>
        </a>
    </div>
    <div class="menu-item">
        <a class="menu-link {{ in_array($currentUrl, ['students.testimonials.index']) ? 'active' : '' }}" href="{{route('students.testimonials.index')}}">
            <span class="menu-icon">
                <i class="ki-duotone ki-user fs-2">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </span>
            <span class="menu-title">Testimonials</span>
        </a>
    </div>
    <div class="menu-item">
        <a class="menu-link modal_btn {{ in_array($currentUrl, ['students.provisional.certificates.form.index']) ? 'active' : '' }}" href="{{route('students.provisional.certificates.form.index')}}">
            <span class="menu-icon">
                <i class="ki-duotone ki-user fs-2">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </span>
            <span class="menu-title">Provisional Certificates Form</span>
        </a>
    </div>

    <div class="menu-item">
        <a class="menu-link {{ in_array($currentUrl, ['students.help.create']) ? 'active' : '' }}" href="{{route('students.help.create')}}">
            <span class="menu-icon">
                <i class="ki-duotone ki-user fs-2">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </span>
            <span class="menu-title">Help/Complaint</span>
        </a>
    </div>
</div>
