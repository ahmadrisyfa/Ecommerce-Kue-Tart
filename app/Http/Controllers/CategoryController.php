<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class CategoryController extends Controller
{
    
    public function index()
    {
        $data = Category::all();
        return view('admin.category.index',compact('data'));
    }
    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama'=>'required|max:255',
            'gambar'=>'image|required',
            'deskripsi'=>'max:2000'
        ]);
        $validatedData['gambar']= $request->file('gambar')->store('img-category');
        Category::create($validatedData);       
        return redirect('admin/category')->with('berhasil','Data Telah Berhasil Di tambahkan!');
        
    }
    public function edit($id)
    {

        $data = category::find($id);
        return view('admin.category.edit',compact('data'));
    }
    public function update(Request $request, $id)
    {
       $rules=[
            'nama'=>'required|max:255',
            'gambar'=>'image|file',
            'deskripsi'=>'max:2000'
        ];

        $validatedData = $request->validate($rules);
        
        if($request->file('gambar')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('img-category');
        }
        category::Where('id',$id)
        ->update($validatedData);
        
        return redirect('admin/category')->with('berhasil','Data Berhasil Di Update');
    }

    public function destroy(category $category)
    {
        
        Storage::delete($category->gambar);
        
        category::destroy($category->id);     

        return redirect('admin/category')->with('berhasil', 'Data Berhasil Di Hapus'); 
    }

}
