<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NameWebsite;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class NameWebsiteController extends Controller
{
    public function index()
    {
        $data = NameWebsite::all();
        return view('admin.name-website.index',compact('data'));
    }
    public function create()
    {
        return view('admin.name-website.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama'=>'required|max:20',
            'gambar'=>'image|required',
        ]);
        $validatedData['gambar']= $request->file('gambar')->store('img-name-website');
        NameWebsite::create($validatedData);       
        return redirect('admin/name-website')->with('berhasil','Data Telah Berhasil Di tambahkan!');
        
    }
    public function edit($id)
    {

        $data = NameWebsite::find($id);
        return view('admin.name-website.edit',compact('data'));
    }
    public function update(Request $request, $id)
    {
       $rules=[
        'nama'=>'required|max:20',
        'gambar'=>'image',
        ];

        $validatedData = $request->validate($rules);
        
        if($request->file('gambar')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('img-name-website');
        }
        NameWebsite::Where('id',$id)
        ->update($validatedData);
        
        return redirect('admin/name-website')->with('berhasil','Data Berhasil Di Update');
    }

    public function destroy(namewebsite $namewebsite)
    {
        
        Storage::delete($namewebsite->gambar);
        
        NameWebsite::destroy($namewebsite->id);     

        return redirect('admin/name-website')->with('berhasil', 'Data Berhasil Di Hapus'); 
    }

}
