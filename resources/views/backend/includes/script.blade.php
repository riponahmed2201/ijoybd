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

<!-- IziToast Js-->
<script src="{{ asset('js/iziToast.js') }}"></script>

<!-- CKEditor Js-->
<script src="{{ asset('assets/backend/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}" />

<script>
    // logout.js
    document.addEventListener("DOMContentLoaded", function() {
        const logoutLink = document.getElementById("logout-link");
        const logoutForm = document.getElementById("logout-form");

        if (logoutLink && logoutForm) {
            logoutLink.addEventListener("click", function(event) {
                event.preventDefault();
                logoutForm.submit();
            });
        }
    });
</script>

@stack('page_js')
