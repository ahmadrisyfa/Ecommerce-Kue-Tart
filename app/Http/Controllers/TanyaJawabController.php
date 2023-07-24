<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TanyaJawab;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class TanyaJawabController extends Controller
{
    public function index()
    {
        $data = TanyaJawab::all();
        return view('admin.tanya-jawab.index',compact('data'));
    }
    public function create()
    {
        return view('admin.tanya-jawab.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'soal'=>'required',
            'jawaban'=>'required',
        ]);
        if($request->jawaban){
            $validatedData['jawaban'] =nl2br($request->jawaban);
        }
        TanyaJawab::create($validatedData);       
        return redirect('admin/tanya-jawab')->with('berhasil','Data Telah Berhasil Di tambahkan!');
    }
    public function edit($id)
    {

        $data = TanyaJawab::find($id);
        return view('admin.tanya-jawab.edit',compact('data'));
    }
    public function update(Request $request, $id)
    {
       $rules=[
        'soal'=>'required',
        'jawaban'=>'required',
        ];
        $validatedData = $request->validate($rules);            
        if($request->jawaban){
            $validatedData['jawaban'] =nl2br($request->jawaban);
        }
        TanyaJawab::Where('id',$id)
        ->update($validatedData);
        
        return redirect('admin/tanya-jawab')->with('berhasil','Data Berhasil Di Update');
    }

    public function destroy(TanyaJawab $TanyaJawab)
    {
        
        
        TanyaJawab::destroy($TanyaJawab->id);     

        return redirect('admin/tanya-jawab')->with('berhasil', 'Data Berhasil Di Hapus'); 
    }
}
