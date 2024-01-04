@extends("template.adminTemplate")
@section("title", "Disable Satuan")
@section("content")
<div hidden>{{$countStok}}</div>

  <div class="card-body">
    <h5 class="card-title">List Satuan</h5>
    <div class="table-responsive">
      <table
        id="zero_config"
        class="table table-striped table-bordered"
      >
        <thead>
            <tr>
                <th>Kode Satuan</th>
                <th>Nama Satuan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if (count($listSatuan) <= 0)
            <tr>
                <td colspan="3">Tidak ada data Satuan</td>
            </tr>
            @else
            @foreach ($listSatuan as $satuan)
                <tr>
                    <td>{{ $satuan->kode_satuan }}</td>
                    <td>{{ $satuan->nama_satuan }}</td>
                    <td>
                        <a href="{{ url("admin/restoreSatuan/".$satuan->kode_satuan."") }}"><button class="btn btn-warning" type="button">Restore</button></a>
                    </td>
                </tr>
            @endforeach
            @endif
        </tbody>
      </table>
    <center></div>
    <a href="{{ url("/admin/satuan")}}" style="font-style: italic; float: right">-- Kembali ke List Satuan --</a>
    </div></center>
@endsection
