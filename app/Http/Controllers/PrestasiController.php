<?php

namespace App\Http\Controllers;

use App\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestasis = Prestasi::all();
        return view('prestasi.index',compact('prestasis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prestasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'foto' => 'required|',
            'nama_prestasi' => 'required|',
             'deskripsi' => 'required|'
        ]);
        $prestasis = new Prestasi;
        $prestasis->nama_prestasi = $request->nama_prestasi;
        $prestasis->deskripsi = $request->deskripsi;
        //upload foto
        if ($request->hasFile('foto')){
            $file=$request->file('foto');
            $destinationPath=public_path().'/assets/admin/images/icon/';
            $filename=str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess= $file->move($destinationPath,$filename);
            $prestasis->foto= $filename;
        }
        $prestasis->save();
        return redirect()->route('prestasi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function show(Prestasi $prestasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prestasis = Prestasi::findOrFail($id);
        return view('prestasi.edit',compact('prestasis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'foto' => 'required|',
            'nama_prestasi' => 'required|',
             'deskripsi' => 'required|'
        ]);
        $prestasis = Prestasi::findOrFail($id);
        $prestasis->nama_prestasi = $request->nama_prestasi;
        $prestasis->deskripsi = $request->deskripsi;
        //upload foto
        if ($request->hasFile('foto')){
            $file=$request->file('foto');
            $destinationPath=public_path().'/assets/admin/images/icon/';
            $filename=str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess= $file->move($destinationPath,$filename);
            $prestasis->foto= $filename;
        $prestasis->save();
    }
        return redirect()->route('prestasi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prestasis = Prestasi::findOrFail($id);
         $prestasis->delete();
        return redirect()->route('prestasi.index');
    }
}
