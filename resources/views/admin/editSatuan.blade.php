@extends("template.adminTemplate")
@section("title", "Edit Satuan")
@section("content")
<div hidden>{{$countStok}}</div>

    <form style="padding: 2%" method="POST">
        @csrf
        <div class="form-group">
            <label>Kode Satuan</label>
            <input type="text" class="form-control" name="kode_satuan" value="{{ $listSatuan->kode_satuan }}" readonly class="form-control-plaintext">
        </div>
        <div class="form-group">
            <label>Nama Satuan</label>
            <input type="text" class="form-control" name="nama_satuan" value="{{ $listSatuan->nama_satuan }}">
        </div>
        <div class="form-group">
            <button type="submit" class="form-control btn btn-success">Edit Satuan</button>
        </div>
  </form>
@endsection
