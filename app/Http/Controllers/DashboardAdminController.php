<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Transaksi;
use DB;
class DashboardAdminController extends Controller
{
    public function index()
    {
        $totaluser = User::where('admin', 0)->count();
        $totaladmin = User::where('admin', 1)->count();
        $totalProduct = Product::get()->count();
        $totalCategory = Category::get()->count();
        $totalterjual = Transaksi::get()->count();

        
        return view('template.admin.index',compact('totalProduct','totalCategory','totaluser','totaladmin','totalterjual'));
    }
    public function transaksi()
    {
       

        $data = Transaksi::select('foto_transaksi','user_id','total','created_at','proses')
        ->distinct()
        ->get();
    
        // dd($data);
        return view('admin.transaksi.index',compact('data'));
    }
    public function transaksidetail($created_at)
    {
        $data = Transaksi::with('size')->where('created_at', $created_at)->get();
        // dd($data);
        if ($data) {
            // Jika transaksi ditemukan, lakukan sesuatu (misalnya tampilkan dalam view)
            return view('admin.transaksi.detail', compact('data'));
        } else {
            // Jika transaksi tidak ditemukan, tampilkan pesan error atau redirect ke halaman lain
            return redirect()->back()->with('error', 'Transaksi tidak ditemukan.');
        }

    }
    public function transaksiSearch(Request $request){
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');


        $data = transaksi::select('foto_transaksi','user_id','total','created_at','proses')
                            ->distinct()
                            ->where('created_at', '>=', $fromDate)
                            ->where('created_at', '<=', $toDate)                          
                            ->get();
        return view('admin.transaksi.index',compact('data'));
    }
    public function Formtransaksidetailcetak()
    {
        return view('admin.transaksi.FormCetak');
    }
    public function TransaksiCetakSemuaData()
    {
        $data = Transaksi::select('foto_transaksi','user_id','total','created_at')
        ->distinct()
        ->get();
        // dd($data);
        return view('admin.transaksi.cetak-semua-data',compact('data'));
    }
    public function TransaksiCetakaDataPerTanggal(Request $request)
    {
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');


        $data = transaksi::select('foto_transaksi','user_id','total','created_at')
                            ->distinct()
                            ->where('created_at', '>=', $fromDate)
                            ->where('created_at', '<=', $toDate)                          
                            ->get();
        return view('admin.transaksi.cetak-semua-data',compact('data'));

    }
    public function KonfirmasiTransaksi($created_at)
    {
        $data = Transaksi::with('size')->where('created_at', $created_at)->get();
        $kode = Transaksi::with('size')->where('created_at', $created_at)->first();

        // dd($data);
      
            // Jika transaksi ditemukan, lakukan sesuatu (misalnya tampilkan dalam view)
            return view('admin.transaksi.konfirmasi-transaksi', compact('data','kode'));
       
    }
    public function Prosestransaksidetail(Request $request, $created_at)
    {
        $rules=[
            'proses'=>'required|max:255',
           
        ];

        $validatedData = $request->validate($rules);
        
    
        Transaksi::Where('created_at',$created_at)
        ->update($validatedData);
        
        return redirect('admin/transaksi')->with('berhasil','Data Berhasil Di Update');
    }
}
