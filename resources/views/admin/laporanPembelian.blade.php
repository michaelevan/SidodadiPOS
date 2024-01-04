@extends("template.adminTemplate")
@section("title", "Laporan Pembelian")
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
        <div class="form-group">
            <input type="button" class="btn btn-primary" onclick="printDiv('printLaporanPembelian')" value="Print" /><br>
        </div>
  </form>

<div class="card-body">
    <div>
        <h5 class="card-title">Faktur Pembelian</h5>
    </div>
    <div class="table-responsive">
        <table
        id="zero_config"
        class="table table-striped table-bordered"
        >
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Nama Supplier</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            {{-- @if (count($laporanPembelian) <= 0)
            <tr>
                <td colspan="6">Tidak ada laporan pembelian</td>
            </tr>
            @else
            @foreach ($laporanPembelian as $lp)
                <tr>
                    <td>{{ $lp->nama_barang }}</td>
                    <td>{{ $lp->nama_supplier }}</td>
                    <td>{{ $lp->jumlah }}</td>
                    <td>{{ $lp->harga }}</td>
                    <td>{{ $lp->subtotal }}</td>
                </tr>
            @endforeach
            @endif --}}
        </tbody>
        </table>
    </div>

    <div id="printLaporanPembelian" style="display:none;">
        <h1 style="text-align:center;" id="report">Laporan Pembayaran Hutang</h1>
        <br>

        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="example">
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Nama Supplier</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Subtotal</th>
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
    <input type="button" style="margin-left: 95%" class="btn btn-primary" onclick="printDiv('printFakturPembelian')" value="Print" /><br>

</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );

    function printDiv(divName) {
        document.getElementById('printLaporanPembelian').style.display = "block";
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        document.getElementById('printLaporanPembelian').style.display = "none";
    }
</script>
@endsection
