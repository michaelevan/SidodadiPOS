@extends("template.pegawaiTemplate")
@section("title", "Keranjang")
@section("content")
    <form action="" method="POST">
        @csrf
        <section class="py-5">
            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                        <h2>Keranjang</h2>
                        <br>
                        <a href="{{url('/clearCart')}}"><button class="btn btn-danger" type="button" style="float: right">
                            Hapus Cart
                        </button></a>
                        <br>
                        <br>


                        <table class="table table-striped table-bordered table-hover" id="cart">
                            <thead class="thead-dark">
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Produk</th>
                                  <th scope="col">Satuan</th>
                                  <th scope="col">Kuantitas</th>
                                  <th scope="col">Harga</th>
                                  <th scope="col">Subtotal</th>
                                </tr>
                              </thead>
                            <tbody>
                                @foreach ($dataCart as $dc)
                                    <tr>
                                        <td>
                                            <img src="{{ asset("barang/".$dc["img"]) }}" alt="img profile" style="width: 30%; height: 30%;"/>
                                        </td>
                                        <td>{{ $dc["nama"] }}</td>
                                        @foreach ($dataSatuan as $data)
                                        <td>
                                            @if ($data->kode_satuan == $dc["satuan"])
                                            {{$data->nama_satuan}}
                                            @endif

                                        </td>
                                        @endforeach
                                        <td>{{ $dc["jumlah"] }}</td>
                                        <td>@currency($dc["harga"])</td>
                                        <td>@currency($dc["subtotal"])</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="float-right">
                            <div class="col-md-12">
                                <div class="pull-right">
                                    <?php
                                    $total = 0;
                                        foreach ($dataCart as $key) {
                                            $total += $key["subtotal"];
                                        }
                                        ?>
                                        Total : @currency($total)
                                    <button type="submit" class="btn btn-success" id="btnCheckout">Checkout</button>
                                    <button type="button" class="btn btn-info" onclick="printDiv('print')" >Print</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>
    </form>
    <div id="print" style="display:none;">
        <h1 style="text-align:center;" id="report">Toko Sidodadi </h1><br>
        <p style="text-align:center;">Jl. Mastrip Kedurus III No.31, <br> Kedurus, Kec. Karangpilang</p>


        <table class="table table-striped table-bordered table-hover" id="cart">
            <thead class="thead-dark">
                <tr>
                  <th scope="col">Produk</th>
                  <th scope="col">Satuan</th>
                  <th scope="col">Kuantitas</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Subtotal</th>
                </tr>
              </thead>
            <tbody>
                @foreach ($dataCart as $dc)
                    <tr>
                        <td>{{ $dc["nama"] }}</td>
                        @foreach ($dataSatuan as $data)
                        <td>
                            @if ($data->kode_satuan == $dc["satuan"])
                            {{$data->nama_satuan}}
                            @endif

                        </td>
                        @endforeach
                        <td>{{ $dc["jumlah"] }}</td>
                        <td>@currency($dc["harga"])</td>
                        <td>@currency($dc["subtotal"])</td>

                    </tr>

                @endforeach
                <tr>
                    <td colspan="4" style="text-align: right">Total </td>
                    <td>
                        <?php
                        $total = 0;
                            foreach ($dataCart as $key) {
                                $total += $key["subtotal"];
                            }
                            ?>
                            @currency($total)
                    </td>
                </tr>
            </tbody>
        </table>
        {{-- <div class="row">
            <div class="col-md-12">
                <div class="float-right">
                    <div class="col-md-12">
                        <div class="pull-right">
                            <?php
                            $total = 0;
                                foreach ($dataCart as $key) {
                                    $total += $key["subtotal"];
                                }
                                ?>
                                Total : @currency($total)

                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <script>

        function printDiv(divName) {
            document.getElementById('print').style.display = "block";
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
            document.getElementById('print').style.display = "none";
        }
        // $(document).ready(function() {
        //     $('#example').DataTable();
        // }
        // });
    </script>
@endsection
