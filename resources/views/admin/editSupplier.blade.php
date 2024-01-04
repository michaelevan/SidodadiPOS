@extends("template.adminTemplate")
@section("title", "Edit Supplier")
@section("content")
<div hidden>{{$countStok}}</div>

    <form style="padding: 2%" method="POST">
        @csrf
        <div class="form-group">
            <label>Kode Supplier</label>
            <input type="text" class="form-control" name="kode_Supplier" value="{{ $listSupplier->kode_Supplier }}" readonly class="form-control-plaintext">
        </div>
        <div class="form-group">
            <label>Nama Supplier</label>
            <input type="text" class="form-control" name="nama_supplier" value="{{ $listSupplier->nama_supplier }}">
        </div>
        <div class="form-group">
            <label>Alamat Supplier</label>
            <input type="text" class="form-control" name="alamat_supplier" value="{{ $listSupplier->alamat_supplier }}">
        </div>
        <div class="form-group">
            <label>Kota Asal</label>
            <input type="text" class="form-control" name="kota" value="{{ $listSupplier->kota }}">
        </div>
        <div class="form-group">
            <label>No Telepon</label>
            <input type="number" class="form-control" name="no_telp" value="{{ $listSupplier->no_telp }}">
        </div>
        <div class="form-group">
            <label>NPWP</label>
            <input type="number" class="form-control" name="NPWP" value="{{ $listSupplier->NPWP }}">
        </div>
        <div class="form-group">
            <label>Nama Bank</label>
            <input type="text" class="form-control" name="nama_bank" value="{{ $listSupplier->nama_bank }}">
        </div>
        <div class="form-group">
            <label>No Rekening</label>
            <input type="number" class="form-control" name="no_rekening" value="{{ $listSupplier->no_rekening }}">
        </div>
        <div class="form-group">
            <label>Nama Pajak</label>
            <input type="text" class="form-control" name="nama_pajak" value="{{ $listSupplier->nama_pajak }}">
        </div>
        <div class="form-group">
            <label>Alamat Pajak</label>
            <input type="text" class="form-control" name="alamat_pajak" value="{{ $listSupplier->alamat_pajak }}">
        </div>
        <div class="form-group">
            <button type="submit" class="form-control btn btn-success">Edit Supplier</button>
        </div>
  </form>
@endsection
