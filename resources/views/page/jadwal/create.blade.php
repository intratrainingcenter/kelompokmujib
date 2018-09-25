@extends('layout.layout')

@section('title')
    Tambah Jadwal Pelajaran
@endsection

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Jadwal Pelajaran
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li >Data Jadwal Pelajaran</li>
        <li class="active">Tambah Jadwal Pelajaran</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="form-group">
                  {!! Form::open(['route' => 'jadwal.store']) !!}
                  <div class="form-group">
                    {{ Form::label('kode_kelas', 'Kelas', ['class' => 'control-label']) }}
                    {{ Form::select('kode_kelas', $selectkelas, null, ['placeholder' => 'Pilih Kelas', 'id' => 'kode_kelas', 'class' => 'form-control', 'required' => true]) }}
                  </div>
                  <div class="form-group">
                    {{ Form::label('hari', 'Hari', ['class' => 'control-label']) }}
                    {{ Form::select('hari', ['Senin' => 'Senin', 'Selasa' => 'Selasa', 'Rabu' => 'Rabu', 'Kamis' => 'Kamis', 'Jum`at' => 'Jum`at', 'Sabtu' => 'Sabtu'], null, ['placeholder' => 'Pilih Hari', 'id' => 'hari', 'class' => 'form-control', 'required' => true]) }}
                  </div>
                  <div class="form-group">
                    {{ Form::label('kode_mapel', 'Mata Pelajaran', ['class' => 'control-label']) }}
                    {{ Form::select('kode_mapel', $selectmapel, null, ['placeholder' => 'Pilih Mata Pelajaran', 'id' => 'kode_mapel', 'class' => 'form-control', 'required' => true]) }}
                  </div>
                  {{ Form::submit('Simpan', ['class' => 'btn btn-primary pull-right']) }}
                  {{ link_to_route('jadwal.index', $title = 'Batal', $parameters = [], $attributes = ['class' => 'btn btn-danger pull-right', 'style' => 'margin-right:10px']) }}
                  {!! Form::close() !!}
                </div>
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