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
        Tambah Data Mata Pelajaran
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li >Data Mata Pelajaran</li>
        <li class="active">Tambah Data Mata Pelajaran</li>
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
                    {!! Form::open(['url' => '/mapel/store']) !!}
                    {{ Form::label('nama_mapel', 'Nama Mata Pelajaran', ['class' => 'control-label']) }}
                    {{ Form::text('nama_mapel', '', array_merge(['class' => 'form-control','id' => 'nama_mapel'])) }} <br>
                    {{ Form::submit('Tambah', ['class' => 'btn btn-success pull-right']) }}
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