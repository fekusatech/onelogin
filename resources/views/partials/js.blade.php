<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('dist/js/adminlte.min.js?v=3.2.0')}}"></script>
<script src="{{url('dist/js/adminlte.min.js?v=3.2.0')}}"></script>
<script src="{{url('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{url('plugins/toastr/toastr.min.js')}}"></script>
<script src="{{url('dist/js/pages/app.js')}}"></script>
<script src="{{url('plugins/toastr/toastr.min.js')}}"></script>


<script src="{{url('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{url('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{url('plugins/editable/editable.js')}}"></script>
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
<?php if (isset($unitlist)) { ?>
    <script>
        $(function() {
            $("#example2").DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true
            });
        });
        $.fn.editable.defaults.mode = 'inline';
        $('.status').editable({
            source: [{
                    value: "ban",
                    text: "BAN"
                },
                {
                    value: "unban",
                    text: "UN-BAN"
                }
            ]
        });
        $('.email').editable();
        $('.password').editable();
        $('.firstname').editable({
            validate: function(value) {
                if ($.trim(value) == '') return 'This field is required';
            }
        });
        $('.unitlist').editable({
            pk: 'unit',
            source: [
                <?php
                $count = 1;
                $totalmax = count($unitlist);
                foreach ($unitlist as $unitlists) {
                    echo "{value: " . $unitlists->id . ", text: '" . $unitlists->nama . "'}";
                    if ($count++ < $totalmax) {
                        echo ",";
                    }
                } ?>
            ]
        });
        $('.rolelist').editable({
            pk: 'role',
            showbuttons: false,
            source: [
                <?php
                $count = 1;
                $totalmax = count($rolelist);
                foreach ($rolelist as $rolelists) {
                    echo "{value: " . $rolelists->id . ", text: '" . $rolelists->role_nm . "'}";
                    if ($count++ < $totalmax) {
                        echo ",";
                    }
                } ?>
            ]
        });
    </script>
<?php } ?>