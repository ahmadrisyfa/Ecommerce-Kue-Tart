<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    public function index()
    {
        $data = Slider::all();
        return view('admin.slider.index',compact('data'));
    }
    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul'=>'required|max:255',
            'deskripsi'=>'required',
            'gambar'=>'image|required',
        ]);
        $validatedData['gambar']= $request->file('gambar')->store('img-slider');
        Slider::create($validatedData);       
        return redirect('admin/slider')->with('berhasil','Data Telah Berhasil Di tambahkan!');
        
    }
    // public function show($id)
    // {
    //     $data = Slider::find($id);
    //     // dd($data);  
    //     return view('admin.slider.detail',compact('data'));
    // }
    public function edit($id)
    {
        $data = Slider::find($id);
        return view('admin.slider.edit',compact('data'));
    }
    public function update(Request $request, $id)
    {
     $rules=[
        'judul'=>'required|max:255',
        'deskripsi'=>'required',
        'gambar'=>'image',
        ];

        $validatedData = $request->validate($rules);
        
        if($request->file('gambar')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('img-slider');
        }
        Slider::Where('id',$id)
        ->update($validatedData);
        
        return redirect('admin/slider')->with('berhasil','Data Berhasil Di Update');
    }

    public function destroy(slider $slider)
    {
        
        Storage::delete($slider->gambar);
        
        Slider::destroy($slider->id);     

        return redirect('admin/slider')->with('berhasil', 'Data Berhasil Di Hapus'); 
    }

}
