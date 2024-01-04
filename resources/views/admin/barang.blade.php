@extends("template.adminTemplate")
@section("title", "Barang")
@section("content")
    <form style="padding: 2%" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Kode Barang</label>
            <input type="text" class="form-control" name="kode_barang" value="{{ $ctr }}" readonly class="form-control-plaintext">
        </div>
        <div class="form-group">
            <label>Supplier</label>
            <select class="form-select" aria-label="Default select example" name="fk_supplier" id="pilihSupplier">
                <option style="text-align: center">--Pilih Supplier--</option>
                @foreach($listSupplier as $pilihSupplier)
                    <option value="{{ $pilihSupplier->kode_supplier }}" style="text-align: center">{{ $pilihSupplier->nama_supplier }}</option>
                @endforeach
            </select>
        </div>
        {{-- <div class="form-group">
            <label>Satuan</label>
            <select class="form-select" aria-label="Default select example" name="fk_satuan" id="pilihSatuan">
                <option style="text-align: center">--Pilih Satuan--</option>
                <option value="ecer" style="text-align: center">ecer</option>
                <option value="dus" style="text-align: center">dus</option>
            </select>
        </div> --}}
        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" class="form-control" name="nama_barang" required>
        </div>
        @error('nama_barang')
            <h5 class="text-danger">{{ $message }}</h5>
        @enderror

        <div class="form-group">
            <label>Deskripsi barang</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="desc"></textarea>
        </div>
        @error('desc')
            <h5 class="text-danger">{{ $message }}</h5>
        @enderror

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label>Jumlah Barang</label>
                    <input type="number" class="form-control" name="jumlah_barang" required>
                </div>
                @error('jumlah_barang')
                    <h5 class="text-danger">{{ $message }}</h5>
                @enderror

                <div class="col">
                    <label>Minimal Stok</label>
                    <input type="number" class="form-control" name="min_stok" required>
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
                    <input type="number" class="form-control" name="harga_pokok" required>
                </div>
                @error('harga_pokok')
                    <h5 class="text-danger">{{ $message }}</h5>
                @enderror

                <div class="col">
                    <label>Harga Jual</label>
                    <input type="number" class="form-control" name="harga_jual" required>
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
                    <input type="date" class="form-control" name="tgl_exp">
                </div>
                @error('tgl_exp')
                    <h5 class="text-danger">{{ $message }}</h5>
                @enderror

                <div class="col">
                    <label>Diskon (Y/N)</label>
                    <input type="text" class="form-control" name="diskon" required>
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
            <button type="submit" class="form-control btn btn-success">Tambah Barang</button>
        </div>
  </form>

  <div class="card-body">
    <h5 class="card-title">List Barang</h5>
    <div class="table-responsive">
      <table
        id="zero_config"
        class="table table-striped table-bordered"
      >
        <thead>
          <tr>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Nama Supplier</th>
            <th>Jumlah Barang</th>
            <th>Minimal Stok</th>
            <th>Harga Pokok</th>
            <th>Harga Jual</th>
            <th>Tanggal Expired</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
            @if (count($listBarang) <= 0)
            <tr>
                <td colspan="10">Tidak ada data barang</td>
            </tr>
            @else
            @foreach ($listBarang as $barang)
                @if ($barang->jumlah_barang < 10)
                    <tr class="table-warning">
                        <td>{{ $barang->kode_barang }}</td>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->fk_supplier }}</td>
                        <td>{{ $barang->jumlah_barang }}</td>
                        <td>{{ $barang->min_stok }}</td>
                        <td>@currency($barang->harga_pokok)</td>
                        <td>@currency($barang->harga_jual)</td>
                        <td>{{ $barang->tgl_exp }}</td>
                        <td>
                            @csrf
                            <form action="" method="post">
                                <a href="{{ url("admin/editBarang/".$barang->kode_barang."") }}"><button class="btn btn-primary" type="button">Edit</button></a>
                                <a href="{{ url("admin/deleteBarang/".$barang->kode_barang."") }}"><button class="btn btn-danger" type="button">Delete</button></a>
                            </form>
                        </td>
                    </tr>
                @else
                    <tr>
                        <td>{{ $barang->kode_barang }}</td>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->fk_supplier }}</td>
                        <td>{{ $barang->jumlah_barang }}</td>
                        <td>{{ $barang->min_stok }}</td>
                        <td>@currency($barang->harga_pokok)</td>
                        <td>@currency($barang->harga_jual)</td>
                        <td>{{ $barang->tgl_exp }}</td>
                        <td>
                            @csrf
                            <form action="" method="post">
                                <a href="{{ url("admin/editBarang/".$barang->kode_barang."") }}"><button class="btn btn-primary" type="button">Edit</button></a>
                                <a href="{{ url("admin/deleteBarang/".$barang->kode_barang."") }}"><button class="btn btn-danger" type="button">Delete</button></a>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach
            @endif
        </tbody>
      </table>
    </div>
    <a href="{{ url("/admin/disableBarang")}}" style="font-style: italic; float: right">Lihat Disable Barang</a>
</div>
@endsection
