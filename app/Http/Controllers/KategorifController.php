<?php

namespace App\Http\Controllers;

use App\Kategorif;
use Illuminate\Http\Request;

class KategorifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategorifs = Kategorif::all();
        return view('kategorif.index',compact('kategorifs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategorif.create');
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
            'nama_fasilitas' => 'required|'
        ]);
        $kategorifs = new Kategorif;
        $kategorifs->nama_fasilitas = $request->nama_fasilitas;
        $kategorifs->save();
        return redirect()->route('kategorif.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kategorif  $kategorif
     * @return \Illuminate\Http\Response
     */
    public function show(Kategorif $kategorif)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kategorif  $kategorif
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategorifs = Kategorif::findOrFail($id);
        return view('kategorif.edit',compact('kategorifs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kategorif  $kategorif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request,[
            'nama_fasilitas' => 'required|'
        ]);
        $kategorifs = Kategorif::findOrFail($id);
        $kategorifs->nama_fasilitas = $request->nama_fasilitas;
        $kategorifs->save();
        return redirect()->route('kategorif.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kategorif  $kategorif
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategorifs = Kategorif::findOrFail($id);
        $kategorifs->delete();
        return redirect()->route('kategorif.index');
    }
}
