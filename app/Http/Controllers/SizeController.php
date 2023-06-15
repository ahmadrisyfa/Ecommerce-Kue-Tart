<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\size;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class SizeController extends Controller
{
    public function index()
    {
        $data = Size::all();
        return view('admin.size.index',compact('data'));
    }
    public function create()
    {
        return view('admin.size.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama'=>'required',
            'harga'=>'required'
        ]);

        Size::create($validatedData);       
        return redirect('admin/size')->with('berhasil','Data Telah Berhasil Di tambahkan!');
        
    }
    public function edit($id)
    {

        $data = Size::find($id);
        return view('admin.size.edit',compact('data'));
    }
    public function update(Request $request, $id)
    {
       $rules=[
            'nama'=>'required',
            'harga'=>'required'
        ];

        $validatedData = $request->validate($rules);
               
        Size::Where('id',$id)
        ->update($validatedData);
        
        return redirect('admin/size')->with('berhasil','Data Berhasil Di Update');
    }

    public function destroy(size $size)
    {
        
        
        Size::destroy($size->id);     

        return redirect('admin/size')->with('berhasil', 'Data Berhasil Di Hapus'); 
    }

}
