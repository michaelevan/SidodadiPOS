@extends("template.pegawaiTemplate")
@section("title", "Barang")
@section("content")
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="" method="POST">
                    @csrf
                    <h1 style="text-align:center">Form Add Besaran</h1>
                    <div class="form-group">
                        <select class="form-select" aria-label="Default select example" name="tipeBarang" id="pilihKategori">
                            <option style="text-align: center">--Pilih Barang--</option>
                            @foreach($listBarang as $pilihan)
                                <option value="{{ $pilihan->id_barang }}" style="text-align: center">{{ $pilihan->nama_barang }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>ID Besaran</label>
                        <input type="text" class="form-control" name="id" value="{{ $ctr+1 }}" readonly class="form-control-plaintext">
                        </div>
                        <div class="form-group">
                        <label>Nama Besaran</label>
                        <input type="text" class="form-control" name="nama">
                        <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control" name="harga">
                    </div>

                    {{-- <div class="form-group">
                        <div class="row">
                            <div class="col">
                            <input type="number" class="form-control" placeholder="Stok">
                            </div>
                            <div class="col">
                            <input type="number" class="form-control" placeholder="Harga">
                            </div>
                        </div>
                    </div> --}}

                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-success">Tambah Besaran</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
