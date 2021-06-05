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
class UnitkerjaController extends Controller
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
        return view('unitkerja.dashboard.home', compact('aset', 'ruang', 'jenis', 'user', 
        'perbaikan', 'menunggu', 'disetujui', 'ditolak', 'proses', 'selesai', 'belumselesai'));
    }







 

        // menampilkan perbaikan
        public function perbaikan(Request $req)
        {
            $data = Perbaikan::get();
            return view('unitkerja.perbaikan.perbaikan',['data'=>$data]);
        }
        public function perbaikanaset(Request $req)
        {
            $da = Perbaikan::select('aset_id')->where('status', '!=', 'selesai',)->where('status', '!=', 'ditolak',)->get();
            $data = Aset::whereNotIn('id', $da)->get(); //pilih data aset dimana id tidak sama dengan aset_id(dimana status nya bukan selesai dan bukan ditolak)
            return view('unitkerja.perbaikan.aset',compact( 'data'));
        }
        public function detailperbaikan($id){ 
            try{
                $id = Crypt::decrypt($id);
                $data= Perbaikan::findOrFail($id);
                return view('unitkerja.perbaikan.detail',compact('data'));
            }catch (DecryptException $e) {
                return abort(404);
            }
        }
        public function deleteperbaikan($id) // BELUM  SAYA  GANTI
        {
           try{
              $idi = Crypt::decrypt($id);
              Perbaikan::find($idi)->delete();
              return redirect()->route('unitkerja-perbaikan');
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
                return view('unitkerja.perbaikan.tambah',compact('data'));
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
            return redirect()->route('unitkerja-perbaikan');
        }
        
        
 



}
