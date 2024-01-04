@extends("template.adminTemplate")
@section("title", "Edit Barang")
@section("content")
<div hidden>{{$countStok}}</div>

    <form style="padding: 2%" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Kode Barang</label>
            <input type="text" class="form-control" name="kode_barang" value="{{ $listBarang->kode_barang }}" readonly class="form-control-plaintext">
        </div>
        @error('nama_barang')
            <h5 class="text-danger">{{ $message }}</h5>
        @enderror

        <div class="form-group">
            <label>Nama Supplier</label>
            <input type="text" class="form-control" name="nama_supplier" value="{{ $listSupplier }}" readonly class="form-control-plaintext">
        </div>
        @error('nama_barang')
            <h5 class="text-danger">{{ $message }}</h5>
        @enderror

        {{-- <div class="form-group">
            <label>Nama Satuan</label>
            <input type="text" class="form-control" name="nama_satuan" value="{{ 1 }}" readonly class="form-control-plaintext">
        </div>
        @error('nama_barang')
            <h5 class="text-danger">{{ $message }}</h5>
        @enderror --}}

        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" class="form-control" name="nama_barang" value="{{ $listBarang->nama_barang }}">
        </div>
        @error('nama_barang')
            <h5 class="text-danger">{{ $message }}</h5>
        @enderror

        <div class="form-group">
            <label>Deskripsi barang</label>
            <textarea class="form-control" placeholder="{{ $listBarang->deskripsi_barang }}" name="desc" rows="10"></textarea>
        </div>
        @error('desc')
            <h5 class="text-danger">{{ $message }}</h5>
        @enderror

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label>Jumlah Barang</label>
                    <input type="number" class="form-control" name="jumlah_barang" value="{{ $listBarang->jumlah_barang }}">
                </div>
                @error('jumlah_barang')
                    <h5 class="text-danger">{{ $message }}</h5>
                @enderror

                <div class="col">
                    <label>Minimal Stok</label>
                    <input type="number" class="form-control" name="min_stok" value="{{ $listBarang->min_stok }}">
                </div>
                @error('min_stok')
                    <h5 class="text-danger">{{ $message }}</h5>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label>Harga Pokok</label>
                    <input type="number" class="form-control" name="harga_pokok" value="{{ $listBarang->harga_pokok }}">
                </div>
                @error('harga_pokok')
                    <h5 class="text-danger">{{ $message }}</h5>
                @enderror

                <div class="col">
                    <label>Harga Jual</label>
                    <input type="number" class="form-control" name="harga_jual" value="{{ $listBarang->harga_jual }}">
                </div>
                @error('harga_jual')
                    <h5 class="text-danger">{{ $message }}</h5>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label>Tanggal Expired</label>
                    <input type="date" class="form-control" name="tgl_exp" value="{{ $listBarang->tgl_exp }}">
                </div>
                @error('tgl_exp')
                    <h5 class="text-danger">{{ $message }}</h5>
                @enderror

                <div class="col">
                    <label>Diskon</label>
                    <input type="text" class="form-control" name="diskon" value="{{ $listBarang->diskon }}">
                </div>
                @error('diskon')
                    <h5 class="text-danger">{{ $message }}</h5>
                @enderror

                <div class="col">
                    <label>Upload Gambar Barang</label>
                    <input type="file" class="form-control" name="img">
                </div>
                @error('img')
                    <h5 class="text-danger">{{ $message }}</h5>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="form-control btn btn-success">Edit Barang</button>
        </div>
        <a href="{{ url("/admin/barang")}}" style="font-style: italic">Kembali ke List Barang</a>
  </form>
@endsection
