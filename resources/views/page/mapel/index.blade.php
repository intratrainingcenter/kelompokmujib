@extends('layout.layout')

@section('title')
    Data Mata Pelajaran
@endsection

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Mata Pelajaran
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Mata Pelajaran</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="{{route('mapel.create')}}" class="btn btn-success pull-right">Tambah</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <th width="100px">No</th>
                  <th>Nama</th>
                  <th width="150px">Opsi</th>
                </thead>
                <tbody>
                  {{-- @foreach ($data as $item)
                  <tr>
                    <td>{{1++}}</td>
                    <td>{{$item->nama_mapel}}</td>
                    <td>
                      <button class="btn btn-warning">Edit</button>
                      <button class="btn btn-danger">Hapus</button>
                    </td>
                  </tr>
                  @endforeach --}}
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection