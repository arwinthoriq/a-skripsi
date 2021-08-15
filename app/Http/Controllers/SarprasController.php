<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Aset;
use App\Ruang;
use App\Jenis;
use App\Perbaikan;
use App\Kebutuhan;
use Illuminate\Support\Facades\Crypt;
use Session;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PDF;
//use Illuminate\Support\Str;
class SarprasController extends Controller
{ 
    /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct()
   {
       $this->middleware('auth');
   }








    // menampilkan dashboard
    public function dashboard()
    {
        $aset = Aset::select('id');
        $ruang = Ruang::select('id');
        $jenis = Jenis::select('id');
        $user = User::select('id');
        $perbaikan = Perbaikan::select('id');
        $menunggu = Perbaikan::select('id')->where('status', '=', 'menunggu');
        $disetujui = Perbaikan::select('id')->where('status', '=', 'disetujui');
        $ditolak = Perbaikan::select('id')->where('status', '=', 'ditolak');
        $proses = Perbaikan::select('id')->where('status', '=', 'proses');
        $selesai = Perbaikan::select('id')->where('status', '=', 'selesai');
        $belumselesai = Perbaikan::select('id')->where('status', '!=', 'selesai')->where('status', '!=', 'ditolak');
        $kebutuhan = Kebutuhan::select('id');
        $kebutuhan_menunggu = Kebutuhan::select('id')->where('status', '=', 'menunggu');
        $kebutuhan_disetujui = Kebutuhan::select('id')->where('status', '=', 'disetujui');
        $kebutuhan_ditolak = Kebutuhan::select('id')->where('status', '=', 'ditolak');
        $kebutuhan_proses = Kebutuhan::select('id')->where('status', '=', 'proses');
        $kebutuhan_selesai = Kebutuhan::select('id')->where('status', '=', 'selesai');
        $kebutuhan_belumselesai = Kebutuhan::select('id')->where('status', '!=', 'selesai')->where('status', '!=', 'ditolak');
        return view('sarpras.dashboard.home', compact('aset', 'ruang', 'jenis', 'user', 
        'perbaikan', 'menunggu', 'disetujui', 'ditolak', 'proses', 'selesai', 'belumselesai', 
        'kebutuhan','kebutuhan_menunggu', 'kebutuhan_disetujui', 'kebutuhan_ditolak', 'kebutuhan_proses', 'kebutuhan_selesai', 'kebutuhan_belumselesai'));
    }







