@section('header')   
<meta name="_token" content="{{ csrf_token() }}"/>
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('template/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('footer')
<!-- DataTables -->
<script src="{{asset('template/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('template/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script>
    $(document).ready(function(){

    // DATATABLE
        $("#example1").DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        });

    // ALERT NOTIF
        setTimeout(function(){ $('.notifberhasil').hide(1000); }, 3000);
        setTimeout(function(){ $('.notifgagal').hide(1000); }, 3000);
        
    // SHOW DATA SISWA ON CHANGE
        $("#kode_kelas").change(function(){
            let code = $("#kode_kelas").val();
            let result = '';
            if (code == '') {
                $("#nis").prop('disabled', true);
                $("#hari").prop('disabled', true);
            } else {
                $("#nis").prop('disabled', false);
                $("#hari").prop('disabled', false);
                console.log(code);
                
			$.getJSON('/piket/' + code, function(data){
				$.each(data, function(index, obj){
                    // console.log(data);
                    result += "<option value=" + obj.nis + ">"
                                + obj.nama + "</option>";
				})
                $("#nis").html("<option value=''>Pilih Siswa</option>" + result);
			});
                
            }
        })
    })
    </script>
@endsection