@php
    use Illuminate\Support\Facades\Request;
    use Illuminate\Support\Facades\Route;
    $currentUrl = Route::currentRouteName();
    $user = Auth::guard('admin')->user();
@endphp
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>Student Portal | Potuakhali Science and Technology University</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Metronic - The World's #1 Selling Bootstrap Admin Template by KeenThemes" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <link rel="shortcut icon" href="../assets/media/logos/favicon.ico" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" /> <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
        if (window.top != window.self) {
            window.top.location.replace(window.self.location.href);
        }
    </script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>

      // Enable pusher logging - don't include this in production
      Pusher.logToConsole = true;

      var pusher = new Pusher('3ceaae7cbaecf94950f1', {
        cluster: 'ap2'
      });

      var channel = pusher.subscribe('my-channel');
      channel.bind('my-event', function(data) {
        alert(JSON.stringify(data));
      });
    </script>
</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
    <!--begin::Theme mode setup on page load-->
    <script>
        var defaultThemeMode = "light";
        var themeMode;

        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }

            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }

            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>

    <!--begin::App-->
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <!--begin::Page-->
        <div class="app-page  flex-column flex-column-fluid " id="kt_app_page">


            <!--begin::Header-->
            <div id="kt_app_header" class="app-header " data-kt-sticky="true"
                data-kt-sticky-activate="{default: true, lg: true}" data-kt-sticky-name="app-header-minimize"
                data-kt-sticky-offset="{default: '200px', lg: '0'}" data-kt-sticky-animation="false">

                <!--begin::Header container-->
                <div class="app-container  container-fluid d-flex align-items-stretch justify-content-between "
                    id="kt_app_header_container">

                    <!--begin::Sidebar mobile toggle-->
                    <div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
                        <div class="btn btn-icon btn-active-color-primary w-35px h-35px"
                            id="kt_app_sidebar_mobile_toggle">
                            <i class="ki-duotone ki-abstract-14 fs-2 fs-md-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                    </div>
                    <!--end::Sidebar mobile toggle-->


                    <!--begin::Mobile logo-->
                    <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                        <a href="{{route('admin.dashboard')}}" class="d-lg-none">
                            <img alt="Logo" src="{{getImage('settings', getSetting('logo'))}}" class="h-30px" />
                        </a>
                    </div>
                    <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1"
                        id="kt_app_header_wrapper">
                        <div class="
                                app-header-menu
                                app-header-mobile-drawer
                                align-items-stretch
                            " data-kt-drawer="true" data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
                            data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="end"
                            data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
                            data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
                            data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                        </div>
                        <div class="app-navbar flex-shrink-0">
                            <div class="app-navbar-item ms-1 ms-md-4">
                                <div class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px"
                                    data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                                    data-kt-menu-placement="bottom-end" id="kt_menu_item_wow">
                                    <i class="ki-duotone ki-notification-status fs-2"><span class="path1"></span><span
                                            class="path2"></span><span class="path3"></span><span
                                            class="path4"></span></i>
                                </div>

                                <!--begin::Menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px"
                                    data-kt-menu="true" id="kt_menu_notifications">
                                    <!--begin::Heading-->
                                    <div class="d-flex flex-column bgi-no-repeat rounded-top"
                                        style="background-image:url('{{asset('assets/media/misc/menu-header-bg.jpg')}}')">
                                        <!--begin::Title-->
                                        <h3 class="text-white fw-semibold px-9 mt-10 mb-6">
                                            Notifications <span class="fs-8 opacity-75  badge-circle badge badge-danger">{{getNotifications()->count()}}</span>
                                        </h3>
                                    </div>

                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="kt_topbar_notifications_1" role="tabpanel">
                                            @include('admin.notifications.notifications')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="app-navbar-item ms-1 ms-md-4">
                                <a href="#"
                                    class="btn btn-icon btn-custom btn-icon-muted btn-active-light btn-active-color-primary w-35px h-35px"
                                    data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent"
                                    data-kt-menu-placement="bottom-end">
                                    <i class="ki-duotone ki-night-day theme-light-show fs-1"><span class="path1"></span><span class="path2"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span></i> <i class="ki-duotone ki-moon theme-dark-show fs-1"><span class="path1"></span><span class="path2"></span></i></a>
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px"
                                    data-kt-menu="true" data-kt-element="theme-mode-menu">
                                    <div class="menu-item px-3 my-0">
                                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                            data-kt-value="light">
                                            <span class="menu-icon" data-kt-element="icon">
                                                <i class="ki-duotone ki-night-day fs-2"><span class="path1"></span><span
                                                        class="path2"></span><span class="path3"></span><span
                                                        class="path4"></span><span class="path5"></span><span
                                                        class="path6"></span><span class="path7"></span><span
                                                        class="path8"></span><span class="path9"></span><span
                                                        class="path10"></span></i> </span>
                                            <span class="menu-title">
                                                Light
                                            </span>
                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3 my-0">
                                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                            data-kt-value="dark">
                                            <span class="menu-icon" data-kt-element="icon">
                                                <i class="ki-duotone ki-moon fs-2"><span class="path1"></span><span
                                                        class="path2"></span></i> </span>
                                            <span class="menu-title">
                                                Dark
                                            </span>
                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3 my-0">
                                        <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                            data-kt-value="system">
                                            <span class="menu-icon" data-kt-element="icon">
                                                <i class="ki-duotone ki-screen fs-2"><span class="path1"></span><span
                                                        class="path2"></span><span class="path3"></span><span
                                                        class="path4"></span></i> </span>
                                            <span class="menu-title">
                                                System
                                            </span>
                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::Menu-->

                            </div>
                            <!--end::Theme mode-->

                            <!--begin::User menu-->
                            <div class="app-navbar-item ms-1 ms-md-4" id="kt_header_user_menu_toggle">
                                <!--begin::Menu wrapper-->
                                <div class="cursor-pointer symbol symbol-35px"
                                    data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                                    data-kt-menu-placement="bottom-end">
                                    <img src="{{ getImage('admins', $user->image) }}" class="rounded-3" alt="user" />
                                </div>

                                <!--begin::User account menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content d-flex align-items-center px-3">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-50px me-5">
                                                <img alt="Logo" src="{{ getImage('admins', $user->image) }}" />
                                            </div>
                                            <div class="d-flex flex-column">
                                                <div class="fw-bold d-flex align-items-center fs-5">
                                                    {{$user->name}} <span
                                                        class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">{{$user->roles->first()->name}}</span>
                                                </div>
                                                <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">
                                                    {{$user->email}}  </a>
                                            </div>
                                            <!--end::Username-->
                                        </div>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu separator-->
                                    <div class="separator my-2"></div>
                                    <!--end::Menu separator-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="" class="menu-link px-5">
                                            My Profile
                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="" class="menu-link px-5">
                                            <span class="menu-text">My Projects</span>
                                            <span class="menu-badge">
                                                <span
                                                    class="badge badge-light-danger badge-circle fw-bold fs-7">3</span>
                                            </span>
                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->

                                    <!--begin::Menu separator-->
                                    <div class="separator my-2"></div>
                                    <!--end::Menu separator-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5 my-1">
                                        <a href="../account/settings.html" class="menu-link px-5">
                                            Account Settings
                                        </a>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="{{route('admin.logout')}}"
                                            class="menu-link px-5">
                                            Sign Out
                                        </a>
                                    </div>
                                    <!--end::Menu item-->
                                </div>
                                <!--end::User account menu-->

                                <!--end::Menu wrapper-->
                            </div>
                            <!--end::User menu-->

                            <!--begin::Header menu toggle-->
                            <div class="app-navbar-item d-lg-none ms-2 me-n2" title="Show header menu">
                                <div class="btn btn-flex btn-icon btn-active-color-primary w-30px h-30px"
                                    id="kt_app_header_menu_toggle">
                                    <i class="ki-duotone ki-element-4 fs-1"><span class="path1"></span><span
                                            class="path2"></span></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-wrapper  flex-column flex-row-fluid " id="kt_app_wrapper">
                <!--begin::Sidebar-->
                <div id="kt_app_sidebar" class="app-sidebar  flex-column " data-kt-drawer="true"
                    data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}"
                    data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start"
                    data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
                    <!--begin::Logo-->
                    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
                        <!--begin::Logo image-->
                        <a href="{{route('admin.dashboard')}}">
                            <img alt="Logo" src="{{getImage('settings', getSetting('logo'))}}"
                                class="h-25px app-sidebar-logo-default" />
                            <img alt="Logo" src="{{getImage('settings', getSetting('logo'))}}"
                                class="h-20px app-sidebar-logo-minimize" />
                        </a>
                        <div id="kt_app_sidebar_toggle"
                            class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary h-30px w-30px position-absolute top-50 start-100 translate-middle rotate "
                            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
                            data-kt-toggle-name="app-sidebar-minimize">
                            <i class="ki-duotone ki-black-left-line fs-3 rotate-180"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                    </div>
                    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
                        <!--begin::Menu wrapper-->
                        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
                            <!--begin::Scroll wrapper-->
                            <div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-3" data-kt-scroll="true"
                                data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                                data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                                data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
                                data-kt-scroll-save-state="true">
                                <!--begin::Menu-->
                                @include('admin.layout.sidebar')
                                <!--end::Menu-->
                            </div>
                            <!--end::Scroll wrapper-->
                        </div>
                        <!--end::Menu wrapper-->
                    </div>
                    <!--end::sidebar menu-->
                    <!--end::Footer-->
                </div>
                <!--end::Sidebar-->

                <div class="modal fade" id="editModal" tabindex="-1" aria-modal="true" role="dialog">



                </div>

                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid " id="kt_app_main">
                    <!--begin::Content wrapper-->
                    @yield('content')
                    <!--end::Content wrapper-->
                    <!--begin::Footer-->
                    <div id="kt_app_footer" class="app-footer ">
                        <!--begin::Footer container-->
                        <div
                            class="app-container  container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3 ">
                            <!--begin::Copyright-->
                            <div class="text-gray-900 order-2 order-md-1">
                                <span class="text-muted fw-semibold me-1">2024&copy;</span>
                                <a href="" target="_blank"
                                    class="text-gray-800 text-hover-primary">Soft It Security</a>
                            </div>
                            <!--end::Copyright-->
                            <!--begin::Menu-->
                            <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                                <li class="menu-item"><a href="" target="_blank"
                                        class="menu-link px-2">About</a></li>

                                <li class="menu-item"><a href="" target="_blank"
                                        class="menu-link px-2">Support</a></li>
                            </ul>
                            <!--end::Menu-->
                        </div>
                        <!--end::Footer container-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end:::Main-->


            </div>
            <!--end::Wrapper-->


        </div>
        <!--end::Page-->
    </div>

    @include('layouts.admin.js')
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
    @stack('script')

    <script>
    $(document).on('submit', 'form#ajax_form', function(event) {
    event.preventDefault();

    $('p.textdanger').text('');
    $('p.failed').text('');

    var url = $(this).attr('action');
    var method = $(this).attr('method');
    var formData = new FormData($(this)[0]);
    var submitButton = $(this).find('.submit');
    submitButton.attr('data-kt-indicator', 'on');

    $.ajax({
        type: method,
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        success: function(res) {
            if (res.status === true) {
                var message = res.msg;
                Swal.fire('Success!', message, 'success');
                $(event.target).trigger('reset');
                submitButton.removeAttr('data-kt-indicator');
                if (res.url) {
                    setTimeout(function() {
                        window.location.href = res.url;
                    }, 2000);
                } else {
                    window.location.reload();
                }
            } else if (res.status === false) {
                Swal.fire('Fails!', res.msg, 'error');
                submitButton.removeAttr('data-kt-indicator');
            }
        },
        error: function(response) {
            $.each(response.responseJSON.errors,function(field_name,error){
                 $(document).find('[name='+field_name+']').after('<p style="color:red" class="failed">' +error+ '</p>')
                showToast('error', 'Server error occurred. Please try again later.', 'Failed!');
                Swal.fire('Failed!', error, 'error');
             })
            submitButton.removeAttr('data-kt-indicator');
        }
    });

    function showToast(icon, title, type) {
        Swal.fire(type, title, icon);
    }
});
$(document).on('submit', 'form#ajax_form2', function(event) {
    event.preventDefault();
    $('p.text-danger').text('');
    $('p.failed').text('');
    var url = $(this).attr('action');
    var method = $(this).attr('method');
    var formData = new FormData($(this)[0]);
    var submitButton = $(this).find('.submit');
    submitButton.attr('data-kt-indicator', 'on');
    $.ajax({
        type: method,
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        success: function(res) {
            if (res.status === true) {
                var message = res.msg;
                Swal.fire('Success!', message, 'success');
                $(event.target).trigger('reset');
                submitButton.removeAttr('data-kt-indicator');
                if (res.url) {
                    setTimeout(function() {
                        window.location.href = res.url;
                    }, 2000);
                } else {
                    window.location.reload();
                }
            } else if (res.status === false) {
                Swal.fire('Fails!', res.msg, 'error');
                submitButton.removeAttr('data-kt-indicator');
            }
        },
        error: function(response) {
            $.each(response.responseJSON.errors,function(field_name,error){
                 $(document).find('[name='+field_name+']').after('<p style="color:red" class="failed">' +error+ '</p>')
                showToast('error', 'Server error occurred. Please try again later.', 'Failed!');
                Swal.fire('Failed!', error, 'error');
             })
            submitButton.removeAttr('data-kt-indicator');
        }
    });

    function showToast(icon, title, type) {
        Swal.fire(type, title, icon);
    }
});
$(document).on('submit', 'form.ajax_form', function(event) {
    event.preventDefault();
    $('p.text-danger').text('');
    $('p.failed').text('');
    var url = $(this).attr('action');
    var method = $(this).attr('method');
    var formData = new FormData($(this)[0]);
    var submitButton = $(this).find('.submit');
    submitButton.attr('data-kt-indicator', 'on');
    $.ajax({
        type: method,
        url: url,
        data: formData,
        processData: false,
        contentType: false,
        success: function(res) {
            if (res.status === true) {
                var message = res.msg;
                Swal.fire('Success!', message, 'success');
                $(event.target).trigger('reset');
                submitButton.removeAttr('data-kt-indicator');
                if (res.url) {
                    setTimeout(function() {
                        window.location.href = res.url;
                    }, 2000);
                } else {
                    window.location.reload();
                }
            } else if (res.status === false) {
                Swal.fire('Fails!', res.msg, 'error');
                submitButton.removeAttr('data-kt-indicator');
            }
        },
        error: function(response) {
            $.each(response.responseJSON.errors,function(field_name,error){
                 $(document).find('[name='+field_name+']').after('<p style="color:red" class="failed">' +error+ '</p>')
                showToast('error', 'Server error occurred. Please try again later.', 'Failed!');
                Swal.fire('Failed!', error, 'error');
             })
            submitButton.removeAttr('data-kt-indicator');
        }
    });

    function showToast(icon, title, type) {
        Swal.fire(type, title, icon);
    }
});
$(document).ready(function() {
    $('.modal_btn').click(function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        $.ajax({
            url: url,
            type: 'GET',
            data: {},
            success: function(data) {
                $('#editModal').html(data.html).modal('show');
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});
    </script>
</body>
<!--end::Body-->
</html>
