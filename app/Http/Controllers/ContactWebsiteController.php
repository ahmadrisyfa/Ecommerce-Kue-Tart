<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactWebsite;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ContactWebsiteController extends Controller
{
    public function index()
    {
        $data = ContactWebsite::all();
        return view('admin.contact-website.index',compact('data'));
    }
    public function create()
    {
        return view('admin.contact-website.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email'=>'max:255',
            'no_telp1'=>'required|max:255',
            'no_telp2'=>'max:255',
            'alamat'=>'required',
        ]);
        // $validatedData['gambar']= $request->file('gambar')->store('img-contact-website');
        ContactWebsite::create($validatedData);       
        return redirect('admin/contact-website')->with('berhasil','Data Telah Berhasil Di tambahkan!');
        
    }
    public function show($id)
    {
        $data = ContactWebsite::find($id);
        // dd($data);  
        return view('admin.contact-website.detail',compact('data'));
    }
    public function edit($id)
    {
        $data = ContactWebsite::find($id);
        return view('admin.contact-website.edit',compact('data'));
    }
    public function update(Request $request, $id)
    {
     $rules=[
        'email'=>'max:255',
        'no_telp1'=>'required|max:255',
        'no_telp2'=>'max:255',
        'alamat'=>'required',
        ];

        $validatedData = $request->validate($rules);
        
        // if($request->file('gambar')){
        //     if($request->oldImage){
        //         Storage::delete($request->oldImage);
        //     }
        //     $validatedData['gambar'] = $request->file('gambar')->store('img-contact-website');
        // }
        ContactWebsite::Where('id',$id)
        ->update($validatedData);
        
        return redirect('admin/contact-website')->with('berhasil','Data Berhasil Di Update');
    }

    public function destroy(contactwebsite $contactwebsite)
    {
        
        // Storage::delete($contactwebsite->gambar);
        
        ContactWebsite::destroy($contactwebsite->id);     

        return redirect('admin/contact-website')->with('berhasil', 'Data Berhasil Di Hapus'); 
    }

}
