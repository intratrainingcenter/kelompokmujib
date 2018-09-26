@extends('layout.layout')

@section('title')
    Data Kelas
@endsection

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Kelas
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Kelas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form Edit Kelas</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->

        {!!Form::open(['route' => ['kelas.update', $table->id], 'method' => 'patch', 'class' => 'box-body'])!!}
        <div class="form-group">
          {!! Form::label('kode_kelas', 'Kode Kelas')!!}
          {{Form::text('kode_kelas', $table->kode_kelas, array_merge(['class' => 'form-control', 'readonly']))}}
        </div>
        <div class="form-group">
          {!! Form::label('nama_kelas', 'Nama Kelas')!!}
          {{Form::text('nama_kelas', $table->nama_kelas, array_merge(['class' => 'form-control',]))}}
        </div>

        {{Form::submit('Simpan', ['class' => 'btn btn-primary pull-right'])}}
        {{link_to_route('kelas.index', $title = 'Batal', $parameters = [], $attributes = ['class' => 'btn btn-danger pull-left', 'style' => 'margin-right:10px'])}}
        {!!Form::close()!!}
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
