@php
    use Illuminate\Support\Facades\Request;
    use Illuminate\Support\Facades\Route;
    $currentUrl = Route::currentRouteName();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>Student Portal</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Metronic - The World's #1 Selling Bootstrap Admin Template by KeenThemes" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="Metronic by Keenthemes" />
    <link rel="canonical" href="sign-up.html" />
    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
        if (window.top != window.self) {
            window.top.location.replace(window.self.location.href);
        }
    </script>
</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center bgi-no-repeat">
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
    <!--begin::Root-->
    <div class="d-flex flex-column flex-column-fluid flex-lg-row" id="kt_app_root">
        <!--begin::Page bg image-->
        <style>
            body {
                background-image: url('{{ asset('assets/media/auth/bg4.jpg') }}');
            }

            [data-bs-theme="dark"] body {
                background-image: url('{{ asset('assets/media/auth/bg10-dark.jpg') }}');
            }
            img{
                max-width: 300px;
                width: 100%;
            }
        </style>
        <!--end::Page bg image-->

        <!--begin::Authentication - Sign-up -->
        @yield('content')
        <!--end::Authentication - Sign-up-->
    </div>
    <!--end::Root-->

    <!--begin::Javascript-->
    <script>
        var hostUrl = "{{route($currentUrl)}}";
    </script>
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
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
                    beforeSend: function(res){
                        submitButton.attr('data-kt-indicator', 'on');
                    },
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
                        console.log(response.responseJSON);
                        if(response.responseJSON && response.responseJSON.errors) {
                            $.each(response.responseJSON.errors,function(field_name,error){
                                $('[name='+field_name+']').after('<p style="color:red" class="failed">' +error+ '</p>');
                                Swal.fire('Failed!', error, 'error');
                            });
                        } else {
                            Swal.fire('Failed!', 'An error occurred while processing your request.', 'error');
                        }
                        submitButton.removeAttr('data-kt-indicator');
                    }
                });

                function showToast(icon, title, type) {
                    Swal.fire(type, title, icon);
                }
            });
    </script>
</body>
</html>
