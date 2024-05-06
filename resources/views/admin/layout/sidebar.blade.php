<div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu"
    data-kt-menu="true" data-kt-menu-expand="false">
    <!--begin:Menu item-->

    <div class="menu-item"><!--begin:Menu link-->
        <a class="menu-link {{in_array($currentUrl, ['admin.dashboard']) ? 'active' : '' }}" href="{{route('admin.dashboard')}}">
            <span class="menu-icon">
                <i class="ki-duotone ki-element-11 fs-2">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                    <span class="path4"></span>
                </i>
            </span>
            <span class="menu-title">Dashboard</span>
        </a><!--end:Menu link-->
    </div>
    @php
        $students_route = ['admin.students.index', 'admin.students.create', 'admin.students.edit']
    @endphp
    @if (permission('students'))
    <div class="menu-item"><!--begin:Menu link-->
        <a class="menu-link {{in_array($currentUrl, $students_route) ? 'active' : '' }}" href="{{route('admin.students.index')}}">
            <span class="menu-icon">
                <i class="ki-duotone ki-user fs-2">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </span>
            <span class="menu-title">Students</span>
        </a><!--end:Menu link-->
    </div>
    @endif
    <!--end:Menu item-->
    <div class="menu-item pt-5"><!--begin:Menu content-->
        <div class="menu-content"><span class="menu-heading fw-bold text-uppercase fs-7">Pages</span></div>
        <!--end:Menu content-->
    </div><!--end:Menu item-->
    @php
        $users_route = ['admin.manage.users.index', 'admin.manage.users.create', 'admin.manage.users.edit']
    @endphp
    @if (permission('manage.users'))
    <div class="menu-item"><!--begin:Menu link-->
        <a class="menu-link {{in_array($currentUrl, $users_route) ? 'active' : '' }}" href="{{route('admin.manage.users.index')}}">
            <span class="menu-icon">
                <i class="ki-duotone ki-user fs-2">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </span>
            <span class="menu-title">Manage Users</span>
        </a><!--end:Menu link-->
    </div>
    @endif
    @php
        $permisions_route = ['admin.permissions.index', 'admin.permissions.create', 'admin.permissions.edit'];
        $roles_route = ['admin.roles.index', 'admin.roles.create', 'admin.roles.edit'];
        $settings_route = ['admin.settings.index', 'admin.settings.create', 'admin.settings.edit'];
        $degree_route = ['admin.degree.index', 'admin.degree.create', 'admin.degree.edit'];
        $clearance = ['admin.clearance.index', 'admin.clearance.create', 'admin.clearance.edit'];
        $testimonials = ['admin.testimonials.index', 'admin.testimonials.create', 'admin.testimonials.edit'];
        $pro_certificate = ['admin.provisional.certificates.index', 'admin.provisional.certificates.create', 'admin.provisional.certificates.edit'];
        $approver_roles = ['admin.approver.roles.index', 'admin.approver.roles.create', 'admin.approver.roles.edit'];
        $programs_route = ['admin.programs.index', 'admin.programs.create', 'admin.programs.edit'];
    @endphp
    @if (permission('clearance'))
    <div class="menu-item"><!--begin:Menu link-->
        <a class="menu-link {{in_array($currentUrl, $clearance) ? 'active' : '' }}" href="{{route('admin.clearance.index')}}">
            <span class="menu-icon">
                <i class="ki-duotone ki-user fs-2">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </span>
            <span class="menu-title">Clearance</span>
        </a>
    </div>
    @endif
    @if (permission('testimonial'))
    <div class="menu-item"><!--begin:Menu link-->
        <a class="menu-link {{in_array($currentUrl, $testimonials) ? 'active' : '' }}" href="{{route('admin.testimonials.index')}}">
            <span class="menu-icon">
                <i class="ki-duotone ki-user fs-2">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </span>
            <span class="menu-title">Testimonials</span>
        </a>
    </div>
    @endif
    @if (permission('provisional.certificate'))
    <div class="menu-item"><!--begin:Menu link-->
        <a class="menu-link {{in_array($currentUrl, $pro_certificate) ? 'active' : '' }}" href="{{route('admin.provisional.certificates.index')}}">
            <span class="menu-icon">
                <i class="ki-duotone ki-user fs-2">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </span>
            <span class="menu-title">Provisional Certificates</span>
        </a>
    </div>
    @endif
    @if (permission('permisssions'))
    <div class="menu-item">
        <a class="menu-link {{in_array($currentUrl, $permisions_route) ? 'active' : '' }}" href="{{route('admin.permissions.index')}}">
            <span class="menu-icon">
                <i class="ki-duotone ki-user fs-2">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </span>
            <span class="menu-title">Permissions</span>
        </a>
    </div>
    @endif
    @if (permission('roles'))
    <div class="menu-item">
        <a class="menu-link {{in_array($currentUrl, $approver_roles) ? 'active' : '' }}" href="{{route('admin.approver.roles.index')}}">
            <span class="menu-icon">
                <i class="ki-duotone ki-user fs-2">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </span>
            <span class="menu-title">Approver Roles</span>
        </a>
    </div>
    @endif
    @if (permission('roles'))
    <div class="menu-item"><!--begin:Menu link-->
        <a class="menu-link {{in_array($currentUrl, $roles_route) ? 'active' : '' }}" href="{{route('admin.roles.index')}}">
            <span class="menu-icon">
                <i class="ki-duotone ki-user fs-2">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </span>
            <span class="menu-title">Roles</span>
        </a>
    </div>
    @endif
    @if(permission('degree.manage'))
    <div class="menu-item">
        <a class="menu-link {{in_array($currentUrl, $degree_route) ? 'active' : '' }}" href="{{route('admin.degree.index')}}">
            <span class="menu-icon">
                <i class="ki-duotone ki-user fs-2">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </span>
            <span class="menu-title">Degree Manage</span>
        </a><!--end:Menu link-->
    </div>
    @endif
    @if(permission('programs.manage'))
    <div class="menu-item">
        <a class="menu-link {{in_array($currentUrl, $programs_route) ? 'active' : '' }}" href="{{route('admin.programs.index')}}">
            <span class="menu-icon">
                <i class="ki-duotone ki-user fs-2">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </span>
            <span class="menu-title">Programs Manage</span>
        </a><!--end:Menu link-->
    </div>
    @endif
    @if(permission('settings'))
    <div class="menu-item">
        <a class="menu-link {{in_array($currentUrl, $settings_route) ? 'active' : '' }}" href="{{route('admin.settings.index')}}">
            <span class="menu-icon">
                <i class="ki-duotone ki-user fs-2">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </span>
            <span class="menu-title">Settings</span>
        </a>
    </div>
    @endif
    @if(permission('student.help'))
    <div class="menu-item">
        <a class="menu-link {{in_array($currentUrl, ['admin.help.index']) ? 'active' : '' }}" href="{{route('admin.help.index')}}">
            <span class="menu-icon">
                <i class="ki-duotone ki-user fs-2">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
            </span>
            <span class="menu-title">Student Help/Complaints</span>
        </a>
    </div>
    @endif
</div>
