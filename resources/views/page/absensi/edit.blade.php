@extends('layout.layout')
@extends('page.absensi.additional')

@section('title')
    Edit Data Absensi
@endsection

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Data Absensi
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li >Data Absensi</li>
        <li class="active">Edit Data Absensi</li>
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
                  {!! Form::open(['route' => ['absensi.update', $data->id]]) !!}
                  <div class="form-group">
                    {{ Form::label('kode_kelas', 'Kelas', ['class' => 'control-label']) }}
                    {{ Form::select('kode_kelas', $selectkelas, null, ['placeholder' => 'Pilih Kelas', 'id' => 'kode_kelas', 'class' => 'form-control', 'required' => true]) }}
                  </div>
                  <div class="form-group">
                    {{ Form::label('nis', 'Nama Siswa', ['class' => 'control-label']) }}
                    {{ Form::select('nis', [$data->nis => $data->siswa->nama], $data->nis , ['placeholder' => 'Pilih Siswa', 'id' => 'nis', 'class' => 'form-control', 'required' => true]) }}
                  </div>
                  <div class="form-group">
                    {{ Form::label('Keterangan', '', ['class' => 'control-label']) }} <br>
                    <div class="col-md-12">
                        <div class="col-md-4">
                            <div class="col-md-2">
                                {{ Form::label('sakit','', ['class' => 'control-label']) }}
                            </div>
                            <div class="col-md-4">
                                {{ Form::number('sakit', $data->s , ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-2">
                                {{ Form::label('ijin','', ['class' => 'control-label']) }}
                            </div>
                            <div class="col-md-4">
                                {{ Form::number('ijin', $data->i, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-2">
                                {{ Form::label('alpa','', ['class' => 'control-label']) }}
                            </div>
                            <div class="col-md-4">
                                {{ Form::number('alpa', $data->a, ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
                  </div>
                  {{ Form::submit('Simpan', ['class' => 'btn btn-primary pull-right']) }}
                  {{ link_to_route('absensi.index', $title = 'Batal', $parameters = [], $attributes = ['class' => 'btn btn-danger pull-right', 'style' => 'margin-right:10px']) }}
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