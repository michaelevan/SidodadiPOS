@extends("template.adminTemplate")
@section("title", "Disable Supplier")
@section("content")
<div hidden>{{$countStok}}</div>

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
                <th>No Telepon</th>
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
                <td colspan="11">Tidak ada data Supplier</td>
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
                        <a href="{{ url("admin/restoreSupplier/".$supplier->kode_supplier."") }}"><button class="btn btn-warning" type="button">Restore</button></a>
                    </td>
                </tr>
            @endforeach
            @endif
        </tbody>
      </table>
    <center></div>
    <a href="{{ url("/admin/supplier")}}" style="font-style: italic; float: right">-- Kembali ke List Supplier --</a>
    </div></center>
@endsection
