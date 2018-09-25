@extends('layout.layout')

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
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form Input Siswa</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        {!!Form::open(['route' => 'siswa.store', 'class' => 'box-body'])!!}
        <div class="form-group">
          {!! Form::label('nama', 'Nama Siswa')!!}
          {{Form::text('nama', '', array_merge(['class' => 'form-control', 'required', 'placeholder' => 'Nama Siswa']))}}
        </div>
        <div class="form-group">
          {{Form::label('jenis_kelamin', 'Jenis Kelamin')}}
          {{Form::select('jenis_kelamin', ['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'], null, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
          {{Form::label('kelas', 'Kelas')}}
          {{Form::select('kelas', ['P1' => 'Opsi 1', 'P2' => 'Opsi 2'], null, ['class' => 'form-control'])}}
        </div>

        {{Form::submit('Simpan', ['class' => 'btn btn-primary pull-right'])}}
        {{link_to_route('siswa.index', $title = 'Batal', $parameters = [], $attributes = ['class' => 'btn btn-danger pull-left', 'style' => 'margin-right:10px'])}}
        {!!Form::close()!!}
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
