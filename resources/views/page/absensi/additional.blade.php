@section('header')   
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('template/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('footer')
<!-- DataTables -->
<script src="{{asset('template/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script>
    $(document).ready(function(){
        $("#example1").DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        });
        setTimeout(function(){ $('.notifberhasil').hide(1000); }, 3000);
        setTimeout(function(){ $('.notifgagal').hide(1000); }, 3000);

        // $("input[type='radio']").prop("disabled", true)

        $("#kode_kelas").change(function(){
            let code = $("#kode_kelas").val();
            let result = '';
            if (code == '') {
                $("#nis").val('');
                $("#nis").prop("disabled", true);
                $("input[type='radio']").prop("disabled", true);
            } else {
                $.ajax({
                    type: "GET",
                    url: "{{URL::route('absensi.show', ['param' => 'haha' ])}}",
                    data: {
                        code: code,
                    },
                    dataType: "JSON",
                    success: function (response) {
                        $.each(response, function(idx, val){
                            result += "<option value=" + val.nis + ">"
                                + val.nama + "</option>";
                        })
                        $("#nis").html("<option value=''>Pilih Siswa</option>" + result);
                        $("#nis").prop("disabled", false)
                        $("input[type='radio']").prop("disabled", false)
                    }
                });
            }
        })
        
    })
    </script>
@endsection