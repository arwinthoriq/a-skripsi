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
        $das = Aset::distinct()->get('tahun_pengadaan'); //solved
        $data = Aset::get();
        return view('keuangan.aset.aset',compact('data','das'));
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
    public function printaset(Request $req)
    {
        $this->validate($req, [
            'Tahun'=>'required|regex:/^[0-9]{4}$/',
        ]);
        $data = Aset::where('tahun_pengadaan','=', $req->Tahun)->get();
       if( $data){
            $dth = $req->Tahun;
            $pdf = PDF::loadview('keuangan.aset.print',compact( 'data', 'dth'));
            return $pdf->download('laporan-aset.pdf');
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
         return view('keuangan.kebutuhan.kebutuhan',compact('data','das'));
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
            // bagaimana caranya agar  jika status kebutuhan nya selesai   maka data kebutuhan ter create secara otomatis ke tabel aaset
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
    public function printkebutuhan(Request $req)
    {
        $this->validate($req, [
            'Tahun'=>'required|regex:/^[0-9]{4}$/',
        ]);
        $data = Kebutuhan::where('tahun','=', $req->Tahun)->get();
       if( $data){
            $dth = $req->Tahun;
            $pdf = PDF::loadview('keuangan.kebutuhan.print',compact( 'data', 'dth'));
            return $pdf->download('laporan-kebutuhan.pdf');
            // return $pdf->stream();
       } else{
           return back();
       }
    }











    // menampilkan perbaikan
    public function perbaikan(Request $req)
    {
        $dp = Perbaikan::selectRaw('YEAR(created_at) as year')->distinct()->get();
        $g = $dp->pluck('year');
        $data = Perbaikan::get();
        return view('keuangan.perbaikan.perbaikan',compact( 'data', 'g'));
    }
    public function perbaikanaset(Request $req)
    {
        $da = Perbaikan::select('aset_id')->where('status', '!=', 'selesai',)->where('status', '!=', 'ditolak',)->get();
        $data = Aset::whereNotIn('id', $da)->get(); //pilih data aset dimana id tidak sama dengan aset_id(dimana status nya bukan selesai dan bukan ditolak)
        return view('keuangan.perbaikan.aset',compact( 'data'));
    }
    public function detailperbaikan($id){ 
        try{
            $id = Crypt::decrypt($id);
            $data= Perbaikan::findOrFail($id);
            return view('keuangan.perbaikan.detail',compact('data'));
        }catch (DecryptException $e) {
            return abort(404);
        }
    }
    public function deleteperbaikan($id) // BELUM  SAYA  GANTI
    {
        try{
            $idi = Crypt::decrypt($id);
            Perbaikan::find($idi)->delete();
            return redirect()->route('keuangan-perbaikan');
        }catch (DecryptException $e) {
            return abort(404);
        }
    }
    //public function perbaikanform($id){ 
        //try{
           // $id = Crypt::decrypt($id);
           // $data= Aset::findOrFail($id);
           // $id_plaintext = $data->id;
           // Session::put('id_session', $id_plaintext);
         //   return view('keuangan.perbaikan.tambah',compact('data'));
       // }catch (DecryptException $e) {
         //   return abort(404);
       // }
    ///}
    //public function perbaikantambah(Request $request){ 
       // $this->validate($request, [
            //'user_id' =>'',
           // 'aset_id' =>'',
          //  'keterangan'=>'required|regex:/^[a-zA-Z0-9., ]{3,100}$/',
        //]);
        //Perbaikan::create([
            //'user_id' => Auth()->id(),
           // 'aset_id' => Session::get('id_session'),
         //   'keterangan' => $request->keterangan,
       // ]);
       // return redirect()->route('keuangan-perbaikan');
    //}
    public function perbaikanformstatusupdate($id){ 
        try{
            $id = Crypt::decrypt($id);
            $data= Perbaikan::findOrFail($id);
            $status_perbaikan = $data->id;
            Session::put('status_perbaikan', $status_perbaikan);
            return view('keuangan.perbaikan.status',compact('data'));
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
                $pdf = PDF::loadview('keuangan.perbaikan.print',compact( 'data', 'dth', 'j'));
                return $pdf->download('laporan-perbaikan.pdf');
                // return $pdf->stream();
        } else{
            return back();
        }
    }

     
 



}
