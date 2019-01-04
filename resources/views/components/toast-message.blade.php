<script>
    $(document).ready(function() {

        @if(Session::has('success') || Session::has('info') || Session::has('warning') || $errors->any())
        toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": true,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        @endif

        @if(Session::has('success'))
            toastr.success("{{ Session::get('success') }}", "Success");
        @endif

        @if(Session::has('info'))
            toastr.info("{{ Session::get('info') }}", "Info");
        @endif

        @if(Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}", "Warning");
        @endif

        @if($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}", "Warning");
            @endforeach
        @endif

    });
</script>
