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
        Edit Data Mata Pelajaran
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li >Data Mata Pelajaran</li>
        <li class="active">Edit Data Mata Pelajaran</li>
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
                {!! Form::open(['route' => ['mapel.update', $data->id], 'method' => 'patch']) !!}
                <div class="form-group">
                  {{ Form::label('kode_mapel', 'Kode Mata Pelajaran', ['class' => 'control-label']) }}
                  {{ Form::text('kode_mapel', $data->kode_mapel, ['class' => 'form-control','id' => 'kode_mapel', 'readonly' => true]) }}
                </div>
                <div class="form-group">
                  {{ Form::label('nama_mapel', 'Nama Mata Pelajaran', ['class' => 'control-label']) }}
                  {{ Form::text('nama_mapel', $data->nama_mapel, ['class' => 'form-control','id' => 'nama_mapel', 'required' => true]) }}
                </div>
                {{ Form::submit('Simpan', ['class' => 'btn btn-primary pull-right']) }}
                {{ link_to_route('mapel.index', $title = 'Batal', $parameters = [], $attributes = ['class' => 'btn btn-danger pull-right', 'style' => 'margin-right:10px']) }}
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