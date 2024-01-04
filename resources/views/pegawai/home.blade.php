@extends("template.pegawaiTemplate")
@section("title", "Home")
@section("content")
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @if (count($listBarang) <= 0)
                    <h4>Tidak ada barang</h4>
                @else
                    @foreach ($listBarang as $list)
                        <a href="{{ url("/pegawai/katalog/".$list->kode_barang."") }}">
                            <div class="col mb-5">
                                <div class="card h-100">
                                    <!-- Product image-->
                                    <img class="rounded-35" src="{{ asset("barang/".$list->img) }}" alt="img profile" style="padding: 5%; width:200px; height:200px" />
                                    <!-- Product details-->
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <!-- Product name-->
                                            <h5 class="fw-bolder">{{ $list->nama_barang }}</h5>
                                            <!-- Product price-->
                                        </div>
                                    </div>
                                    <!-- Product actions-->
                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                        <form action="" method="post">
                                            <div class="text-center">
                                                <button type="button" class="btn btn-outline-dark mt-auto">Buka Detail</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @endif

            </div>
        </div>
    </section>
@endsection
