<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Transaksi;
use App\Models\TanyaJawab;
use App\Models\Size;
use App\Models\FotoTransaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
class WebsiteController extends Controller
{
    public function index()
    {
        $dataproduct = DB::table('product')
    ->leftJoin('transaksi', 'product.id', '=', 'transaksi.product_id')
    ->select('product.id', 'product.nama', 'product.gambar', 'product.deskripsi','product.harga','product.category_id', DB::raw('COUNT(transaksi.product_id) as total_calls'))
    ->groupBy('product.id', 'product.nama', 'product.gambar', 'product.deskripsi','product.harga','product.category_id')
    ->orderBy('total_calls', 'desc')
    ->take(3)
    ->get();
    //    dd($products);
        $data_tanya_jawab = TanyaJawab::all();
        $dataslider = Slider::all();
        return view('website.index',compact('dataslider','dataproduct','data_tanya_jawab'));
    }
    public function CategoryDetail($id)
    {
        $data = Product::where('category_id', $id)->get();
        // dd($products);
       return view('website.category-detail',compact('data'));
    }
    public function ProductDetail($id)
    {
        $sizes = size::all();
        $data = Product::find($id);
        $productRandom = Product::inRandomOrder()->whereNotIn('id', [$id])->take(4)->get();
        return view('website.product-detail',compact('sizes','data','productRandom'));
    }
    public function getHarga($id)
    {
        $size = Size::find($id);
        $harga = $size ? $size->harga : null;
        return response()->json(['harga' => $harga]);
    }  
    public function addtocart(Request $request)
    {             
        $data = new Cart;
        $data->product_id = $request->product_id;
        $data->user_id = auth()->user()->id;
        $data->quantity = $request->quantity;
        $data->size_id = $request->size_id;
        $data->harga_dan_size = $request->harga_dan_size;        
        $data->toppings = $request->toppings;
        $data->save();
        return redirect()->back()->with('berhasil','Produk Telah Berhasil Di tambahkan Ke Keranjang');
    }
    public function cart()
    {
        // $data = Cart::where('user_id', auth::user()->id)->with('size')->get();
        $data = Cart::where('user_id', auth::user()->id)->get();

        $hitungdata = Cart::where('user_id', auth::user()->id)->count();

        // dd($data);
        return view('website.cart',compact('data','hitungdata'));
        
    }
    public function cartDestroy(cart $cart)
    {
        
        
        Cart::destroy($cart->id);     

        return redirect()->back()->with('berhasil', 'Data Produk Berhasil Di Hapus'); 
    }

    public function checkout()
    {
        $data = Cart::where('user_id', auth::user()->id)->get();
        // dd($data);
        return view('website.checkout',compact('data'));
    }
    public function CheckoutData(Request $request)
    {
       

        $dataCart = Cart::where('user_id', auth()->user()->id)->get();
        $fototransaksi = $request->file('foto_transaksi');
        
        foreach ($dataCart as $cart) {
            foreach ($fototransaksi as $foto) {                         
              $fototransaksiPath = $foto->store('img-foto-transaksi');
        
            Transaksi::create([
                'product_id' => $cart['product_id'],
                'user_id' => auth()->user()->id,
                'total' => $request->input('total'),
                'quantity' => $cart['quantity'],
                'size_id' => $cart['size_id'],
                'toppings' => $cart['toppings'],
                'foto_transaksi' => $fototransaksiPath,
            ]);
                }
                    }           
            
            // Hapus data cart yang sudah dimasukkan ke transaksi
            Cart::where('user_id', auth()->user()->id)->delete();

            // Perbarui data di table_name_2
            DB::connection('mysql')->table('users')
                ->where('id', auth()->user()->id)
                ->update([
                    'name' => $request->input('name'),
                    'no_telepon' => $request->input('no_telepon'),
                    'alamat' => $request->input('alamat'),
                    'catatan' => $request->input('catatan'),                
                ]);
              
                $user = auth()->user(); 
                $checkout = Transaksi::where('user_id', auth()->user()->id)->select('foto_transaksi','total','created_at','proses','product_id')
                ->distinct()
                ->latest()                                
                ->first();
                
                $data = [
                    'user' => $user,
                    'checkout' => $checkout,
                ];
                
                Mail::send('emails', $data, function ($message) use ($user) {
                    $message->to($user->email);
                    $message->subject('Rincian Pembelian');
                });
                
            return redirect('terimakasih');
        }
        public function terimakasih()
        {
            return view('website.terimakasih');
        }
    
        public function RiwayatTransaksi()
        {
            
        $data = Transaksi::where('user_id', auth()->user()->id)->select('foto_transaksi','total','created_at','proses')
        ->distinct()
        ->get();
        // dd($data);
        return view('website.riwayat-transaksi',compact('data'));
        }               

        public function RiwayatTransaksiDetail($created_at)
        {
            $data = Transaksi::where('created_at', $created_at)->with('size')->get();
            // dd($data);
            if ($data) {
                // Jika transaksi ditemukan, lakukan sesuatu (misalnya tampilkan dalam view)
                return view('website.riwayat-transaksi-detail', compact('data'));
            } else {
                // Jika transaksi tidak ditemukan, tampilkan pesan error atau redirect ke halaman lain
                return redirect()->back()->with('error', 'Transaksi tidak ditemukan.');
            }
        }
  
}
