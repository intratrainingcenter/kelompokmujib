@foreach($table as $data)
<!-- modal-danger -->
<div class="modal modal-danger fade" id="modaldel{{$data->id}}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Danger</h4>
      </div>
      <div class="modal-body">
        <p>Anda yakin akan menghapus {{$data->nama_kelas}}</p>
      </div>
      <div class="modal-footer">
        {!! Form::open(['route' => ['kelas.destroy', $data->id], 'method' => 'delete']) !!}
        {{ Form::button('Batal', ['class' => 'btn btn-outline pull-left', 'data-dismiss' => 'modal']) }}
        {{ Form::submit('Hapus', ['class' => 'btn btn-outline']) }}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endforeach
