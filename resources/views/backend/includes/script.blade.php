<script>
    var hostUrl = "assets/";
</script>

<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('assets/backend/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/backend/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->

<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{ asset('assets/backend/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<!--end::Page Vendors Javascript-->

<!--begin::Page Custom Javascript(used by this page)-->
{{-- <script src="assets/backend/js/widgets.bundle.js"></script>
<script src="assets/backend/js/custom/widgets.js"></script>
<script src="assets/backend/js/custom/apps/chat/chat.js"></script>
<script src="assets/backend/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="assets/backend/js/custom/utilities/modals/create-app.js"></script>
<script src="assets/backend/js/custom/utilities/modals/users-search.js"></script> --}}
<!--end::Page Custom Javascript-->

<!-- IziToast Js-->
<script src="{{ asset('js/iziToast.js') }}"></script>

@stack('page_js')
