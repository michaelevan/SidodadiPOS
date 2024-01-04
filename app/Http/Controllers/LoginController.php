<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LoginController extends Controller
{
    public function formLogin() {
        session()->forget("login");
        return view("login");
    }

    public function Login(Request $request)
    {
        $listUsers = Users::all();
        // dd($listUsers);
        $username = $request->input("username");
        $password = $request->input("password");
        if($username == null || $password == null){
            return response(view("login", ["msg" => "username atau passwordword kosong! cek kembali inputan anda!"]));
        }
        else {
            $cek = Users::where('username', $username)->get()->first();
            // dd($cek);

            if ($cek == null) {
                return response(view("login", ["msg" => "username / password tidak ada!"]));
            }
            else {
                // return("idx masuk");

                if ($cek->is_active == 0) {
                    return response(view("login", ["msg" => "akun anda telah diban!"]));
                }
                else if ($cek->is_active == 1) {
                    if (!$password == null) {
                        session()->put("login", $cek);

                        if ($cek->role == "admin") {
                            return redirect("/admin");
                        }
                        elseif ($cek->role == "pegawai") {
                            return redirect("/pegawai");
                        }
                    }
                    else {
                        return response(view("login", ["msg" => "username / password salah!"]));
                    }
                }
            }
        }
    }

    public function logout(){
        session()->forget("login");
        return redirect('/login');
    }
}
