<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../../">
    <title>Login - ijoybd</title>
    <meta charset="utf-8" />
    <meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted " />
    <meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Sajektourism - ijoybd is travel agency app" />
    <meta property="og:url" content="https://sajektourism.com/" />
    <meta property="og:site_name" content="Sajek | Tourism" />

    <link rel="canonical" href="https://sajektourism.com/" />
    <link rel="shortcut icon" href="{{ asset('assets/logo/favicon.ico') }}" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->

    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('assets/backend/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/backend/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="bg-body">
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
            style="background-image: url(assets/backend/media/illustrations/sketchy-1/14.png)">
            <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">

                <a href="/login" class="mb-12">
                    Ijoybd
                    {{-- <img alt="Logo" src="{{ asset('assets/logo/logo.svg') }}" class="h-40px" /> --}}
                </a>

                <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">

                    <form class="form w-100" novalidate="novalidate" action="{{ route('login') }}" method="POST">

                        @csrf

                        <div class="text-center mb-10">
                            <h1 class="text-dark mb-3">Sign In to ijoybd</h1>
                        </div>

                        <div class="fv-row mb-5">
                            <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                            <input class="form-control form-control-solid @error('email') is-invalid @enderror"
                                type="text" name="email" autocomplete="off" placeholder="Enter email"
                                value="{{ old('email') }}" />
                            @error('email')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="fv-row mb-10">
                            <label class="form-label fs-6 fw-bolder text-dark">Password</label>
                            <input class="form-control form-control-solid @error('password') is-invalid @enderror"
                                type="password" name="password" autocomplete="off" placeholder="Enter password" />
                            @error('password')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="text-center">
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                <span class="indicator-label">Continue</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>

    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('assets/backend/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('assets/backend/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->

    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ asset('assets/backend/js/custom/authentication/sign-in/general.js') }}"></script>
    <!--end::Page Custom Javascript-->

    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