    // menampilkan user
    public function user(Request $req)
    {
        $data = User::get();
        return view('sarpras.user.user',['data'=>$data]);
    }
    public function userform(){
        return view('sarpras.user.tambah');
    }
    public function usertambah(Request $request){
        $this->validate($request, [
            'nama'=>'required|regex:/^[a-zA-Z ]{1,50}$/',
            'email' => 'required|regex:/^[a-zA-Z0-9@., ]{1,50}$/', 'string', 'email', 'unique:users',
            'password' => 'required', 'string', 'min:8',
            'akses'=>'',
        ]);
        User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'akses' => $request->akses,
        ]);
        return redirect()->route('sarpras-user');
    }
    public function deleteuser($id)
    {
       try{
          $idi = Crypt::decrypt($id);
          User::find($idi)->delete();
         // Aset::find($idi)->where('user_id', $idi)->delete();
          return redirect()->route('sarpras-user');
       }catch (DecryptException $e) {
          return abort(404);
       }
    }
    






    // menampilkan aset
    public function Aset(Request $req)
    {
        $das = Aset::distinct()->get('tahun_pengadaan'); //solved
        $data = Aset::get();
        return view('sarpras.aset.aset',compact('data','das'));
    }
    public function detailaset($id){ 
        try{
            $id = Crypt::decrypt($id);
            $data= Aset::findOrFail($id);
            return view('sarpras.aset.detail',compact('data'));
        }catch (DecryptException $e) {
            return abort(404);
        }
    }
    public function formupdateaset($id){ 
        try{
            $id = Crypt::decrypt($id);
            $data= aset::findOrFail($id);
            $edit_aset = $data->id;
            Session::put('edit_aset', $edit_aset);
            $datar = Ruang::get(); // untuk menampilkan data ruang
            $dataj = Jenis::get(); // untuk menampilkan data jenis
            return view('sarpras.aset.edit',compact('data', 'datar', 'dataj'));
        }catch (DecryptException $e) {
            return abort(404);
        }
    }
    public function editupdateaset(Request $request)
    {
            $idedit_aset = Session::get('edit_aset');
            \Validator::make($request->all(), 
            [
                'ruang_id'=>'',
                'jenis_id'=>'',
                'nama'=>'required|regex:/^[a-zA-Z ]{2,50}$/',
                'keterangan'=>'required|regex:/^[a-zA-Z0-9., ]{3,100}$/',
                'tahun_pengadaan'=>'required|regex:/^[0-9]{1,4}$/',
                'merek'=>'required|regex:/^[a-zA-Z0-9 ]{1,50}$/',
                'jumlah'=>'required|regex:/^[0-9]{1,10}$/',
                'harga'=>'required|regex:/^[0-9,]{1,20}$/',
                'total_harga'=>'required|regex:/^[0-9,]{1,20}$/',
            ])->validate();
            $idruang = Crypt::decrypt($request->ruang_id);
            $idjenis = Crypt::decrypt($request->jenis_id);
                $field = [
                    'ruang_id' => $idruang,
                    'jenis_id' => $idjenis,
                    'nama' => $request->nama,
                    'keterangan' => $request->keterangan,
                    'tahun_pengadaan' => $request->tahun_pengadaan,
                    'merek' => $request->merek,
                    'jumlah' => $request->jumlah,
                    'harga' => $request->harga,
                    'total_harga' => $request->total_harga,
                ];
            $result = Aset::where('id', $idedit_aset)->update($field);
            if($result){
                return redirect()->route('sarpras-aset');
            } else{
                return back();
            }
    }
    public function deleteaset($id)
    {
       try{
          $idi = Crypt::decrypt($id);
          Aset::find($idi)->delete();
          return back();
         // return redirect()->route('sarpras-aset');
       }catch (DecryptException $e) {
          return abort(404);
       }
    }
    public function asetform(){
        $datar = Ruang::get(); // untuk menampilkan data ruang
        $dataj = Jenis::get(); // untuk menampilkan data jenis
        return view('sarpras.aset.tambah',compact( 'datar','dataj'));
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
        return redirect()->route('sarpras-aset');
    }
    public function printaset(Request $req)
    {
        $this->validate($req, [
            'Tahun'=>'required|regex:/^[0-9]{4}$/',
        ]);
        $data = Aset::where('tahun_pengadaan','=', $req->Tahun)->get();
       if( $data){
            $dth = $req->Tahun;
            $pdf = PDF::loadview('sarpras.aset.print',compact( 'data', 'dth'));
            return $pdf->download('laporan-aset.pdf');
            // return $pdf->stream();
       } else{
           return back();
       }
    }








    // menampilkan ruang
    public function ruang(Request $req)
    {
        $data = Ruang::get();
        return view('sarpras.ruang.ruang',['data'=>$data]);
    }
    public function ruangform(){
        return view('sarpras.ruang.tambah');
    }
    public function ruangtambah(Request $request){
        $this->validate($request, [
            'nama'=>'required|regex:/^[a-zA-Z ]{3,50}$/',
        ]);
        Ruang::create([
        'user_id' => Auth()->id(),
        'nama' => $request->nama,
        ]);
        return redirect()->route('sarpras-ruang');
    }
    public function formupdateruang($id){ 
        try{
            $id = Crypt::decrypt($id);
            $data= Ruang::findOrFail($id);
            $edit_ruang = $data->id;
            Session::put('edit_ruang', $edit_ruang);
            return view('sarpras.ruang.edit',compact('data'));
        }catch (DecryptException $e) {
            return abort(404);
        }
    }
    public function editupdateruang(Request $request)
    {
            $idedit_ruang = Session::get('edit_ruang');
            \Validator::make($request->all(), 
            [
                'nama'=>'required|regex:/^[a-zA-Z ]{3,50}$/',
            ])->validate();
                $field = [
                    'nama' => $request->nama,
                ];
            $result = Ruang::where('id', $idedit_ruang)->update($field);
            if($result){
                return redirect()->route('sarpras-ruang');
            } else{
                return back();
            }
    }
    public function deleteruang($id)
    {
       try{
          $idi = Crypt::decrypt($id);
          Ruang::find($idi)->delete();
          return back();
         // return redirect()->route('sarpras-aset');
       }catch (DecryptException $e) {
          return abort(404);
       }
    }







    // menampilkan jenis
    public function jenis(Request $req)
    {
        $data = Jenis::get();
        return view('sarpras.jenis.jenis',['data'=>$data]);
    }
    public function jenisform(){
        return view('sarpras.jenis.tambah');
    }
    public function jenistambah(Request $request){
        $this->validate($request, [
            'nama'=>'required|regex:/^[a-zA-Z ]{3,50}$/',
        ]);
        Jenis::create([
        'user_id' => Auth()->id(),
        'nama' => $request->nama,
        ]);
        return redirect()->route('sarpras-jenis');
    }
    public function formupdatejenis($id){ 
        try{
            $id = Crypt::decrypt($id);
            $data= Jenis::findOrFail($id);
            $edit_jenis = $data->id;
            Session::put('edit_jenis', $edit_jenis);
            return view('sarpras.jenis.edit',compact('data'));
        }catch (DecryptException $e) {
            return abort(404);
        }
    }
    public function editupdatejenis(Request $request)
    {
            $idedit_jenis = Session::get('edit_jenis');
            \Validator::make($request->all(), 
            [
                'nama'=>'required|regex:/^[a-zA-Z ]{3,50}$/',
            ])->validate();
                $field = [
                    'nama' => $request->nama,
                ];
            $result = Jenis::where('id', $idedit_jenis)->update($field);
            if($result){
                return redirect()->route('sarpras-jenis');
            } else{
                return back();
            }
    }
    public function deletejenis($id)
    {
       try{
          $idi = Crypt::decrypt($id);
          Jenis::find($idi)->delete();
          return back();
         // return redirect()->route('sarpras-aset');
       }catch (DecryptException $e) {
          return abort(404);
       }
    }
        






    // menampilkan perbaikan
    public function perbaikan(Request $req)
    {
        $dp = Perbaikan::selectRaw('YEAR(created_at) as year')->distinct()->get();
        $g = $dp->pluck('year');
        $data = Perbaikan::get();
        return view('sarpras.perbaikan.perbaikan',compact( 'data', 'g'));
    }
    public function perbaikanaset(Request $req)
    {
        $da = Perbaikan::select('aset_id')->where('status', '!=', 'selesai',)->where('status', '!=', 'ditolak',)->get();
        $data = Aset::whereNotIn('id', $da)->get(); //pilih data aset dimana id tidak sama dengan aset_id(dimana status nya bukan selesai dan bukan ditolak)
        return view('sarpras.perbaikan.aset',compact( 'data'));
    }
    public function detailperbaikan($id){ 
        try{
            $id = Crypt::decrypt($id);
            $data= Perbaikan::findOrFail($id);
            return view('sarpras.perbaikan.detail',compact('data'));
        }catch (DecryptException $e) {
            return abort(404);
        }
    }
    public function deleteperbaikan($id) // BELUM  SAYA  GANTI
    {
       try{
          $idi = Crypt::decrypt($id);
          Perbaikan::find($idi)->delete();
          return redirect()->route('sarpras-perbaikan');
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
            return view('sarpras.perbaikan.tambah',compact('data'));
        }catch (DecryptException $e) {
            return abort(404);
        }
    }
    public function perbaikantambah(Request $request){ 
        $this->validate($request, [
            'user_id' =>'',
            'aset_id' =>'',
            'keterangan'=>'required|regex:/^[a-zA-Z0-9., ]{3,100}$/',
        ]);
        Perbaikan::create([
            'user_id' => Auth()->id(),
            'aset_id' => Session::get('id_session'),
            'keterangan' => $request->keterangan,
        ]);
        return redirect()->route('sarpras-perbaikan');
    }
    public function perbaikanformstatusupdate($id){ 
        try{
            $id = Crypt::decrypt($id);
            $data= Perbaikan::findOrFail($id);
            $status_perbaikan = $data->id;
            Session::put('status_perbaikan', $status_perbaikan);
            return view('sarpras.perbaikan.status',compact('data'));
        }catch (DecryptException $e) {
            return abort(404);
        }
    }
    public function perbaikanstatusupdate(Request $req) // ERROR 
    {
            $ids = Session::get('status_perbaikan');
            \Validator::make($req->all(), 
            [
                'status'=>'',
            ])->validate();
                $field = [
                    'status'=>$req->status,
                ];
            $result = Perbaikan::where('id', $ids)->update($field);
            if($result){
               // Session::flash('sukses', 'Data Berhasil Disimpan');
                return back();
            } else{
               // Session::flash('gagal', 'Data Gagal Disimpan');
                return back();
            }
    }
    public function printperbaikan(Request $req)  // mengambil Y pada kolom created_at untuk di ambil data nya dan di print
    {
        $this->validate($req, [
            'Tahun'=>'required|regex:/^[0-9]{4}$/',
        ]);
        $data = Perbaikan::whereYear('created_at','=', $req->Tahun)->get();
       if( $data){
            $j = Perbaikan::select('id')->whereYear('created_at','=', $req->Tahun)->get();
            $dth = $req->Tahun;
            $pdf = PDF::loadview('sarpras.perbaikan.print',compact( 'data', 'dth', 'j'));
            return $pdf->download('laporan-perbaikan.pdf');
            // return $pdf->stream();
       } else{
           return back();
       }
    }






     // menampilkan kebutuhan
     public function kebutuhan(Request $req)
     {
        $das = Kebutuhan::distinct()->get('tahun');
         $data = Kebutuhan::get();
         return view('sarpras.kebutuhan.kebutuhan',compact('data','das'));
     }
     public function detailkebutuhan($id){ 
         try{
             $id = Crypt::decrypt($id);
             $data= Kebutuhan::findOrFail($id);
             return view('sarpras.kebutuhan.detail',compact('data'));
         }catch (DecryptException $e) {
             return abort(404);
         }
     }
     public function deletekebutuhan($id) // BELUM  SAYA  GANTI
     {
        try{
           $idi = Crypt::decrypt($id);
           Kebutuhan::find($idi)->delete();
           return redirect()->route('sarpras-kebutuhan');
        }catch (DecryptException $e) {
           return abort(404);
        }
     }
     //public function kebutuhanform()
     //{ 
       // $datar = Ruang::get(); // untuk menampilkan data ruang
        //$dataj = Jenis::get(); // untuk menampilkan data jenis
        //return view('sarpras.kebutuhan.tambah',compact( 'datar','dataj'));
     //}
     //public function kebutuhantambah(Request $request){ 
       //  $this->validate($request, [
         //   'ruang_id' => '',
           // 'jenis_id' => '',
            //'nama'=>'required|regex:/^[a-zA-Z ]{2,50}$/',
            //'tahun'=>'required|regex:/^[0-9]{1,4}$/',
            //'keterangan'=>'required|regex:/^[a-zA-Z0-9., ]{3,100}$/',
            //'merek'=>'required|regex:/^[a-zA-Z0-9 ]{1,50}$/',
            //'jumlah'=>'required|regex:/^[0-9]{1,10}$/',
            //'harga'=>'required|regex:/^[0-9,]{1,20}$/',
            //'total_harga'=>'required|regex:/^[0-9,]{1,20}$/',
         //]);
         //$idr = Crypt::decrypt($request->ruang_id);
         //$idj = Crypt::decrypt($request->jenis_id);
         //Kebutuhan::create([
             //'user_id' => Auth()->id(),
             //'ruang_id' => $idr,
             //'jenis_id' => $idj,
             //'nama' => $request->nama,
             //'tahun' => $request->tahun,
             //'keterangan' => $request->keterangan,
             //'merek' => $request->merek,
             //'jumlah' => $request->jumlah,
             //'harga' => $request->harga,
             //'total_harga' => $request->total_harga,
         //]);
         //return redirect()->route('sarpras-kebutuhan');
    // }
     public function printkebutuhan(Request $req)
     {
         $this->validate($req, [
             'Tahun'=>'required|regex:/^[0-9]{4}$/',
         ]);
         $data = Kebutuhan::where('tahun','=', $req->Tahun)->get();
        if( $data){
             $dth = $req->Tahun;
             $pdf = PDF::loadview('sarpras.kebutuhan.print',compact( 'data', 'dth'));
             return $pdf->download('laporan-pengadaan.pdf');
             // return $pdf->stream();
        } else{
            return back();
        }
     }
 



}
