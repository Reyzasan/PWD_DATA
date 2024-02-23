@extends('layout')

@section('content')
<form>
    <div class="form-group">
      <label for="nis">NIS</label>
      <input type="text" name="nis" class="form-control" id="nis">
    </div>
    <div class="form-group">
      <label for="nama">Nama</label>
      <input type="text" name="nama" class="form-control" id="nama">
    </div>
    <div class="form-group">
      <label for="umur">Umur</label>
      <input type="number" name="umur" class="form-control" id="umur">
    </div>
    <div class="form-group">
      <label for="alamat">Alamat</label>
      <textarea name="alamat" class="form-control" id="alamat"></textarea>
    </div>
    <div class="form-group">
        <label for="alamat">Gender</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender1" value="pria" checked>
            <label class="form-check-label" for="gender1">
                Pria
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="gender2" value="wanita">
            <label class="form-check-label" for="gender2">
              Wanita
            </label>
          </div>
    </div>
    <div class="form-group">
      <label for="kelas">Kelas</label>
      <select class="form-control" name="kelas" id="kelas">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
    </div>

    <div class="form-group">
      <button type="button" id="btn-create" class="btn btn-success">Tambah Data</button>
    </div>
</form>

@endsection
@push('scripts')
<script>


$( document ).ready(function() {
  // Handler for .ready() called.
  $('#btn-create').click(() => {

      $.ajax({
          type: "POST",
          url: "{{ route('student.store') }}",
          data: {
              _token : "{{ csrf_token() }}",
              name : $('#nama').val(),
              nis : $('#nis').val(),
              umur : $('#umur').val(),
              alamat : $('#alamat').val(),
              gender : $('#gender1').checked ? "pria" : "wanita",
              class_id : $('#kelas').val(),
          },
          success : (res) => {
              console.log(res);
          },
          error: (err) => {
              console.log(err)
          }
      });

  })
});


</script>
@endpush
