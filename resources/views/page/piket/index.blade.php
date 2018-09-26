@extends('layout.layout')
@extends('page.piket.additional')

@section('title')
    Data Piket
@endsection

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Piket
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Piket</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        @if (session('notifberhasil'))
        <div style="position: absolute; z-index: 999; right: -10px; " class="col-md-6 notifberhasil">
          <div class="notif alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{session('notifberhasil')}}
          </div>
        </div>
        @elseif(session('notifgagal'))
        <div style="position: absolute; z-index: 999; right: -10px; " class="col-md-6 notifberhasil">
          <div class="notif alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{session('notifgagal')}}
          </div>
        </div>
      @endif
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <a href="{{route('piket.create')}}" class="btn btn-success pull-right">Tambah</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <th width="100px">No</th>
                  <th width="150px">Kelas</th>
                  <th>Petugas Piket</th>
                  <th>Hari</th>
                  <th width="150px">Opsi</th>
                </thead>
                <tbody>
                  @foreach ($data as $item)
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$item->get_kelas->nama_kelas}}</td>
                    <td>{{$item->get_siswa->nama}}</td>
                    <td>{{$item->hari}}</td>
                    <td>
                      <a href="{{route('piket.edit', ['id' => $item->id])}}" class="btn btn-warning">Edit</a>
                      <button class="btn btn-danger" data-toggle="modal" data-target="#modaldel{{$item->id}}">Hapus</button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

    <!-- Modal -->
    @foreach ($data as $item)
    <div class="modal fade" id="modaldel{{$item->id}}" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Konfirmasi</h4>
          </div>
          <div class="modal-body">
            <p>And yakin ingin menhapus data piket?</p>
            <table class="table table-bordered table-striped">
              <thead>
                  <th>Kelas</th>
                  <th>Petugas Piket</th>
                  <th>Hari</th>
              </thead>
              <tbody>
                <tr>
                  <td>{{$item->get_kelas->nama_kelas}}</td>
                  <td>{{$item->get_siswa->nama}}</td>
                  <td>{{$item->hari}}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            {!! Form::open(['route' => ['piket.destroy', $item->id], 'method' => 'delete']) !!}
            {{ Form::button('Batal', ['class' => 'btn btn-default', 'data-dismiss' => 'modal']) }}
            {{ Form::submit('Hapus', ['class' => 'btn btn-danger pull-right']) }}
            {!! Form::close() !!}
          </div>
        </div>

      </div>
    </div>
    @endforeach

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection