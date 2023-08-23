<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('dist/js/adminlte.min.js?v=3.2.0')}}"></script>
<script src="{{url('dist/js/adminlte.min.js?v=3.2.0')}}"></script>
<script src="{{url('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{url('plugins/toastr/toastr.min.js')}}"></script>
<script src="{{url('dist/js/pages/app.js')}}"></script>
<script src="{{ url('plugins/toastr/toastr.min.js') }}"></script>
@if(session()->has('success'))
<script>
    toastr.success('{{ session("success") }}')
</script>
@endif

@if(session()->has('errormsg'))
<script>
    toastr.error('{{ session("loginError") }}')
</script>
@endif