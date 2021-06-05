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
class KeuanganController extends Controller
{ 

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
        return view('keuangan.dashboard.home', compact('aset', 'ruang', 'jenis', 'user', 
        'perbaikan', 'menunggu', 'disetujui', 'ditolak', 'proses', 'selesai', 'belumselesai', 
        'kebutuhan','kebutuhan_menunggu', 'kebutuhan_disetujui', 'kebutuhan_ditolak', 'kebutuhan_proses', 'kebutuhan_selesai', 'kebutuhan_belumselesai'));
    }







 

    // menampilkan aset
    public function Aset(Request $req)
    {
        $data = Aset::get();
        return view('keuangan.aset.aset',['data'=>$data]);
    }
    public function detailaset($id){ 
        try{
            $id = Crypt::decrypt($id);
            $data= Aset::findOrFail($id);
            return view('keuangan.aset.detail',compact('data'));
        }catch (DecryptException $e) {
            return abort(404);
        }
    }










     // menampilkan kebutuhan
     public function kebutuhan(Request $req)
     {
         $data = Kebutuhan::get();
         return view('keuangan.kebutuhan.kebutuhan',['data'=>$data]);
     }
     public function detailkebutuhan($id){ 
         try{
             $id = Crypt::decrypt($id);
             $data= Kebutuhan::findOrFail($id);
             return view('keuangan.kebutuhan.detail',compact('data'));
         }catch (DecryptException $e) {
             return abort(404);
         }
     }
     public function deletekebutuhan($id) // BELUM  SAYA  GANTI
     {
        try{
           $idi = Crypt::decrypt($id);
           Kebutuhan::find($idi)->delete();
           return redirect()->route('kebutuhan');
        }catch (DecryptException $e) {
           return abort(404);
        }
     }
     public function kebutuhanformstatusupdate($id){ 
         try{
             $id = Crypt::decrypt($id);
             $data= Kebutuhan::findOrFail($id);
             $status_kebutuhan = $data->id; //isi dari kolom id 
             Session::put('status_kebutuhan', $status_kebutuhan);
             return view('keuangan.kebutuhan.status',compact('data'));
            //if(Kebutuhan::where('status', '=', 'proses')->where('id', $status_kebutuhan_selesai)->get()) {
               // return view('keuangan.kebutuhan.selesai',compact('data'));
            //}else {
            //    return abort(404);
           // }
         }catch (DecryptException $e) {
             return abort(404);
         }
     }
     public function kebutuhanstatusupdate(Request $req) 
     {
             $ids = Session::get('status_kebutuhan');
             \Validator::make($req->all(), 
             [
                 'status'=>'',
             ])->validate();
                 $field = [
                     'status'=>$req->status,
                 ];  
                 $result= Kebutuhan::where('id', $ids)->update($field);
                 if($result){
                    return back();
                 }else{
                    return back();
                 }
                                      // jika menunggu maka diupdate menjadi disetujui
           //      $result_m = Kebutuhan::where('status', '=', 'menunggu')->where('id', $ids)->update($field);
                                          // jika disetujui maka diupdate menjadi proses dan dialihkan ke halaman selesai
            //     $result_dj = Kebutuhan::where('status', '=', 'disetujui')->where('id', $ids)->update($field);
                                          // di halaman selesai jika proses maka diupdate menjadi selesai 
            //     $result_p = Kebutuhan::where('status', '=', 'proses')->where('id', $ids)->update($field);
            // if($result_m){
            //    return back();
            // }elseif($result_dj){
               // return url('/keuangan/home/kebutuhan/status/selesai',['id'=>Crypt::encrypt($ids)]);
               // return route('keuangan-kebutuhan-status-selesai');
            //    return back();
            // }elseif($result_p){
            //     return route('keuangan-kebutuhan-status-selesai');
                //return back();
            // }else{
            //    return back();
            // }
     }

     public function kebutuhanformstatusupdateselesai($id){ 
        try{
            $id = Crypt::decrypt($id);
            $data= Kebutuhan::findOrFail($id);
            $status_kebutuhan_selesai = $data->id;
            Session::put('status_kebutuhan_selesai', $status_kebutuhan_selesai);
            $user_id_kebutuhan = $data->user_id;
            $ruang_id_kebutuhan = $data->ruang_id;
            $jenis_id_kebutuhan = $data->jenis_id;
            $nama_kebutuhan = $data->nama;
            $keterangan_kebutuhan = $data->keterangan;
            $tahun_pengadaan_kebutuhan = $data->tahun;
            $merek_kebutuhan = $data->merek;
            $jumlah_kebutuhan = $data->jumlah;
            $harga_kebutuhan = $data->harga;
            $total_harga_kebutuhan = $data->total_harga;
            Session::put('user_id_kebutuhan', $user_id_kebutuhan);
            Session::put('ruang_id_kebutuhan', $ruang_id_kebutuhan);
            Session::put('jenis_id_kebutuhan', $jenis_id_kebutuhan);
            Session::put('nama_kebutuhan', $nama_kebutuhan);
            Session::put('keterangan_kebutuhan', $keterangan_kebutuhan);
            Session::put('tahun_pengadaan_kebutuhan', $tahun_pengadaan_kebutuhan);
            Session::put('merek_kebutuhan', $merek_kebutuhan);
            Session::put('jumlah_kebutuhan', $jumlah_kebutuhan);
            Session::put('harga_kebutuhan', $harga_kebutuhan);
            Session::put('total_harga_kebutuhan', $total_harga_kebutuhan);
                return view('keuangan.kebutuhan.selesai',compact('data'));
        }catch (DecryptException $e) {
            return abort(404);
        }
    }
    public function kebutuhanstatusupdateselesai(Request $req) // ERROR 
    {
          // $statusk = Session::get('statusk');
            $ids_selesai = Session::get('status_kebutuhan_selesai');
            $user_id_kebutuhan = Session::get('user_id_kebutuhan');
            $ruang_id_kebutuhan = Session::get('ruang_id_kebutuhan');
            $jenis_id_kebutuhan = Session::get('jenis_id_kebutuhan');
            $nama_kebutuhan = Session::get('nama_kebutuhan');
            $keterangan_kebutuhan = Session::get('keterangan_kebutuhan');
            $tahun_pengadaan_kebutuhan = Session::get('tahun_pengadaan_kebutuhan');
            $merek_kebutuhan = Session::get('merek_kebutuhan');
            $jumlah_kebutuhan = Session::get('jumlah_kebutuhan');
            $harga_kebutuhan = Session::get('harga_kebutuhan');
            $total_harga_kebutuhan = Session::get('total_harga_kebutuhan');
            \Validator::make($req->all(), 
            [
                'status'=>'',
            ])->validate();
            // bagaimana caranya agar  jika status kebutuhan nya selesai maka data kebutuhan ter create secara otomatis ke tabel aaset
               $field_aset = [
                  'user_id' => $user_id_kebutuhan,
                  'ruang_id' => $ruang_id_kebutuhan,
                  'jenis_id' => $jenis_id_kebutuhan,
                  'nama' => $nama_kebutuhan,
                  'keterangan' => $keterangan_kebutuhan,
                  'tahun_pengadaan' => $tahun_pengadaan_kebutuhan,
                  'merek' => $merek_kebutuhan,
                  'jumlah' => $jumlah_kebutuhan,
                  'harga' => $harga_kebutuhan,
                  'total_harga' => $total_harga_kebutuhan,
               ];
               Aset::create($field_aset);
                $field_selesai = [
                    'status'=>$req->status,
                ];
               $result_selesai = Kebutuhan::where('id', $ids_selesai)->update($field_selesai);
            if($result_selesai){
               //Session::flash('sukses','haha');
               return redirect()->route('keuangan-kebutuhan');
               return back();
            }else{
               //Session::flash('gagal', 'Data Gagal Disimpan');
               return back();
            }
            //Kebutuhan::where('status', '=', 'menunggu')->where('id', $ids)->update($field);
            //Kebutuhan::where('status', '=', 'disetujui')->where('id', $ids)->update($field);
    }
     
 



}
