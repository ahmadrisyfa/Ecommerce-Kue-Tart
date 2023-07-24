<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();
        return view('admin.product.index',compact('data'));
    }
    public function create()
    {
        $dataCategory = Category::all();
        return view('admin.product.create',compact('dataCategory'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama'=>'required|max:255',
            'category_id'=>'required|max:255',
            'harga'=>'required|max:255',
            'deskripsi'=>'required',
            'gambar'=>'image|required',
        ]);
        if($request->deskripsi){
            $validatedData['deskripsi'] =nl2br($request->deskripsi);
        }
        $validatedData['gambar']= $request->file('gambar')->store('img-product');
        Product::create($validatedData);       
        return redirect('admin/product')->with('berhasil','Data Telah Berhasil Di tambahkan!');
    }
    public function show($id)
    {
        $data = Product::find($id);
        // dd($data);  
        return view('admin.product.detail',compact('data'));
    }
    public function edit($id)
    {
        $dataCategory = Category::all();
        $data = Product::find($id);
        return view('admin.product.edit',compact('data','dataCategory'));
    }
    public function update(Request $request, $id)
    {
     $rules=[
            'nama'=>'required|max:255',
            'category_id'=>'required|max:255',
            'harga'=>'required|max:255',
            'deskripsi'=>'required',
            'gambar'=>'image',
        ];

        $validatedData = $request->validate($rules);
        
        if($request->file('gambar')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('img-product');
        }
        if($request->deskripsi){
            $validatedData['deskripsi'] =nl2br($request->deskripsi);
        }
        Product::Where('id',$id)
        ->update($validatedData);
        
        return redirect('admin/product')->with('berhasil','Data Berhasil Di Update');
    }
    public function destroy(product $product)
    {
        
        Storage::delete($product->gambar);
        
        Product::destroy($product->id);     

        return redirect('admin/product')->with('berhasil', 'Data Berhasil Di Hapus'); 
    }

}
