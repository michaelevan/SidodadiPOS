@extends("template.adminTemplate")
@section("title", "Disable Barang")
@section("content")
<div hidden>{{$countStok}}</div>

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
                <th>Jumlah Barang</th>
                <th>Minimal Stok</th>
                <th>Harga Pokok</th>
                <th>Harga Jual</th>
                <th>Tanggal Expired</th>
                <th>Deskripsi Barang</th>
                <th>Diskon</th>
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
                <tr>
                    <td>{{ $barang->kode_barang }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->jumlah_barang }}</td>
                    <td>{{ $barang->min_stok }}</td>
                    <td>{{ $barang->harga_pokok }}</td>
                    <td>{{ $barang->harga_jual }}</td>
                    <td>{{ $barang->tgl_exp }}</td>
                    <td>{{ $barang->deskripsi_barang }}</td>
                    <td>{{ $barang->diskon }}</td>
                    <td>
                        <a href="{{ url("admin/restoreBarang/".$barang->kode_barang."") }}"><button class="btn btn-warning" type="button">Restore</button></a>
                    </td>
                </tr>
            @endforeach
            @endif
        </tbody>
      </table>
    <center></div>
    <a href="{{ url("/admin/barang")}}" style="font-style: italic; float: right">-- Kembali ke List Barang --</a>
    </div></center>
@endsection
