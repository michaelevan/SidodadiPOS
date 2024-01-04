@extends("template.adminTemplate")
@section("title", "User")
@section("content")
<div hidden>{{$countStok}}</div>

<form action="" method="POST" style="padding: 2%">
    @csrf
    <div class="form-group">
        <label>Username</label>
        <input type="text" class="form-control" name="username" autocomplete="off" required>
    </div>
    @error('username')
        <small class="text-danger">{{ $message }}</small><br>
    @enderror

    <div class="form-group">
        <label>Nama Pegawai</label>
        <input type="text" class="form-control" name="nama" autocomplete="off" required>
    </div>
    @error('nama')
        <small class="text-danger">{{ $message }}</small><br>
    @enderror

    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" name="password" autocomplete="off" required>
    </div>
    @error('password')
        <small class="text-danger">{{ $message }}</small><br>
    @enderror

    <div class="form-group">
        <button type="submit" class="form-control btn btn-success">Tambah User</button>
    </div>
</form>
<div class="card-body">
    <h5 class="card-title">List User</h5>
    <div class="table-responsive">
      <table
        id="zero_config"
        class="table table-striped table-bordered"
      >
        <thead>
          <tr>
            <th>Username</th>
            <th>Password</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
            @if (count($listPegawai) <= 0)
            <tr>
                <td colspan="3">Tidak ada data pegawai</td>
            </tr>
            @else
            @foreach ($listPegawai as $pegawai)
                <tr>
                    <td>{{ $pegawai->username }}</td>
                    <td>{{ $pegawai->password }}</td>
                    <td>
                        @csrf
                        <form action="" method="post">
                            <a href="{{ url("admin/editUser/".$pegawai->username."") }}"><button class="btn btn-primary" type="button">Edit</button></a>
                            @if ( $pegawai->is_active == 1)
                                <a href="{{ url("admin/banned/".$pegawai->username."") }}"><button class="btn btn-danger" type="button">Ban</button></a>
                            @else
                                <a href="{{ url("admin/unbanned/".$pegawai->username."") }}"><button class="btn btn-warning" type="button">Unban</button></a>
                            @endif
                        </form>
                    </td>
                </tr>
            @endforeach
            @endif
        </tbody>
      </table>
    </div>
  </div>
@endsection


