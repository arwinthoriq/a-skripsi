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
             $status_kebutuhan = $data->id;
             Session::put('status_kebutuhan', $status_kebutuhan);
             return view('keuangan.kebutuhan.status',compact('data'));
         }catch (DecryptException $e) {
             return abort(404);
         }
     }
     public function kebutuhanstatusupdate(Request $req) // ERROR 
     {
             $ids = Session::get('status_kebutuhan');
             \Validator::make($req->all(), 
             [
                 'status'=>'',
             ])->validate();
                 $field = [
                     'status'=>$req->status,
                 ];
             $result = Kebutuhan::where('id', $ids)->update($field);
             if($result){
                // Session::flash('sukses', 'Data Berhasil Disimpan');
                 return back();
             } else{
                // Session::flash('gagal', 'Data Gagal Disimpan');
                 return back();
             }
     }
 



}
