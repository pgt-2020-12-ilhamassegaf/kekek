<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index(Request $request){
        if($request->has('cari')){
            $data_dosen =\App\Dosen::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data_dosen =\App\Dosen::all();

        }

        return view('dosen.index', ['data_dosen'=>$data_dosen]);
    }

    public function create(Request $request){
        $user=new\App\User;
        $user->name=$request->nama_dosen;
        $user->role='dosen';
        $user->nim=$request->nip;
        $user->email=$request->email;
        $user->password=bcrypt('12345678');
        $user->remember_token=Str::random(60);
        $user->save();

        $request->request->add(['user_id'=>$user->id]);
        $dosen=\App\Dosen::create($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $dosen->avatar = $request->file('avatar')->getClientOriginalName();
            $dosen->save();}
        return redirect('/dosen')->with('sukses','Data Berhasil di Input');
        //return $request->all();
    }

    public function edit ($id){
        $dosen=\App\Dosen::find($id);
        return view('dosen/edit',['dosen'=> $dosen]);

    }
    public function update(Request $request,$id){
        $dosen= \App\Dosen::find($id);
       $dosen-> update($request->all());
       if($request->hasFile('avatar')){
           $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
           $dosen->avatar = $request->file('avatar')->getClientOriginalName();
           $dosen->save();
       }
        return redirect('/dosen')->with('sukses','Data Berhasil di Edit');
    }
    public function delete ($id){
        $dosen=\App\Dosen::find($id);
        $dosen->delete($dosen);
        return redirect('/dosen')->with('sukses','Data Berhasil di Hapus');

    }
    public function profile ($id){
        $dosen=\App\Dosen::find($id);
        return view('dosen.profile',['dosen'=> $dosen]);

    }
}
