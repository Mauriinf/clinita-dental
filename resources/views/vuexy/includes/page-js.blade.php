<!-- BEGIN: Vendor JS-->
<script src="{!! asset('app-assets/vendors/js/vendors.min.js') !!}"></script>
<!-- END: Vendor JS-->
<!-- BEGIN: Page Vendor JS-->
@stack('scripts-vendor')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{!! asset('app-assets/js/core/app-menu.js') !!}"></script>
<script src="{!! asset('app-assets/js/core/app.js') !!}"></script>
<!-- END: Theme JS-->
<!-- BEGIN: Page JS-->
@stack('scripts-page')
<!-- END: Page JS-->
<script>
	var URL_BASE = "{{URL("/")}}";
    $(window).on('load', function() {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
