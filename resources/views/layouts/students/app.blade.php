@php
    use Illuminate\Support\Facades\Request;
    use Illuminate\Support\Facades\Route;
    $currentUrl = Route::currentRouteName();

    $user = Auth::user();
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/custom/vis-timeline/vis-timeline.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <script>
        if (window.top != window.self) {
            window.top.location.replace(window.self.location.href);
        }
    </script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script>

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

<body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true"
    data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
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

    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page  flex-column flex-column-fluid " id="kt_app_page">

            <div id="kt_app_header" class="app-header " data-kt-sticky="true"
                data-kt-sticky-activate="{default: true, lg: true}" data-kt-sticky-name="app-header-minimize"
                data-kt-sticky-offset="{default: '200px', lg: '0'}" data-kt-sticky-animation="false">

                <div class="app-container  container-fluid d-flex align-items-stretch justify-content-between "
                    id="kt_app_header_container">

                    <div class="d-flex align-items-center d-lg-none ms-n3 me-1 me-md-2" title="Show sidebar menu">
                        <div class="btn btn-icon btn-active-color-primary w-35px h-35px"
                            id="kt_app_sidebar_mobile_toggle">
                            <i class="ki-duotone ki-abstract-14 fs-2 fs-md-1"><span class="path1"></span><span
                                    class="path2"></span></i>
                        </div>
                    </div>
                    <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                        <a href="../index-2.html" class="d-lg-none">
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
                                <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px"
                                    data-kt-menu="true" id="kt_menu_notifications">
                                    <div class="d-flex flex-column bgi-no-repeat rounded-top"
                                        style="background-image:url({{asset('assets/media/misc/menu-header-bg.jpg')}})">
                                        <h3 class="text-white fw-semibold px-9 mt-10 mb-6">
                                            Notifications <span class="fs-8 opacity-75  badge-circle badge badge-danger">{{getStudentNotifications()->count()}}</span>
                                        </h3>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="kt_topbar_notifications_1" role="tabpanel">
                                            @include('students.notifications.notifications')
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
                                </div>

                            </div>
                            <div class="app-navbar-item ms-1 ms-md-4" id="kt_header_user_menu_toggle">
                                <div class="cursor-pointer symbol symbol-35px"
                                    data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                                    data-kt-menu-placement="bottom-end">
                                    <img src="{{getImage('users', $user->avatar)}}" class="rounded-3" alt="user" />
                                </div>
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                                    data-kt-menu="true">
                                    <div class="menu-item px-3">
                                        <div class="menu-content d-flex align-items-center px-3">
                                            <div class="symbol symbol-50px me-5">
                                                <img alt="Logo" src="{{getImage('users', $user->avatar)}}" />
                                            </div>
                                            <div class="d-flex flex-column">
                                                <div class="fw-bold d-flex align-items-center fs-5">
                                                    {{$user->name}} <span
                                                        class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">Student</span>
                                                </div>

                                                @if ($user->email)
                                                <a href="mail:{{$user->email}}" class="fw-semibold text-muted text-hover-primary fs-7">
                                                    {{$user->email}} </a>

                                                @endif
                                                @if ($user->phone)
                                                <a href="tel:{{$user->phone}}" class="fw-semibold text-muted text-hover-primary fs-7">
                                                    {{$user->phone}} </a>

                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="menu-item px-5">
                                        <a href="{{route('students.dashboard')}}" class="menu-link px-5">
                                            My Profile
                                        </a>
                                    </div>
                                    <div class="menu-item px-5">
                                        <a href="{{ route('students.notifications', $user->id)}}" class="menu-link px-5">
                                            <span class="menu-text">Notifications</span>
                                            <span class="menu-badge">
                                                <span
                                                    class="badge badge-light-danger badge-circle fw-bold fs-7">{{ $user->notifications->count() }}</span>
                                            </span>
                                        </a>
                                    </div>
                                    <div class="menu-item px-5 my-1">
                                        <a href="{{ route('students.profile.security', $user->id)}}" class="menu-link px-5">
                                            Account Security
                                        </a>
                                    </div>
                                    <div class="menu-item px-5 my-1">
                                        <a href="{{ route('students.profile.settings', $user->id)}}" class="menu-link px-5">
                                            Account Settings
                                        </a>
                                    </div>
                                    <div class="menu-item px-5">
                                        <a href="{{route('student.logout')}}"
                                            class="menu-link px-5">
                                            Sign Out
                                        </a>
                                    </div>
                                </div>
                            </div>
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
                <div id="kt_app_sidebar" class="app-sidebar  flex-column " data-kt-drawer="true"
                    data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}"
                    data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start"
                    data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
                    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
                        <a href="{{route('students.dashboard')}}">
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
                        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
                            <div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-3" data-kt-scroll="true"
                                data-kt-scroll-activate="true" data-kt-scroll-height="auto"
                                data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                                data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px"
                                data-kt-scroll-save-state="true">
                                @include('students.layout.sidebar')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="app-main flex-column flex-row-fluid " id="kt_app_main">
                    @yield('content')
                    <div id="kt_app_footer" class="app-footer ">
                        <div
                            class="app-container  container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3 ">
                            <div class="text-gray-900 order-2 order-md-1">
                                <span class="text-muted fw-semibold me-1">2024&copy;</span>
                                <a href="" target="_blank"
                                    class="text-gray-800 text-hover-primary">Soft It Security</a>
                            </div>
                            <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                                <li class="menu-item"><a href="https://www.pstu.ac.bd" target="_blank"
                                        class="menu-link px-2">About</a></li>

                                <li class="menu-item"><a href="{{route('students.help.create')}}" target="_blank"
                                        class="menu-link px-2">Support</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.admin.js')
    <div class="modal fade" id="editModal" tabindex="-1" aria-modal="true" role="dialog">

    </div>
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
                Swal.fire('Failed!', res.msg, 'error');
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
                Swal.fire('Failed!', res.msg, 'error');
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
                Swal.fire('Faild!', res.msg, 'error');
                submitButton.removeAttr('data-kt-indicator');
            }
        },
        error: function(response) {
            $.each(response.responseJSON.errors,function(field_name,error){
                 $(document).find('[name='+field_name+']').after('<p style="color:red" class="failed">' +error+ '</p>')
                Swal.fire('Failed!', error[0], 'error');
            })
            submitButton.removeAttr('data-kt-indicator');
        }
    });

    function showToast(icon, title, type) {
        Swal.fire(type, title, icon);
    }
});
$(document).ready(function () {
    $('.delete_form').on('submit', function(e){
        e.preventDefault();
        Swal.fire({
        title: 'Are you sure?',
        text: "You Want To Delete This!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            var link = $(this).attr('action');
            $.ajax({
                    url: link,
                    type: 'DELETE',
                    data: $(this).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if(response.status == true){
                            Swal.fire('Deleted!', response.msg, 'success');
                            window.location.reload();
                        }else{
                            Swal.fire('Faild!', response.msg, 'error');
                        }
                        // Perform any additional actions on success
                    },
                    error: function(xhr) {
                        Swal.fire('Error!', xhr.responseJSON.msg, 'error');
                        // Perform any additional error handling
                    }
                });

        }
        })
    })

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
