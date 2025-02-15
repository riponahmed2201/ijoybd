<link rel="canonical" href="https://ijoybd.com" />

<!-- Favicon and Touch Icons  -->
<link rel="shortcut icon" href="{{ asset('assets/logo/logo icone-01.png') }}">
<link rel="apple-touch-icon-precomposed" href="{{ asset('assets/logo/logo icone-01.png') }}">

<!--begin::Fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
<!--end::Fonts-->

<!--begin::Page Vendor Stylesheets(used by this page)-->
<link href="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
    type="text/css" />
<!--end::Page Vendor Stylesheets-->

<!--begin::Global Stylesheets Bundle(used by all pages)-->
<link href="{{ asset('assets/backend/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/backend/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
<!--end::Global Stylesheets Bundle-->

<!-- IziToast CSS-->
<link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">

@stack('page_css')
