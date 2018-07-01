<?php

namespace App\Http\Controllers;

use App\Ekskul;
use Illuminate\Http\Request;

class EkskulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ekskuls = Ekskul::all();
        return view('ekskul.index',compact('ekskuls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('ekskul.create',compact('ekskuls'));
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
            'nama_ekskul' => 'required|',
            'foto' => 'required',
            'konten' => 'required'
        ]);
        $ekskuls = new Ekskul;
        $ekskuls->nama_ekskul = $request->nama_ekskul;
        $ekskuls->foto = $request->foto;
        $ekskuls->konten = $request->konten;
        if ($request->hasFile('foto')){
            $file=$request->file('foto');
            $destinationPath=public_path().'assets/admin/images/icon/';
            $filename=str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess= $file->move($destinationPath,$filename);
            $ekskuls->foto= $filename;
        }
        $ekskuls->save();
        return redirect()->route('ekskul.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ekskul  $ekskul
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ekskul  $ekskul
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $ekskuls = Ekskul::findOrFail($id);
        return view('ekskul.edit',compact('ekskuls')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ekskul  $ekskul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'nama_ekskul' => 'required|',
            'foto' => 'required',
            'konten' => 'required'
        ]);
        $ekskuls = Ekskul::findOrFail($id);
        $ekskuls->nama_ekskul = $request->nama_ekskul;
        $ekskuls->foto = $request->foto;
        $ekskuls->konten = $request->konten;
        if ($request->hasFile('foto')) {
            $uploaded_foto = $request->file('foto');
            $extension = $uploaded_foto->getClientOriginalExtension();
            $filename = md5(time()) . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . '/assets/admin/images/icon/';
            $uploaded_foto->move($destinationPath, $filename);
            $ekskuls->foto=$filename; 
        }
        $ekskuls->save();
        return redirect()->route('ekskul.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ekskul  $ekskul
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ekskuls = Ekskul::findOrFail($id);
        $ekskuls->delete();
        return redirect()->route('ekskul.index');
    }
}
