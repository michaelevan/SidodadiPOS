@extends("template.adminTemplate")
@section("title", "Satuan")
@section("content")
<div hidden>{{$countStok}}</div>

    <form action="" method="POST">
        @csrf
        <div class="form-group">
            <label>Kode Satuan</label>
            <input type="text" class="form-control" name="kode_satuan" value="{{ $ctr }}" readonly class="form-control-plaintext">
        </div>
        <div class="form-group">
            <label>Nama Satuan</label>
            <input type="text" class="form-control" name="nama_satuan" required>
        </div>
        @error('nama_satuan')
            <h5 class="text-danger">{{ $message }}</h5>
        @enderror

        <div class="form-group">
            <button type="submit" class="form-control btn btn-success">Tambah Satuan</button>
        </div>
    </form>

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
                    <td colspan="3">Tidak ada data satuan</td>
                </tr>
                @else
                @foreach ($listSatuan as $satuan)
                    <tr>
                        <td>{{ $satuan->kode_satuan }}</td>
                        <td>{{ $satuan->nama_satuan }}</td>
                        <td>
                            @csrf
                            <form action="" method="post">
                                <a href="{{ url("admin/editSatuan/".$satuan->kode_satuan."") }}"><button class="btn btn-primary" type="button">Edit</button></a>
                                <a href="{{ url("admin/deleteSatuan/".$satuan->kode_satuan."") }}"><button class="btn btn-danger" type="button">Delete</button></a>
                            </form>
                        </td>
                    </tr>
                @endforeach
                @endif
            </tbody>
          </table>
        </div>
        <a href="{{ url("/admin/disableSatuan")}}" style="font-style: italic; float: right">Lihat Disable Satuan</a>
    </div>
@endsection
