@extends("template.adminTemplate")
@section("title", "Supplier")
@section("content")
    <div hidden>{{$countStok}}</div>
    <a href="{{ url('admin/fakturPembelian') }}" style="text-align: right"><button type="button" class="btn btn-info">Faktur Pembelian</button></a>
    <form style="padding: 2%" method="POST">
        @csrf
        <div class="form-group">
            <label>Kode Supplier</label>
            <input type="text" class="form-control" name="id" value="{{ $ctr }}" readonly class="form-control-plaintext">
        </div>
        <div class="form-group">
            <label>Nama Supplier</label>
            <input type="text" class="form-control" name="nama_supplier" required>
        </div>
        @error('nama_supplier')
            <h5 class="text-danger">{{ $message }}</h5>
        @enderror

        <div class="form-group">
            <label>Alamat Supplier</label>
            <input type="text" class="form-control" name="alamat_supplier" required>
        </div>
        @error('alamat_supplier')
            <h5 class="text-danger">{{ $message }}</h5>
        @enderror

        <div class="form-group">
            <label>Kota Asal</label>
            <input type="text" class="form-control" name="kota" required>
        </div>
        @error('kota')
            <h5 class="text-danger">{{ $message }}</h5>
        @enderror

        <div class="form-group">
            <label>No Telepon</label>
            <input type="text" class="form-control" name="no_telp" required>
        </div>
        @error('no_telp')
            <h5 class="text-danger">{{ $message }}</h5>
        @enderror

        <div class="form-group">
            <label>NPWP</label>
            <input type="text" class="form-control" name="NPWP" required>
        </div>
        @error('NPWP')
            <h5 class="text-danger">{{ $message }}</h5>
        @enderror

        <div class="form-group">
            <label>Nama Bank</label>
            <input type="text" class="form-control" name="nama_bank" required>
        </div>
        @error('nama_bank')
            <h5 class="text-danger">{{ $message }}</h5>
        @enderror

        <div class="form-group">
            <label>No Rekening</label>
            <input type="text" class="form-control" name="no_rekening" required>
        </div>
        @error('no_rekening')
            <h5 class="text-danger">{{ $message }}</h5>
        @enderror

        <div class="form-group">
            <label>Nama Pajak</label>
            <input type="text" class="form-control" name="nama_pajak" required>
        </div>
        @error('nama_pajak')
            <h5 class="text-danger">{{ $message }}</h5>
        @enderror

        <div class="form-group">
            <label>Alamat Pajak</label>
            <input type="text" class="form-control" name="alamat_pajak" required>
        </div>
        @error('alamat_pajak')
            <h5 class="text-danger">{{ $message }}</h5>
        @enderror

        <div class="form-group">
            <button type="submit" class="form-control btn btn-success">Tambah Supplier</button>
        </div>
  </form>

  <div class="card-body">
    <h5 class="card-title">List Supplier</h5>
    <div class="table-responsive">
      <table
        id="zero_config"
        class="table table-striped table-bordered"
      >
        <thead>
          <tr>
            <th>Kode Supplier</th>
            <th>Nama Supplier</th>
            <th>Alamat Supplier</th>
            <th>Kota Asal</th>
            <th>No Telp</th>
            <th>NPWP</th>
            <th>Nama Bank</th>
            <th>No Rekening</th>
            <th>Nama Pajak</th>
            <th>Alamat Pajak</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
            @if (count($listSupplier) <= 0)
            <tr>
                <td colspan="10">Tidak ada data Supplier</td>
            </tr>
            @else
            @foreach ($listSupplier as $supplier)
                <tr>
                    <td>{{ $supplier->kode_supplier }}</td>
                    <td>{{ $supplier->nama_supplier }}</td>
                    <td>{{ $supplier->alamat_supplier }}</td>
                    <td>{{ $supplier->kota }}</td>
                    <td>{{ $supplier->no_telp }}</td>
                    <td>{{ $supplier->NPWP }}</td>
                    <td>{{ $supplier->nama_bank }}</td>
                    <td>{{ $supplier->no_rekening }}</td>
                    <td>{{ $supplier->nama_pajak }}</td>
                    <td>{{ $supplier->alamat_pajak }}</td>
                    <td>
                        @csrf
                        <form action="" method="post">
                            <a href="{{ url("admin/editSupplier/".$supplier->kode_supplier."") }}"><button class="btn btn-primary" type="button">Edit</button></a>
                            <a href="{{ url("admin/deleteSupplier/".$supplier->kode_supplier."") }}"><button class="btn btn-danger" type="button">Delete</button></a>
                        </form>
                    </td>
                </tr>
            @endforeach
            @endif
        </tbody>
      </table>
    </div>
  <a href="{{ url("/admin/disableSupplier")}}" style="font-style: italic; float: right">Lihat Disable Supplier</a>
</div>
@endsection
