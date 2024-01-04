@extends("template.pegawaiTemplate")
@section("title", "Barang")
@section("content")
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form style="padding: 2%" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>ID Barang</label>
                        <input type="text" class="form-control" name="id" value="{{ $ctr+1 }}" readonly class="form-control-plaintext">
                    </div>
                    <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="form-group">
                    <label>Deskripsi barang</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="desc"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-success">Tambah Barang</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
