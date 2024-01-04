@extends("template.adminTemplate")
@section("title", "Faktur Pembelian")
@section("content")
<div hidden>{{$countStok}}</div>

    <form style="padding: 2%" method="POST">
        @csrf
        <div class="form-group">
            <label>No Faktur</label>
            <input type="text" class="form-control" name="no_faktur" required>
        </div>
        @error('no_faktur')
            <h5 class="text-danger">{{ $message }}</h5>
        @enderror

        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" class="form-control" name="tanggal" required>
        </div>
        @error('tanggal')
            <h5 class="text-danger">{{ $message }}</h5>
        @enderror

        <div class="form-group">
            <label>Nama Barang</label>
            <input type="text" class="form-control" name="nama_barang" required>
        </div>
        @error('nama_barang')
            <h5 class="text-danger">{{ $message }}</h5>
        @enderror

        <div class="form-group">

        </div>

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label>PPN</label>
                    <input type="number" class="form-control" name="ppn" required>
                </div>
                @error('ppn')
                    <h5 class="text-danger">{{ $message }}</h5>
                @enderror

                <div class="col">
                    <label>Tipe Pembayaran</label>
                    <select class="form-select" aria-label="Default select example" name="fk_tipe" id="pilihPembayaran">
                        <option style="text-align: center">--Pilih Tipe Pembayaran--</option>
                        <option value="0" style="text-align: center">Kontan</option>
                        <option value="1" style="text-align: center">Kredit</option>
                    </select>
                </div>
                @error('ppn')
                    <h5 class="text-danger">{{ $message }}</h5>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label>Jumlah</label>
                    <input type="number" class="form-control" name="jumlah" required>
                    @error('jumlah')
                        <h5 class="text-danger">{{ $message }}</h5>
                    @enderror
                </div>
                <div class="col">
                    <label>Harga</label>
                    <input type="number" class="form-control" name="harga" required>
                    @error('harga')
                        <h5 class="text-danger">{{ $message }}</h5>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col">
                    <label>disc 1</label>
                    <input type="number" class="form-control" name="disc1" required>
                    @error('disc1')
                        <h5 class="text-danger">{{ $message }}</h5>
                    @enderror
                </div>

                <div class="col">
                    <label>Disc 2</label>
                    <input type="number" class="form-control" name="disc2" required>
                    @error('disc2')
                        <h5 class="text-danger">{{ $message }}</h5>
                    @enderror
                </div>

                <div class="col">
                    <label>Disc 3</label>
                    <input type="number" class="form-control" name="disc3" required>
                    @error('disc3')
                        <h5 class="text-danger">{{ $message }}</h5>
                    @enderror
                </div>

                <div class="col">
                    <label>Disc 4</label>
                    <input type="number" class="form-control" name="disc4" required>
                    @error('disc4')
                        <h5 class="text-danger">{{ $message }}</h5>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <label>GrandTotal</label>
            <input type="number" class="form-control" name="grandtotal" required>
        </div>
        @error('grandtotal')
            <h5 class="text-danger">{{ $message }}</h5>
        @enderror

        <div class="form-group">
            <button type="submit" class="form-control btn btn-success">Masukkan Faktur Pembelian</button>
        </div>
  </form>

  <div class="card-body">
    <div>
        <h5 class="card-title" style="float: left; padding-right: 84%">Faktur Pembelian</h5>
        <input type="button" class="btn btn-primary" onclick="printDiv('printFakturPembelian')" value="Print" /><br>
    </div>
    <div class="table-responsive">
      <table
        id="zero_config"
        class="table table-striped table-bordered"
      >
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
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
            @if (count($fakturPembelian) <= 0)
            <tr>
                <td colspan="9">Tidak ada faktur pembelian</td>
            </tr>
            @else
            @foreach ($fakturPembelian as $fp)
                <tr>
                    <td>{{ $fp->no_faktur }}</td>
                    <td>{{ $fp->tanggal }}</td>
                    <td>{{ $fp->tipe_bayar }}</td>
                    <td>{{ $fp->ppn }}</td>
                    <td>{{ $fp->nama_barang }}</td>
                    <td>{{ $fp->jumlah }}</td>
                    <td>{{ $fp->harga }}</td>
                    <td>{{ $fp->no_rekening }}</td>
                    <td>{{ $fp->grandtotla }}</td>
                    <td>{{ $fp->is_active }}</td>
                    <td>
                        @csrf
                        <form action="" method="post">
                            <a href="{{ url("admin/editfp/".$fp->kode_fp."") }}"><button class="btn btn-primary" type="button">Edit</button></a>
                            <a href="{{ url("admin/deletefp/".$fp->kode_fp."") }}"><button class="btn btn-danger" type="button">Delete</button></a>
                        </form>
                    </td>
                </tr>
            @endforeach
            @endif
        </tbody>
      </table>
    </div>
  <a href="{{ url("/admin/disablefp")}}" style="font-style: italic; float: right">Lihat Disable Faktur Pembelian</a>

  <div id="printFakturPembelian" style="display:none;">
    <h1 style="text-align:center;" id="report">Faktur Pembelian</h1>
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
            <tbody>
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
            </tbody>
        </table>
    </div>
</div>
</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );

    function printDiv(divName) {
        document.getElementById('printFakturPembelian').style.display = "block";
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        document.getElementById('printFakturPembelian').style.display = "none";
    }
</script>
@endsection
