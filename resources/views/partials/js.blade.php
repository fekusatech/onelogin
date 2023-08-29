<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('dist/js/adminlte.min.js?v=3.2.0')}}"></script>
<script src="{{url('dist/js/adminlte.min.js?v=3.2.0')}}"></script>
<script src="{{url('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{url('plugins/toastr/toastr.min.js')}}"></script>
<script src="{{url('dist/js/pages/app.js')}}"></script>


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
<script>
    function kirimotp(id) {
        var number = $("#numberphone").val();
        var oldnumber = $("#oldnumberphone").val();
        if (number == oldnumber) {
            toastr.error("Nomor ini sama dengan nomor sebelumnya")
            return false;
        }
        $.ajax({
            type: "POST",
            url: "/api/otprequest",
            data: {
                id: id,
                number: number,
                oldnumber: oldnumber
            },
            dataType: "JSON",
            success: function(response) {
                console.log(response);
                if (response.status) {
                    toastr.success('OTP Berhasil dikirim. Cek Whatsapp Anda');
                    startcountdown();
                } else {
                    if (response.msg.number !== undefined) {
                        toastr.error(response.msg.number)
                    } else {
                        toastr.error('Mohon menunggu selama ' + response.msg + " detik");
                        startcountdown(response.msg);
                    }
                }
            }
        });
    }

    function startcountdown(start) {
        var button = $("#buttonotp");
        var seconds;
        if (start == undefined || start == null) {
            seconds = 60;
        } else {
            seconds = start;
        } // Durasi countdown dalam detik
        button.prop("disabled", true); // Menonaktifkan tombol
        button.text(seconds + " detik");

        var countdownInterval = setInterval(function() {
            if (seconds <= 0) {
                button.text("Kirim OTP"); // Mengembalikan teks tombol
                button.prop("disabled", false); // Mengaktifkan tombol kembali
                clearInterval(countdownInterval); // Menghentikan countdown
            } else {
                button.text(seconds + " detik");
                seconds--;
            }
        }, 1000);
    }
</script>
@if(session()->has('success'))
<script>
    toastr.success('{{ session("success") }}')
</script>
@endif

@if(session()->has('error'))
<script>
    toastr.error('{{ session("error") }}')
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
            <?php foreach ($unitlist as $unitlists) {
                $id = str_replace(" ", "_", strtolower($unitlists->nama)); ?>
                $("#<?= $id ?>-table").DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true
                });
            <?php } ?>
            $("#user-table").DataTable({
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
        $('.number').editable();
        $('.password').editable();
        $('.firstname').editable({
            validate: function(value) {
                if ($.trim(value) == '') return 'This field is required';
            }
        });
        $('.unitlist').editable({
            <?= auth()->user()->role == 3 ? "disabled: true," : null ?>
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
        $('.unit_control').editable({
            <?= auth()->user()->role == 3 ? "disabled: true," : null ?>
            pk: 'unit_control',
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
            <?= auth()->user()->role == 3 ? "disabled: true," : null ?>
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