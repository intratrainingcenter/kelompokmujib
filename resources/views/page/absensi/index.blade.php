@extends('layout.layout')
@extends('page.absensi.additional')

@section('title')
    Data Absen
@endsection

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Absen
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Absen</li>
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
                <a href="{{route('absensi.create')}}" class="btn btn-success pull-right">Tambah</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <th width="50px">No</th>
                  <th width="100px">NIS</th>
                  <th>Nama</th>
                  <th width="100px">Keterangan</th>
                  <th width="150px">Tanggal</th>
                  <th width="150px">Opsi</th>
                </thead>
                <tbody>
                  @foreach ($data as $item)
                  <tr>
                    <td>{{$no++}}.</td>
                    <td>{{$item->nis}}</td>
                    <td>{{$item->get_siswa->nama}}</td>
                    <td>{{$item->keterangan}}</td>
                    <td>{{date('d F Y',strtotime($item->created_at))}}</td>                    
                    <td>
                      <button class="btn btn-info" data-toggle="modal" data-target="#modaldetil{{$item->id}}">Detil</button>
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

    {{-- Modal Detil --}}
    <div class="modal fade" id="modaldetil{{$item->id}}" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Detil</h4>
          </div>
              <div class="form-group col-md-12">
                <div class="col-md-4">
                  <label>NIS</label>
                </div>
                <div class="col-md-8">
                  <p id="nis">{{$item->nis}}</p>
                </div>
              </div>
              <div class="form-group col-md-12">
                <div class="col-md-4">
                  <label>Nama</label>
                </div>
                <div class="col-md-8">
                  <p id="nama">{{$item->get_siswa->nama}}</p>
                </div>
              </div>
              <div class="form-group col-md-12">
                  <div class="col-md-4">
                    <label>Jenis Kelamin</label>
                  </div>
                  <div class="col-md-8">
                    <p id="jk">{{$item->get_siswa->jenis_kelamin}}</p>
                  </div>
              </div>
              <div class="form-group col-md-12">
                  <div class="col-md-4">
                    <label>Tanggal</label>
                  </div>
                  <div class="col-md-8">
                    <p id="tgl">{{date('d F Y', strtotime($item->created_at))}}</p>
                  </div>
              </div>
              <div class="form-group col-md-12">
                  <div class="col-md-4">
                    <label>Tidak Masuk Karena</label>
                  </div>
                  <div class="col-md-8">
                    <p id="ket">{{$item->keterangan}}</p>
                  </div>
              </div>
          <div class="modal-footer">
            <button class="btn btn-danger" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>

    {{-- Modal Delete --}}
    <div class="modal fade" id="modaldel{{$item->id}}" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Konfirmasi</h4>
          </div>
          <div class="modal-body">
            <p>And yakin ingin menghapus data absensi?</p>
            <table class="table table-bordered table-striped">
              <thead>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Keterangan</th>
                  <th>Tanggal</th>
              </thead>
              <tbody>
                <tr>
                  <td>{{$item->nis}}</td>
                  <td>{{$item->get_siswa->nama}}</td>
                  <td>{{$item->keterangan}}</td>
                  <td>{{date('d F Y',strtotime($item->created_at))}}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            {!! Form::open(['route' => ['absensi.destroy', $item->id], 'method' => 'delete']) !!}
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