<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Kategori;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikels = Artikel::with('Kategori')->get();
        return view('artikel.index',compact('artikels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('artikel.create',compact('kategoris'));
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
            'judul' => 'required|',
            'foto' => 'required',
            'konten' => 'required',
            'kategori_id' => 'required|'
            
        ]);
        $artikels = new Artikel;
        $artikels->judul = $request->judul;
        $artikels->foto = $request->foto;
        $artikels->konten = $request->konten;
        $artikels->kategori_id = $request->kategori_id;
        if ($request->hasFile('foto')){
            $file=$request->file('foto');
            $destinationPath=public_path().'assets/admin/images/icon/';
            $filename=str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess= $file->move($destinationPath,$filename);
            $artikels->foto= $filename;
        }
        $artikels->save();
        return redirect()->route('artikel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikels = Artikel::findOrFail($id);
        $kategoris = Kategori::all();
        $selectedKategori = Artikel::findOrFail($id)->kategori_id;
        return view('artikel.edit',compact('artikels','kategoris','selectedKategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'judul' => 'required|',
            'foto' => 'required',
            'konten' => 'required',
            'kategori_id' => 'required|'
        ]);
        $artikels = Artikel::findOrFail($id);   
        $artikels->judul = $request->judul;
        $artikels->foto = $request->foto;
        $artikels->konten = $request->konten;
        $artikels->kategori_id = $request->kategori_id;
        if ($request->hasFile('foto')) {
            $uploaded_foto = $request->file('foto');
            $extension = $uploaded_foto->getClientOriginalExtension();
            $filename = md5(time()) . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . '/assets/admin/images/icon/';
            $uploaded_foto->move($destinationPath, $filename);
            $artikels->foto=$filename; 
        }
        $artikels->save();
        return redirect()->route('artikel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikels = Artikel::findOrFail($id);
        $artikels->delete();
        return redirect()->route('artikel.index');
    }
}
