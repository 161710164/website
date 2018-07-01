<?php

namespace App\Http\Controllers;

use App\Galeri;
use App\Kategorig;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeris = Galeri::with('Kategorig')->get();
        return view('galeri.index',compact('galeris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategorigs = Kategorig::all();
        return view('galeri.create',compact('kategorigs'));
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
            'judul_galeri' => 'required|',
            'foto' => 'required',
            'konten' => 'required',
            'kategorig_id' => 'required|'
            
        ]);
        $galeris = new Galeri;
        $galeris->judul_galeri = $request->judul_galeri;
        $galeris->foto = $request->foto;
        $galeris->konten = $request->konten;
        $galeris->kategorig_id = $request->kategorig_id;
        if ($request->hasFile('foto')){
            $file=$request->file('foto');
            $destinationPath=public_path().'assets/admin/images/icon/';
            $filename=str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess= $file->move($destinationPath,$filename);
            $galeris->foto= $filename;
        }
        $galeris->save();
        return redirect()->route('galeri.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function show(Galeri $galeri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $galeris = Galeri::findOrFail($id);
        $kategorigs = Kategorig::all();
        $selectedKategorig = Galeri::findOrFail($id)->kategorig_id;
        return view('galeri.edit',compact('galeris','kategorigs','selectedKategorig'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'judul_galeri' => 'required|',
            'foto' => 'required',
            'konten' => 'required',
            'kategorig_id' => 'required|'
            
        ]);
        $galeris = Galeri::findOrFail($id);
        $galeris->judul_galeri = $request->judul_galeri;
        $galeris->foto = $request->foto;
        $galeris->konten = $request->konten;
        $galeris->kategorig_id = $request->kategorig_id;
        if ($request->hasFile('foto')) {
            $uploaded_foto = $request->file('foto');
            $extension = $uploaded_foto->getClientOriginalExtension();
            $filename = md5(time()) . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . '/assets/admin/images/icon/';
            $uploaded_foto->move($destinationPath, $filename);
            $galeris->foto=$filename; 
        }
        $galeris->save();
        return redirect()->route('galeri.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $galeris = Galeri::findOrFail($id);
        $galeris->delete();
        return redirect()->route('galeri.index');
    }
}
