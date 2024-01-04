@extends("template.adminTemplate")
@section("title", "Laporan Penjualan")
@section("content")
<div hidden>{{$countStok}}</div>
    <form style="padding: 2%" method="POST">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label>Tanggal Awal</label>
                    <input type="date" class="form-control" name="start_date">
                </div>
                <div class="col">
                    <label>Tanggal Akhir</label>
                    <input type="date" class="form-control" name="end_date">
                </div>
            </div>
        </div>
        <input type="button" class="btn btn-primary" onclick="printDiv('printLaporanPenjualan')" value="Print" /><br>
  </form>

  <div id="printLaporanPenjualan" style="display:none;">
    <h1 style="text-align:center;" id="report">Laporan Penjualan</h1>
    <br>

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="example">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Disc 1</th>
                    <th>Disc 2</th>
                    <th>Disc 3</th>
                    <th>Disc 4</th>
                    <th>Harga Net</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            {{-- <tbody>
                @if (count($fakturPembelian) <= 0)
                <tr>
                    <td colspan="3">Tidak ada data laporan pemasukan</td>
                </tr>
                @else
                @foreach ($fakturPembelian as $fp)
                    <tr>
                        <td>{{ $fp->Kodecheckout }}</td>
                        <td>{{ $fp->Tglcheckout }}</td>
                        <td>{{ $fp->grandtotal }}</td>
                    </tr>
                @endforeach
                @endif
            </tbody> --}}
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );

    function printDiv(divName) {
        document.getElementById('printLaporanPenjualan').style.display = "block";
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        document.getElementById('printLaporanPenjualan').style.display = "none";
    }
</script>
@endsection
