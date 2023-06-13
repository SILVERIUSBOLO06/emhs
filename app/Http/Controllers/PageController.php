<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        return view('home',['key' => 'home']);
    }

    public function profile(){
        return view('profile',['key' => 'profile']);
    }

    public function mahasiswa(){
        $mhs = Mahasiswa::orderBy("id",'desc')->paginate(10);
        return view('mahasiswa',['key' => 'mahasiswa','mhs' => $mhs]);
    }

    public function pencarian(Request $request)
    {
        $cari = $request ->q; 
        $mhs = Mahasiswa::where('nama','like','%'.$cari.'%')->paginate(10);
        $mhs->appends($request -> all());
        return view('mahasiswa',['key' => 'mahasiswa','mhs' => $mhs]);
    }

    public function tambah()
    {
        return view('formtambah',['key' => 'mahasiswa']);
    }
    
    public function simpan(Request $req){
        $minat = implode(',' , $req->get('minat'));
        Mahasiswa::create([
            'nim' => $req -> nim,
            'nama' => $req -> nama,
            'gender' => $req -> gender,
            'prodi' => $req -> prodi,
            'minat' => $minat
        ]);
        return redirect('mahasiswa')->with('flash','Data Berhasil di simpan');
    }

    public function edit($nim){
        $mhs = Mahasiswa::find($nim);
        return view('formedit',['key' => 'mahasiswa','mhs' => $mhs]);
    }

    public function contact(){
        return view('contact',['key' => 'contact']);
    }

    public function update($nim, Request $request){
        
        $minat=implode(',',$request->get('minat'));
        $mhs = Mahasiswa::find($nim);
        $mhs->nim=$request->nim;
        $mhs->nama=$request->nama;
        $mhs->gender=$request->gender;
        $mhs->prodi=$request->prodi;
        $mhs->minat=$request->minat;
        $mhs->save();


        return redirect('mahasiswa')->with('flashupdate','Data Berhasil di Ubah');
    }

    public function delete($nim){
        $mhs = Mahasiswa::find($nim);
        $mhs->delete();

        return redirect('mahasiswa')->with('flashdelete','Delete Successfull');
    }
    

    

}
