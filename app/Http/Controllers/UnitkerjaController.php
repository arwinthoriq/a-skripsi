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

        $perbaikan = kebutuhan::select('id')->where(['user_id' => auth()->user()->id])->get();
        
        $menunggu = kebutuhan::select('id')->where('status', '=', 'menunggu')->where(['user_id' => auth()->user()->id])->get();
        $disetujui = kebutuhan::select('id')->where('status', '=', 'disetujui')->where(['user_id' => auth()->user()->id])->get();
        $ditolak = kebutuhan::select('id')->where('status', '=', 'ditolak')->where(['user_id' => auth()->user()->id])->get();
        $proses = kebutuhan::select('id')->where('status', '=', 'proses')->where(['user_id' => auth()->user()->id])->get();
        $selesai = kebutuhan::select('id')->where('status', '=', 'selesai')->where(['user_id' => auth()->user()->id])->get();

        $belumselesai = kebutuhan::select('id')->where('status', '!=', 'selesai')->where('status', '!=', 'ditolak')->where(['user_id' => auth()->user()->id])->get();
        return view('unitkerja.dashboard.home', compact('aset', 'ruang', 'jenis', 'user', 
        'perbaikan', 'menunggu', 'disetujui', 'ditolak', 'proses', 'selesai', 'belumselesai'));
    }







 

        // menampilkan perbaikan
       // public function perbaikan(Request $req)
        //{
          //  $dp = Perbaikan::selectRaw('YEAR(created_at) as year')->distinct()->where(['user_id' => auth()->user()->id])->get();
           // $g = $dp->pluck('year');
            //$data = Perbaikan::where(['user_id' => auth()->user()->id])->get();
            //return view('unitkerja.perbaikan.perbaikan',compact( 'data', 'g'));
       // }
       // public function perbaikanaset(Request $req)
        //{
          //  $da = Perbaikan::select('aset_id')->where('status', '!=', 'selesai',)->where('status', '!=', 'ditolak',)->get();
            //$data = Aset::whereNotIn('id', $da)->get(); //pilih data aset dimana id tidak sama dengan aset_id(dimana status nya bukan selesai dan bukan ditolak)
            //return view('unitkerja.perbaikan.aset',compact( 'data'));
       // }
        //public function detailperbaikan($id){ 
          //  try{
            //    $id = Crypt::decrypt($id);
              //  $data= Perbaikan::findOrFail($id);
                //return view('unitkerja.perbaikan.detail',compact('data'));
            //}catch (DecryptException $e) {
             //   return abort(404);
           // }
        //}
        //public function deleteperbaikan($id) // BELUM  SAYA  GANTI
        //{
          // try{
            //  $idi = Crypt::decrypt($id);
              //Perbaikan::find($idi)->delete();
              //return redirect()->route('unitkerja-perbaikan');
           //}catch (DecryptException $e) {
             // return abort(404);
          // }
       // }
       // public function perbaikanform($id){ 
         //   try{
           //     $id = Crypt::decrypt($id);
             //   $data= Aset::findOrFail($id);
               // $id_plaintext = $data->id;
               // Session::put('id_session', $id_plaintext);
                //return view('unitkerja.perbaikan.tambah',compact('data'));
            //}catch (DecryptException $e) {
              //  return abort(404);
           // }
       // }
        //public function perbaikantambah(Request $request){ 
          //  $this->validate($request, [
            //    'user_id' =>'',
              //  'aset_id' =>'',
                //'keterangan'=>'required|regex:/^[a-zA-Z0-9., ]{3,100}$/',
            //]);
            //Perbaikan::create([
              //  'user_id' => Auth()->id(),
               // 'aset_id' => Session::get('id_session'),
                //'keterangan' => $request->keterangan,
            //]);
            //return redirect()->route('unitkerja-perbaikan');
        //}
        //public function printperbaikan(Request $req)  // mengambil Y pada kolom created_at untuk di ambil data nya dan di print
       // {
         //   $this->validate($req, [
           //     'Tahun'=>'required|regex:/^[0-9]{4}$/',
            //]);
            //$data = Perbaikan::whereYear('created_at','=', $req->Tahun)->where(['user_id' => auth()->user()->id])->get();
           //if( $data){
             //   $j = Perbaikan::select('id')->whereYear('created_at','=', $req->Tahun)->where(['user_id' => auth()->user()->id])->get();
               // $dth = $req->Tahun;
               // $pdf = PDF::loadview('unitkerja.perbaikan.print',compact( 'data', 'dth', 'j'));
                //return $pdf->download('laporan-perbaikan.pdf');
                
           //} else{
             //  return back();
          // }
       // }









        // menampilkan kebutuhan
        public function kebutuhan(Request $req)
        {
            $das = Kebutuhan::distinct()->get('tahun');
            $data = Kebutuhan::get();
            return view('unitkerja.kebutuhan.kebutuhan',compact('data','das'));
        }
        public function detailkebutuhan($id){ 
            try{
                $id = Crypt::decrypt($id);
                $data= Kebutuhan::findOrFail($id);
                return view('unitkerja.kebutuhan.detail',compact('data'));
            }catch (DecryptException $e) {
                return abort(404);
            }
        }
        public function deletekebutuhan($id) // BELUM  SAYA  GANTI
        {
           try{
              $idi = Crypt::decrypt($id);
              Kebutuhan::find($idi)->delete();
              return redirect()->route('unitkerja-kebutuhan');
           }catch (DecryptException $e) {
              return abort(404);
           }
        }
        public function kebutuhanform()
        { 
           $datar = Ruang::get(); // untuk menampilkan data ruang
           $dataj = Jenis::get(); // untuk menampilkan data jenis
           return view('unitkerja.kebutuhan.tambah',compact( 'datar','dataj'));
        }
        public function kebutuhantambah(Request $request){ 
            $this->validate($request, [
               'ruang_id' => '',
               'jenis_id' => '',
               'nama'=>'required|regex:/^[a-zA-Z ]{2,50}$/',
               'tahun'=>'required|regex:/^[0-9]{1,4}$/',
               'keterangan'=>'required|regex:/^[a-zA-Z0-9., ]{3,100}$/',
               'merek'=>'required|regex:/^[a-zA-Z0-9 ]{1,50}$/',
               'jumlah'=>'required|regex:/^[0-9]{1,10}$/',
               'harga'=>'required|regex:/^[0-9,]{1,20}$/',
               'total_harga'=>'required|regex:/^[0-9,]{1,20}$/',
            ]);
            $idr = Crypt::decrypt($request->ruang_id);
            $idj = Crypt::decrypt($request->jenis_id);
            Kebutuhan::create([
                'user_id' => Auth()->id(),
                'ruang_id' => $idr,
                'jenis_id' => $idj,
                'nama' => $request->nama,
                'tahun' => $request->tahun,
                'keterangan' => $request->keterangan,
                'merek' => $request->merek,
                'jumlah' => $request->jumlah,
                'harga' => $request->harga,
                'total_harga' => $request->total_harga,
            ]);
            return redirect()->route('unitkerja-kebutuhan');
        }
        public function printkebutuhan(Request $req)
        {
            $this->validate($req, [
                'Tahun'=>'required|regex:/^[0-9]{4}$/',
            ]);
            $data = Kebutuhan::where('tahun','=', $req->Tahun)->get();
           if( $data){
                $dth = $req->Tahun;
                $pdf = PDF::loadview('unitkerja.kebutuhan.print',compact( 'data', 'dth'));
                return $pdf->download('laporan-kebutuhan.pdf');
                // return $pdf->stream();
           } else{
               return back();
           }
        }
        
        
 



}
