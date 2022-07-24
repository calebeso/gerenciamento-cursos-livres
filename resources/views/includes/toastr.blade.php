@if(Session::has('success'))
<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "preventDuplicates": true
    }
    toastr.success("{{ session('success') }}", "Sucesso!");
</script>
@endif


@if(Session::has('error'))
<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "preventDuplicates": true
    }
    toastr.error("{{ session('error') }}", "Oooops!");
</script>
@endif

@if(Session::has('info'))
<script>
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "preventDuplicates": true
    }
    toastr.info("{{ session('info') }}");
</script>
@endif