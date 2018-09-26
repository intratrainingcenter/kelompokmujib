@extends('layout.layout')
@extends('page.siswa.additional')

@section('title')
    Data Siswa
@endsection

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Siswa
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Siswa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @if (session('notifberhasil'))
        <div style="position: absolute; z-index: 999; right: -10px; " class="col-md-6 notifberhasil">
          <div class="notif alert alert-success">
            {{session('notifberhasil')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
          </div>
        </div>
      @elseif (session('notifwarning'))
        <div style="position: absolute; z-index: 999; right: -10px; " class="col-md-6 notifwarning">
          <div class="notif alert alert-warning">
            {{session('notifwarning')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
          </div>
        </div>
      @endif
      <div class="box">
        <div class="box-header">
          <a href="{{route('siswa.create')}}" class="btn btn-success pull-right">Tambah</a>
          <h3 class="box-title">Table Data Siswa</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
              <th>No</th>
              <th>Nis</th>
              <th>Nama Siswa</th>
              <th>Jenis Kelamin</th>
              <th>Kelas</th>
              <th width="15%" >Opsi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($table as $data)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $data->nis }}</td>
              <td>{{ $data->nama }}</td>
              <td>{{ $data->jenis_kelamin }}</td>
              <td>{{ $data->get_kelas->nama_kelas }}</td>
              <td>
                <a href="{{route('siswa.edit',['id' => $data->id])}}" class="btn btn-warning">Edit</a>
                <button class="btn btn-danger" data-toggle="modal" data-target="#modaldel{{$data->id}}">Hapus</button>
              </td>
            </tr>
            @endforeach
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>

    </section>
    <!-- /.content -->

    <!-- modal -->
    @include('page.siswa.modals')

  </div>
  <!-- /.content-wrapper -->
@endsection
