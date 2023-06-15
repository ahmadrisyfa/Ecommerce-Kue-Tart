<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
class AdminUserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('admin.admin-user.index',compact('data'));
    }  
  
    public function edit($id)
    {

        $data = User::find($id);
        return view('admin.admin-user.edit',compact('data'));
    }
    public function update(Request $request, $id)
    {
       $rules=[            
            'admin'=>'max:2000'
        ];

        $validatedData = $request->validate($rules);
             
        User::Where('id',$id)
        ->update($validatedData);
        
        return redirect('admin/admin-user')->with('berhasil','Data Berhasil Di Update');
    }

  
}
