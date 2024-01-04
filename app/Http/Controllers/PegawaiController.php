<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\H_Transaksi;
use App\Models\Satuan;
use App\Models\Transaksi;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    public function dashboard() {
        $listBarang = Barang::select('*')->get();
        return view("pegawai.home", [
            "listBarang" => $listBarang,
        ]);;
    }

    public function clearCart() {
        Cookie::queue(Cookie::forget('dCart'));
        $listBarang = Barang::select('*')->get();
        return view("pegawai.home", [
            "listBarang" => $listBarang,
        ]);;
    }

    public function formKatalog($kode_barang) {
        $listBarang = Barang::select('*')->where('kode_barang', $kode_barang)->get();
        $listSatuan = Satuan::select('*')->get();
        // dd($listBarang);
        return view("pegawai.katalog", [
            "listBarang" => $listBarang,
            "listSatuan" => $listSatuan,
        ]);
    }

    public function formItem() {
        return view("pegawai.katalog");
    }

    public function itemData() {

    }
    public function cart(Request $request) {

        $dataCart = json_decode($request->cookie("dCart") ?? "[]", true);
        $listBarang = Barang::select('*')->get();
        $listSatuan = Satuan::select('*')->get();

        return view("pegawai.cart", [
            "dataCart" => $dataCart,
            "dataBarang" => $listBarang,
            "dataSatuan" => $listSatuan
        ]);
    }
    public function barang() {

        $listBarang = Barang::select('*')->get();
        $ctr = Barang::max('kode_bar$kode_barang');
        // dd($ctr);
        return view("pegawai.barang", [
            "listBarang" => $listBarang,
            "ctr" => $ctr,
        ]);
    }

    public function besaran() {
        $listbesaran = Satuan::select('*')->get();
        // $ctr = Barang::value('kode_bar$kode_barang');
        // dd($ctr);
        return view("pegawai.besaran", [
            "listbesaran" => $listbesaran,

        ]);
    }

    public function formBesaran() {
        $listBesaran = Satuan::select('*')->get();
        $listBarang = Barang::select('*')->get();
        $ctr = Satuan::max('id_besaran');
        // dd($ctr);
        return view("pegawai.formBesaran", [
            "listBarang" => $listBarang,
            "listBesaran" => $listBesaran,
            "ctr" => $ctr,
        ]);
    }


    public function addToCart(Request $request,$id) {
        $listBarang = Barang::select('*')->get();
        $dataCart = json_decode($request->cookie("dCart") ?? "[]", true);

        $index = -1;

        for ($i=0; $i < count($listBarang); $i++) {
            if ($listBarang[$i]["kode_barang"] == $id) {
                $index = $i;
            }
        }
        $dataHarga = Barang::select('*')->where('kode_barang', $listBarang[$index]["kode_barang"])->get();
        if ($listBarang[$index]["jumlah_barang"] > $request->input("jumlah")) {
            $cart = [
                "img" => $listBarang[$index]["img"],
                "kode" => $listBarang[$index]["kode_barang"],
                "nama" => $listBarang[$index]["nama_barang"],
                "satuan" => $request->input("satuan"),
                "harga" => $dataHarga[0]->harga_jual,
                "jumlah" => $request->input("jumlah"),
                "subtotal" => $request->input("jumlah") * $dataHarga[0]->harga_jual
                // "harga" => $dataBarang[$index]["harga"]
            ];
            $dataCart[] = $cart;
            Cookie::queue(Cookie::make("dCart", json_encode($dataCart), "1000"));
            return redirect()->back()->with("success", "Berhasil memasukkan barang ke Cart");
        }
        else {
            return redirect()->back()->withErrors("Stok tidak cukup");
        }



        // return view("pegawai.home", [
        //     "listBarang" => $listBarang,
        // ]);
    }


    public function addBesaran(Request $request) {
        $request->validate([
            "nama" => "required|alpha|max:10",
        ]);

        $besaran = new Satuan();
        $besaran->id_besaran = 0;
        $besaran->nama_besaran = $request->input("nama");
        $besaran->fk_barang = $request->input("tipeBarang");
        $besaran->harga = $request->input("harga");
        $besaran->is_active = 0;
        // dd($besaran);
        $result = $besaran->save();
        // dd($result);

        if ($result){
            return redirect()->back()->with("success", "Berhasil Tambah Besaran!");
        }
        else{
            return redirect()->back()->withErrors("Gagal Tambah Besaran!");
        }
    }

    public function addBarang(Request $request) {
        $request->validate([
            "nama" => "required|alpha|max:30",
            "desc" => "required|max:250",
        ]);

        $barang = new Barang();
        $barang->kode_barang = 0;
        $barang->nama_barang = $request->input("nama");
        $barang->deskripsi_barang = $request->input("desc");
        $barang->is_active = 0;
        // dd($barang);
        $result = $barang->save();
        // dd($result);

        if ($result){
            return redirect()->back()->with("success", "Berhasil Tambah Barang!");
        }
        else{
            return redirect()->back()->withErrors("Gagal Tambah Barang!");
        }
    }

    public function checkout(Request $request) {
        $dataCart = json_decode($request->cookie("dCart") ?? "[]", true);
        $listBarang = Barang::select('*')->get();
        $h_transaksi = new H_Transaksi();
        $total = 0;
        foreach ($dataCart as $key) {
            $total += $key["subtotal"];
        }
        $h_transaksi->grandtotal =$total;
        $h_transaksi->is_active = 1;
        $h_transaksi->save();
        $id = $h_transaksi->kode_h_trans;

        foreach ($dataCart as $key) {
            $d_trans = new Transaksi();
            $d_trans->kode_h_trans = $id;
            for ($i=0; $i < count($listBarang); $i++) {
                if ($listBarang[$i]["kode_barang"] == $key["kode"]) {
                    $d_trans->tanggal_exp = $listBarang[$i]["tgl_exp"];
                    $d_trans->kode_barang  = $listBarang[$i]["kode_barang"];
                    $d_trans->kode_supplier = $listBarang[$i]["fk_supplier"];
                    $d_trans->nama_barang = $listBarang[$i]["nama_barang"];
                    $d_trans->jumlah = $key["jumlah"];
                    $d_trans->harga = $listBarang[$i]["harga_jual"];
                    $d_trans->subtotal = $key["subtotal"];
                    $d_trans->is_active = 1;
                    $jumlah = $listBarang[$i]["jumlah_barang"]-$key["jumlah"];
                    $updatebarang = DB::table('barang')->where("kode_barang", $key["kode"])->update(["jumlah_barang" => $jumlah]);

                }
            }
            $d_trans->save();

        }



        Cookie::queue(Cookie::forget('dCart'));
        return view("pegawai.home", [
            "listBarang" => $listBarang,
        ]);;
    }

}
