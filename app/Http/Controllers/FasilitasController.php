<?php

namespace App\Http\Controllers;

use App\Fasilitas;
use App\Kategorif;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $fasilitas = Fasilitas::all();
        return view('fasilitas.index',compact('fasilitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategorifs = Kategorif::all();
       return view('fasilitas.create',compact('kategorifs'));
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
            'nama_fasilitas' => 'required|',
            'foto' => 'required|',
            'kategorif_id' => 'required|'
        ]);
        $fasilitas = new Fasilitas;
        $fasilitas->nama_fasilitas = $request->nama_fasilitas;
        $fasilitas->foto = $request->foto;
        $fasilitas->kategorif_id = $request->kategorif_id;
       if ($request->hasFile('foto')){
            $file=$request->file('foto');
            $destinationPath=public_path().'assets/admin/images/icon/';
            $filename=str_random(6).'_'.$file->getClientOriginalName();
            $uploadSuccess= $file->move($destinationPath,$filename);
            $fasilitas->foto= $filename;
        }
        $fasilitas->save();
        return redirect()->route('fasilitas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        $kategorifs = Kategorif::all();
        $selectedKategorif = Fasilitas::findOrFail($id)->kategorif_id;
        return view('fasilitas.edit',compact('fasilitas','kategorifs','selectedKategorif'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'nama_fasilitas' => 'required|',
            'foto' => 'required|',
            'kategorif_id' => 'required|'
        ]);
        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->nama_fasilitas = $request->nama_fasilitas;
        $fasilitas->foto = $request->foto;
        $fasilitas->kategorif_id = $request->kategorif_id;
        if ($request->hasFile('foto')) {
            $uploaded_foto = $request->file('foto');
            $extension = $uploaded_foto->getClientOriginalExtension();
            $filename = md5(time()) . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . '/assets/admin/images/icon/';
            $uploaded_foto->move($destinationPath, $filename);
            $fasilitas->foto=$filename; 
        }
        
        $fasilitas->save();
        return redirect()->route('fasilitas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->delete();
        return redirect()->route('fasilitas.index');
    }
}
