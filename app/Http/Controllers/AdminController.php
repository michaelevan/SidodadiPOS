<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Besaran;
use App\Models\fakturPembelian;
use App\Models\H_Transaksi;
use App\Models\Satuan;
use App\Models\Supplier;
use App\Models\Users;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    public function index() {
        $countStok = 0;
        return view("admin.index", [
            "countStok" => $countStok,
        ]);
    }

    public function dashboard() {
        $countStok = 0;
        $listTransaksi = H_Transaksi::select('*')->where('is_active', 1)->get();

        return view("admin.dashboard", [
            "countStok" => $countStok,
            "listTransaksi" => $listTransaksi,
        ]);
    }

    public function formAddBarang() {
        $listBarang = Barang::select('*')->where('is_active', 1)->get();
        $listSatuan = Satuan::select('*')->where('is_active', 1)->get();
        $listSupplier = Supplier::select('*')->where('is_active', 1)->get();
        $ctr = Barang::select('kode_barang')->orderByDesc('kode_barang')->value('kode_barang');
        // dd($ctr);

        $countStok = Barang::where('is_active', 1)->groupBy('kode_barang', 'fk_supplier', 'satuan', 'nama_barang', 'jumlah_barang'
        , 'min_Stok', 'harga_pokok', 'harga_jual', 'tgl_exp', 'deskripsi_barang', 'diskon', 'img', 'is_active', 'updated_at'
        , 'created_at')->having('jumlah_barang', '<', 10)->count();
        // dd($countStok);

        return view("admin.barang", [
            "listBarang" => $listBarang,
            "listSatuan" => $listSatuan,
            "listSupplier" => $listSupplier,
            "countStok" => $countStok,
            "ctr" => $ctr+1,
        ]);
    }

    public function addBarangData(Request $request) {
        $request->validate([
            "nama_barang" => "required|max:100",
            "jumlah_barang" => "required|max:6",
            "min_stok" => "required|max:2",
            "harga_pokok" => "required|max:10",
            "harga_jual" => "required|max:10",
            "tgl_exp" => "date",
            "desc" => "max:250",
            "diskon" => "required|alpha|max:1",
            'img' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $barang = new Barang();
        $barang->kode_barang = 0;
        $barang->fk_supplier = $request->input("fk_supplier");
        $barang->satuan = 1;
        $barang->nama_barang = $request->input("nama_barang");
        $barang->jumlah_barang = $request->input("jumlah_barang");
        $barang->min_stok = $request->input("min_stok");
        $barang->harga_pokok = $request->input("harga_pokok");
        $barang->harga_jual = $request->input("harga_jual");
        $barang->tgl_exp = $request->input("tgl_exp");
        $barang->deskripsi_barang = $request->input("desc");
        $barang->diskon = $request->input("diskon");
        if ($request->has('img')) {
            $file_name = $request->file('img')->getClientOriginalName();
            $request->file('img')->move('barang', $file_name);
            $barang->img = $file_name;
        }
        $barang->is_active = 1;

        // dd($barang);
        $result = $barang->save();
        if ($result){
            return redirect()->back()->with("success", "Berhasil Tambah Barang!");
        }
        else{
            return redirect()->back()->withErrors("Gagal Tambah Barang!");
        }
    }

    public function formEditBarang($kode_barang) {
        $countStok = 0;
        $listBarang = Barang::where('kode_barang', $kode_barang)->get()->first();
        // dd($listBarang);

        $listSupplier = Barang::join('supplier', 'barang.fk_supplier', '=', 'supplier.kode_supplier')
        ->where('barang.kode_barang', $kode_barang)
        ->value('supplier.nama_supplier');

        // $listSatuan = Barang::join('satuan', 'barang.fk_satuan', '=', 'satuan.kode_satuan')
        // ->where('barang.kode_barang', $kode_barang)
        // ->value('satuan.nama_satuan');

        return view("admin.editBarang", [
            "listBarang" => $listBarang,
            "listSupplier" => $listSupplier,
            "countStok" => $countStok,
        ]);
    }

    public function editBarangData($kode_barang, Request $request) {
        $request->validate([
            "nama_barang" => "required|max:100",
            "jumlah_barang" => "required|max:6",
            "min_stok" => "required|max:2",
            "harga_pokok" => "required|max:10",
            "harga_jual" => "required|max:10",
            "tgl_exp" => "date",
            "desc" => "max:250",
            "diskon" => "required|alpha|max:1",
            'img' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->has('img')) {
            $file_name = $request->file('img')->getClientOriginalName();
            $request->file('img')->move('barang', $file_name);
            $result = Barang::where("kode_barang", $kode_barang)->update([
                "nama_barang" => $request->input("nama_barang"),
                "jumlah_barang" => $request->input("jumlah_barang"),
                "min_stok" => $request->input("min_stok"),
                "harga_pokok" => $request->input("harga_pokok"),
                "harga_jual" => $request->input("harga_jual"),
                "tgl_exp" => $request->input("tgl_exp"),
                "deskripsi_barang" => $request->input("desc"),
                "diskon" => $request->input("diskon"),
                "img" => $file_name,
            ]);
        }
        else {
            $result = Barang::where("kode_barang", $kode_barang)->update([
                "nama_barang" => $request->input("nama_barang"),
                "jumlah_barang" => $request->input("jumlah_barang"),
                "min_stok" => $request->input("min_stok"),
                "harga_pokok" => $request->input("harga_pokok"),
                "harga_jual" => $request->input("harga_jual"),
                "tgl_exp" => $request->input("tgl_exp"),
                "deskripsi_barang" => $request->input("desc"),
                "diskon" => $request->input("diskon"),
            ]);
        }



        if ($result){
            return redirect('/admin/barang')->with("success", "Berhasil Edit Barang!");
        }
        else{
            return redirect()->back()->withErrors("Gagal Edit Barang!");
        }
    }

    public function deleteBarang($kode_barang) {
        $result = Barang::where("kode_barang", $kode_barang)->update([
            "is_active" => 0
        ]);
        if ($result){
            return redirect()->back()->with("success", "Berhasil Disable Barang");
        }
        else{
            return redirect()->back()->withErrors("Gagal Disable Barang");
        }
    }

    public function disableBarang(){
        $countStok = 0;
        $listBarang = Barang::where('is_active', 0)->get();
        // dd($listBarang);

        return view("admin.disableBarang", [
            "listBarang" => $listBarang,
            "countStok" => $countStok,
        ]);
    }

    public function restoreBarang($kode_barang) {
        $result = Barang::where("kode_barang", $kode_barang)->update([
            "is_active" => 1
        ]);
        if ($result){
            return redirect()->back()->with("success", "Berhasil Restore Barang");
        }
        else{
            return redirect()->back()->withErrors("Gagal Restore Barang");
        }
    }

    public function formFakturPembelian() {
        $countStok = 0;
        $fakturPembelian = fakturPembelian::select('*')->where('is_active', 1)->get();

        return view("admin.fakturPembelian", [
            "fakturPembelian" => $fakturPembelian,
            "countStok" => $countStok,
        ]);
    }

    public function addFakturPembelian($request) {
      // $request->validate([
        //     "nama" => "required|alpha|max:30",
        //     // "jumlah" => "required|alpha_num|max:6",
        //     // "harga" => "required|alpha_num|max:10",
        //     "tgl_exp" => "required|date",
        //     "desc" => "required|alpha_num|max:250",
        //     // 'img' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
        // ]);

        $fakturPembelian = new fakturPembelian();
        $fakturPembelian->no_faktur = 0;
        $fakturPembelian->tanggal = $request->input("tanggal");
        $fakturPembelian->tipe_bayar = $request->input("tipe_bayar");
        $fakturPembelian->ppn = $request->input("ppn");
        $fakturPembelian->nama_barang = $request->input("nama_barang");
        $fakturPembelian->jumlah = $request->input("jumlah");
        $fakturPembelian->harga = $request->input("harga");
        $fakturPembelian->disc1 = $request->input("disc1");
        $fakturPembelian->disc2 = $request->input("disc2");
        $fakturPembelian->disc3 = $request->input("disc3");
        $fakturPembelian->disc1 = $request->input("disc1");
        $fakturPembelian->disc4 = $request->input("disc4");
        $fakturPembelian->grandtotal = $request->input("grandtotal");
        $fakturPembelian->is_active = 1;

        // dd($fakturPembelian);
        $result = $fakturPembelian->save();
        // dd($result);
        if ($result){
            return redirect()->back()->with("success", "Berhasil Tambah Faktur Pembelian!");
        }
        else{
            return redirect()->back()->withErrors("Gagal Tambah Faktur Pembelian!");
        }
    }

    public function formAddUser() {
        $countStok = 0;
        $listPegawai = Users::where("role", "pegawai")->where("is_active", 1)->get();
        // dd($listPegawai);

        return view("Admin.user", [
            "listPegawai" => $listPegawai,
            "countStok" => $countStok,
        ]);
    }

    public function addUserData(Request $request) {
        $request->validate([
            "username" => "required|max:30|unique:user,username",
            "password" => "required|alpha_dash|max:12",
        ]);

        $users = new Users();
        $users->username = $request->input("username");
        $users->password = $request->input("password");
        $users->role = "pegawai";
        $users->is_active = "1";
        $result = $users->save();

        if ($result){
            return redirect()->back()->with("success", "Berhasil Tambah User!");
        }
        else{
            return redirect()->back()->withErrors("Gagal Tambah User!");
        }
    }

    public function formEditUser($username) {
        $countStok = 0;
        $listUser = Users::where('username', $username)->get()->first();
        // dd($listUser);

        return view("admin.editUser", [
            "listUser" => $listUser,
            "countStok" => $countStok,
        ]);
    }

    public function editUserData($username, Request $request) {
        if (!$request->input("password") == $request->input("password_confirmation")) {
            return response(["msg" => "password dan konfirmasi password harus sesuai!"]);
        }
        $result = Users::where("username", $username)->update([
            "password" => $request->input("password"),
        ]);

        if ($result){
            return redirect()->back()->with("success", "Berhasil Edit User!");
        }
        else{
            return redirect()->back()->withErrors("Gagal Edit User!");
        }
    }

    public function banned($username) {
        $result = Users::where("username", $username)->update([
            "is_active" => 0
        ]);
        if ($result){
            return redirect()->back()->with("success", "Berhasil banned user");
        }
        else{
            return redirect()->back()->withErrors("Gagal banned user");
        }
    }

    public function unbanned($username) {
        $result = Users::where("username", $username)->update([
            "is_active" => 1
        ]);
        if ($result){
            return redirect()->back()->with("success", "Berhasil unbanned user");
        }
        else{
            return redirect()->back()->withErrors("Gagal unbanned user");
        }
    }

    public function listSatuan() {
        $countStok = 0;
        $listSatuan = Satuan::select('*')->where('is_active', 1)->get();
        $ctr = Satuan::select('kode_satuan')->orderByDesc('kode_satuan')->value('kode_satuan');
        return view("admin.satuan", [
            "listSatuan" => $listSatuan,
            "ctr" => $ctr+1,
            "countStok" => $countStok,
        ]);
    }

    public function addSatuan(Request $request) {
        $request->validate([
            "nama_satuan" => "alpha|max:10",
        ]);

        $satuan = new Satuan();
        $satuan->kode_satuan = 0;
        $satuan->nama_satuan = $request->input("nama_satuan");
        $satuan->is_active = 1;
        $result = $satuan->save();
        if ($result){
            return redirect()->back()->with("success", "Berhasil Tambah Satuan!");
        }
        else{
            return redirect()->back()->withErrors("Gagal Tambah Satuan!");
        }
    }

    public function formEditSatuan($kode_satuan) {
        $countStok = 0;
        $listSatuan = Satuan::where('kode_satuan', $kode_satuan)->get()->first();
        // dd($listSatuan);

        return view("admin.editSatuan", [
            "listSatuan" => $listSatuan,
            "countStok" => $countStok,
        ]);
    }

    public function editSatuanData($kode_satuan, Request $request) {
        $result = Satuan::where("kode_satuan", $kode_satuan)->update([
            "nama_satuan" => $request->input("nama_satuan"),
        ]);

        if ($result){
            return redirect('/admin/satuan')->with("success", "Berhasil Edit Satuan!");
        }
        else{
            return redirect()->back()->withErrors("Gagal Edit Satuan!");
        }
    }

    public function deleteSatuan($kode_satuan) {
        $result = Satuan::where("kode_satuan", $kode_satuan)->update([
            "is_active" => 0
        ]);
        if ($result){
            return redirect()->back()->with("success", "Berhasil Disable Satuan");
        }
        else{
            return redirect()->back()->withErrors("Gagal Disable Satuan");
        }
    }

    public function disableSatuan(){
        $countStok = 0;
        $listSatuan = Satuan::where('is_active', 0)->get();
        // dd($listSatuan);

        return view("admin.disableSatuan", [
            "listSatuan" => $listSatuan,
            "countStok" => $countStok,
        ]);
    }

    public function restoreSatuan($kode_satuan) {
        $result = Satuan::where("kode_satuan", $kode_satuan)->update([
            "is_active" => 1
        ]);
        if ($result){
            return redirect()->back()->with("success", "Berhasil Restore Satuan");
        }
        else{
            return redirect()->back()->withErrors("Gagal Restore Satuan");
        }
    }

    public function listSupplier() {
        $countStok = 0;
        $listSupplier = Supplier::select('*')->where('is_active', 1)->get();
        $ctr = Supplier::select('kode_supplier')->orderByDesc('kode_supplier')->value('kode_supplier');
        return view("admin.supplier", [
            "listSupplier" => $listSupplier,
            "ctr" => $ctr+1,
            "countStok" => $countStok,
        ]);
    }

    public function addSupplier(Request $request) {
        $request->validate([
            "nama_supplier" => "max:50",
            "alamat_supplier" => "max:100",
            "kota" => "alpha|max:15",
            "no_telp" => "numeric|digits:12",
            "NPWP" => "numeric|digits:16",
            'nama_bank' => 'alpha_dash|max:10',
            'no_rekening' => 'numeric|digits:12',
            'nama_pajak' => 'alpha_dash|max:50',
            'alamat_pajak' => 'max:100'
        ]);

        $supplier = new Supplier();
        $supplier->kode_supplier = 0;
        $supplier->nama_supplier = $request->input("nama_supplier");
        $supplier->alamat_supplier = $request->input("alamat_supplier");
        $supplier->kota = $request->input("kota");
        $supplier->no_telp = $request->input("no_telp");
        $supplier->NPWP = $request->input("NPWP");
        $supplier->nama_bank = $request->input("nama_bank");
        $supplier->no_rekening = $request->input("no_rekening");
        $supplier->nama_pajak = $request->input("nama_pajak");
        $supplier->alamat_pajak = $request->input("alamat_pajak");
        $supplier->is_active = 1;
        $result = $supplier->save();
        if ($result){
            return redirect()->back()->with("success", "Berhasil Tambah Supplier!");
        }
        else{
            return redirect()->back()->withErrors("Gagal Tambah Supplier!");
        }
    }

    public function formEditSupplier($kode_supplier) {
        $countStok = 0;
        $listSupplier = Supplier::where('kode_supplier', $kode_supplier)->get()->first();
        // dd($listSupplier);

        return view("admin.editSupplier", [
            "listSupplier" => $listSupplier,
            "countStok" => $countStok,
        ]);
    }

    public function editSupplierData($kode_supplier, Request $request) {
        $result = Supplier::where("kode_supplier", $kode_supplier)->update([
            "nama_supplier" => $request->input("nama_supplier"),
            "alamat_supplier" => $request->input("alamat_supplier"),
            "kota" => $request->input("kota"),
            "no_telp" => $request->input("no_telp"),
            "NPWP" => $request->input("NPWP"),
            "nama_bank" => $request->input("nama_bank"),
            "no_rekening" => $request->input("no_rekening"),
            "nama_pajak" => $request->input("nama_pajak"),
            "alamat_pajak" => $request->input("alamat_pajak"),
        ]);

        if ($result){
            return redirect('/admin/supplier')->with("success", "Berhasil Edit Supplier!");
        }
        else{
            return redirect()->back()->withErrors("Gagal Edit Supplier!");
        }
    }

    public function deleteSupplier($kode_supplier) {
        $result = Supplier::where("kode_supplier", $kode_supplier)->update([
            "is_active" => 0
        ]);
        if ($result){
            return redirect()->back()->with("success", "Berhasil Disable Supplier");
        }
        else{
            return redirect()->back()->withErrors("Gagal Disable Supplier");
        }
    }

    public function disableSupplier(){
        $countStok = 0;
        $listSupplier = Supplier::where('is_active', 0)->get();
        // dd($listSupplier);

        return view("admin.disableSupplier", [
            "listSupplier" => $listSupplier,
            "countStok" => $countStok,
        ]);
    }

    public function restoreSupplier($kode_supplier) {
        $result = Supplier::where("kode_supplier", $kode_supplier)->update([
            "is_active" => 1
        ]);
        if ($result){
            return redirect()->back()->with("success", "Berhasil Restore Supplier");
        }
        else{
            return redirect()->back()->withErrors("Gagal Restore Supplier");
        }
    }

    public function laporanPembelian() {
        $countStok = 0;
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $data = Barang::whereBetween('created_at',[$start_date,$end_date])->get();
        } else {
            $data = Barang::latest()->get();
        }

        return view('admin.laporanPembelian', [
            compact('data'),
            "countStok" => $countStok,
        ]);
    }

    public function laporanPenjualan() {
        $countStok = 0;
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $data = H_Transaksi::whereBetween('created_at',[$start_date,$end_date])->get();
        } else {
            $data = H_Transaksi::latest()->get();
        }

        return view('admin.laporanPenjualan', [
            compact('data'),
            "countStok" => $countStok,
        ]);
    }

    public function laporanPembayaranHutang() {
        $countStok = 0;
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $data = Barang::whereBetween('created_at',[$start_date,$end_date])->get();
        } else {
            $data = Barang::latest()->get();
        }

        return view('admin.laporanPembayaranHutang', [
            compact('data'),
            "countStok" => $countStok,
        ]);
    }

    public function laporanPersediaanBarang() {
        $countStok = 0;
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $data = Barang::whereBetween('created_at',[$start_date,$end_date])->get();
        } else {
            $data = Barang::latest()->get();
        }

        return view('admin.laporanPersediaanBarang', [
            compact('data'),
            "countStok" => $countStok,
        ]);
    }

    public function laporanReturPembelian() {
        $countStok = 0;
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $data = Barang::whereBetween('created_at',[$start_date,$end_date])->get();
        } else {
            $data = Barang::latest()->get();
        }

        return view('admin.laporanReturPembelian', [
            compact('data'),
            "countStok" => $countStok,
        ]);
    }

    public function laporanSaldoHutang() {
        $countStok = 0;
        if (request()->start_date || request()->end_date) {
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();
            $data = Barang::whereBetween('created_at',[$start_date,$end_date])->get();
        } else {
            $data = Barang::latest()->get();
        }

        return view('admin.laporanSaldoHutang', [
            compact('data'),
            "countStok" => $countStok,
        ]);
    }
}
