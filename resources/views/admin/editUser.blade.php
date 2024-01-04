@extends("template.adminTemplate")
@section("title", "User")
@section("content")
<div hidden>{{$countStok}}</div>

    <b><i>{{ $msg ?? "" }}</i></b> <br/>
    <form action="" method="POST" style="padding: 2%">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="username" value="{{ $listUser->username }}" autocomplete="off"  readonly class="form-control-plaintext">
        </div>

        <div class="form-group">
            <input type="password" class="form-control" name="password" value="{{ $listUser->password }}" autocomplete="off" required>
        </div>
        @error('password')
            <small class="text-danger">{{ $message }}</small><br>
        @enderror

        <div class="form-group">
            <input type="password" class="form-control" name="password_confirmation" autocomplete="off" required>
        </div>
        @error('password_confirmation')
            <small class="text-danger">{{ $message }}</small><br>
        @enderror

        <div class="form-group">
            <button type="submit" class="form-control btn btn-success">Edit User</button>
        </div>
    </form>
@endsection


