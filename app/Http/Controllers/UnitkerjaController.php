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
            $dp = Perbaikan::selectRaw('YEAR(created_at) as year')->distinct()->where(['user_id' => auth()->user()->id])->get();
            $g = $dp->pluck('year');
            $data = Perbaikan::where(['user_id' => auth()->user()->id])->get();
            return view('unitkerja.perbaikan.perbaikan',compact( 'data', 'g'));
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
        public function printperbaikan(Request $req)  // mengambil Y pada kolom created_at untuk di ambil data nya dan di print
        {
            $this->validate($req, [
                'Tahun'=>'required|regex:/^[0-9]{4}$/',
            ]);
            $data = Perbaikan::whereYear('created_at','=', $req->Tahun)->where(['user_id' => auth()->user()->id])->get();
           if( $data){
                $j = Perbaikan::select('id')->whereYear('created_at','=', $req->Tahun)->where(['user_id' => auth()->user()->id])->get();
                $dth = $req->Tahun;
                $pdf = PDF::loadview('unitkerja.perbaikan.print',compact( 'data', 'dth', 'j'));
                return $pdf->download('laporan-perbaikan.pdf');
                // return $pdf->stream();
           } else{
               return back();
           }
        }
        
        
 



}
