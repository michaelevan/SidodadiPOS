@extends("template.adminTemplate")
@section("title", "Dashboard")
@section("content")
    <h1><nav style="justify-content: center">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button style="margin-left: 20%" class="nav-link active" id="nav-active-tab" data-bs-toggle="tab" data-bs-target="#nav-active" type="button" role="tab" aria-controls="nav-active" aria-selected="true">active</button>
        <button style="margin-left: 40%" class="nav-link" id="nav-history-tab" data-bs-toggle="tab" data-bs-target="#nav-history" type="button" role="tab" aria-controls="nav-history" aria-selected="false">history</button>
        </div>
    </nav></h1>
    <div class="tab-content" id="nav-tabContent" style="padding: 5%">
    @if (count($listTransaksi) <= 0)
        <h1>Tidak ada data transaksi aktif</h1>
    @else
        @foreach ($listTransaksi as $trans)
            @if ($trans->is_active == 1)
                <div class="tab-pane fade show active" id="nav-active" role="tabpanel" aria-labelledby="nav-active-tab">
                    <p>aktif</p>
            @else
                <div class="tab-pane fade" id="nav-history" role="tabpanel" aria-labelledby="nav-history-tab">
                    <p>tidak</p>
                <h3>{{ $trans->date('dd-month-yyyy', $tgl_h_trans)}}</h3>
                    <div class="row">
                        <div class="col-sm-8">{{ $trans->nama_barang }}</div>
                        <div class="col-sm-4">@currency($trans->grandtotal)</div>
                    </div><hr>
                </div>
                    <h3> Senin, 11 september 2022</h3>
                    <div class="row">
                        <div class="col-sm-8">Beras Pullen 25kg</div>
                        <div class="col-sm-4">Rp. 125.000,00</div>
                    </div><hr>
                </div>
            @endif
        @endforeach
    @endif
    </div>
@endsection
