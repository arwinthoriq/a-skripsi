<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Aset;
use App\Ruang;
use App\Jenis;
use App\Perbaikan;
use Illuminate\Support\Facades\Crypt;
use Session;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Contracts\Encryption\DecryptException;
class SarprasController extends Controller
{
    // menampilkan user
    public function user(Request $req)
    {
        $data = User::get();
        return view('user.user',['data'=>$data]);
    }
    






    // menampilkan aset
    public function Aset(Request $req)
    {
        $data = Aset::get();
        return view('aset.aset',['data'=>$data]);
    }
    public function deleteaset($id)
    {
       try{
          $idi = Crypt::decrypt($id);
          Aset::find($idi)->delete();
          return redirect()->route('aset');
       }catch (DecryptException $e) {
          return abort(404);
       }
    }
    public function asetform(){
        $datar = Ruang::get(); // untuk menampilkan data ruang
        $dataj = Jenis::get(); // untuk menampilkan data jenis
        return view('aset.tambah',compact( 'datar','dataj'));
    }
    public function asettambah(Request $request){
        // logika encrypt decrypt pada variabel datar & dataj
        // diambil data jenis & data ruang dari controller
        // lalu id jenis & id ruang diencrypt dihalaman blade
        // kemudian hasil dari encrypt di validasi dihalaman controller
        // setelah itu didecrypt dihalaman controller
        // baru di create / post ke tabel aset melalui halaman controller
        $this->validate($request, [
            'ruang_id'=>'',
            'jenis_id'=>'',
            'nama'=>'required|regex:/^[a-zA-Z ]{2,50}$/',
            'keterangan'=>'required|regex:/^[a-zA-Z0-9., ]{3,100}$/',
            'tahun_pengadaan'=>'required|regex:/^[0-9]{1,4}$/',
            'merek'=>'required|regex:/^[a-zA-Z0-9 ]{1,50}$/',
            'jumlah'=>'required|regex:/^[0-9]{1,10}$/',
            'harga'=>'required|regex:/^[0-9,]{1,20}$/',
            'total_harga'=>'required|regex:/^[0-9,]{1,20}$/',
        ]);
        $idr = Crypt::decrypt($request->ruang_id);
        $idj = Crypt::decrypt($request->jenis_id);
        Aset::create([
            'user_id' => Auth()->id(),
            'ruang_id' => $idr,
            'jenis_id' => $idj,
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'tahun_pengadaan' => $request->tahun_pengadaan,
            'merek' => $request->merek,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'total_harga' => $request->total_harga,
        ]);
        return redirect()->route('aset');
    }







    // menampilkan ruang
    public function ruang(Request $req)
    {
        $data = Ruang::get();
        return view('ruang.ruang',['data'=>$data]);
    }
    public function ruangform(){
        return view('ruang.tambah');
    }
    public function ruangtambah(Request $request){
        $this->validate($request, [
            'nama'=>'required|regex:/^[a-zA-Z ]{3,50}$/',
        ]);
        Ruang::create([
        'user_id' => Auth()->id(),
        'nama' => $request->nama,
        ]);
        return redirect()->route('ruang');
    }







    // menampilkan jenis
    public function jenis(Request $req)
    {
        $data = Jenis::get();
        return view('jenis.jenis',['data'=>$data]);
    }
    public function jenisform(){
        return view('jenis.tambah');
    }
    public function jenistambah(Request $request){
        $this->validate($request, [
            'nama'=>'required|regex:/^[a-zA-Z ]{3,50}$/',
        ]);
        Jenis::create([
        'user_id' => Auth()->id(),
        'nama' => $request->nama,
        ]);
        return redirect()->route('jenis');
    }
        






    // menampilkan perbaikan
    public function perbaikan(Request $req)
    {
        $data = Perbaikan::get();
        return view('perbaikan.perbaikan',['data'=>$data]);
    }
    public function perbaikanaset(Request $req)
    {
        $data = Aset::get();
        $status = Perbaikan::get();
        return view('perbaikan.aset',compact( 'data','status'));
    }
    public function deleteperbaikan($id)
    {
       try{
          $idi = Crypt::decrypt($id);
          Perbaikan::find($idi)->delete();
          return redirect()->route('perbaikan');
       }catch (DecryptException $e) {
          return abort(404);
       }
    }
    public function perbaikanform($id){
        try{
            $id = Crypt::decrypt($id);
            $data= Aset::findOrFail($id);
            $id_plaintext = $data->id;
            Session::put('id_session', $id_plaintext);
            return view('perbaikan.tambah',['data'=>$data]);
        }catch (DecryptException $e) {
            return abort(404);
        }
    }
    public function perbaikantambah(Request $request){
        // diencrypt di blade
        // di passing melalui url
        // didecrypt di controller
        $this->validate($request, [
            'users_id' =>'',
            'aset_id'=>'',
            'keterangan'=>'',
        ]);
        Perbaikan::create([
            'user_id' => Auth()->id(),
            'aset_id' => Session::get('id_session'),
            'keterangan' => $request->keterangan,
        ]);
        return redirect()->route('perbaikan');
    }

}
