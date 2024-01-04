@extends("template.pegawaiTemplate")
@section("title", "Katalog")
@section("content")
        <!-- Product section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{ asset("barang/".$listBarang[0]->img) }}" alt="img profile" /></div>
                    <div class="col-md-6">

                        <h1 class="display-5 fw-bolder">{{$listBarang[0]->nama_barang}}</h1>

                        <p class="lead">{{$listBarang[0]->deskripsi_barang}}</p>
                        <br><br>
                        <h5>Harga Per Kategori</h5>
                        <table class="table table-striped table-bordered" id="example">
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">Nama Besaran</th>
                                <th scope="col">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($listSatuan) > 0)
                                    @foreach ($listSatuan as $data)
                                        @if ($data->kode_satuan == $listBarang[0]->fk_satuan)
                                            <tr>
                                                <td>{{$data->nama_satuan}}</td>
                                                <td>{{$data->harga}}</td>
                                                {{-- <td><a href="{{url("detailfasilitas/".$data->Kodeusefas."")}}"><button type="button" class="btn btn-primary">Detail</button></a></td> --}}
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <form class="signin-form" method="POST" style="margin: 5%">
                            @csrf
                            <div class="d-flex">
                                <input class="form-control text-center me-3" id="jumlah" name="jumlah" type="num" value="1" style="max-width: 3rem" />
                                <select class="form-select form-select col-sm-3" aria-label=".form-select-sm example" id="satuan" name="satuan">
                                    @if (count($listSatuan) > 0)
                                        @foreach ($listSatuan as $data)
                                            @if ($data->kode_satuan == $listBarang[0]->fk_satuan)
                                                <option value="{{ $data->kode_satuan }}">{{ $data->nama_satuan }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>

                            </div><br>

                            <div class="form-group">
                                <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                                    <i class="bi-cart-fill me-1"></i>
                                    Add to cart
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection
