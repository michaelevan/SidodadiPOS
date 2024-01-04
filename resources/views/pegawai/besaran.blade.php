@extends("template.pegawaiTemplate")
@section("title", "Besaran")
@section("content")



<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 style="text-align:center">Master Besaran</h1>
                <a href="{{url('/pegawai/formBesaran')}}"><button type="button" class="btn btn-success" style="float:right">Tambah</button></a>
                <br>
                <br>
                    <table class="table table-striped table-bordered" id="example">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">ID Satuan</th>
                        <th scope="col">Nama Besaran</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($listbesaran) > 0)
                        @foreach ($listbesaran as $data)
                                <tr>
                                    <td>{{$data->id_besaran}}</td>
                                    <td>{{$data->nama_besaran}}</td>
                                    <td>{{$data->fk_barang}}</td>
                                    <td>{{$data->harga}}</td>
                                    {{-- <td><a href="{{url("detailfasilitas/".$data->Kodeusefas."")}}"><button type="button" class="btn btn-primary">Detail</button></a></td> --}}
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
