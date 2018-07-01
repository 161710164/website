<?php

namespace App\Http\Controllers;

use App\Staf;
use Illuminate\Http\Request;

class StafController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stafs = Staf::all();
        return view('staf.index',compact('stafs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staf.create');
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
            'nama_staf' => 'required|',
             'jabatan' => 'required|'
        ]);
        $stafs = new Staf;
        $stafs->nama_staf = $request->nama_staf;
        $stafs->jabatan = $request->jabatan;
        //upload foto
        if ($request->hasFile('foto')){
            $file=$request->file('foto');
            $destinationPath=public_path().'/assets/admin/images/icon/';
            $filename=str_random(6).'_'.$file->getClientOriginalName();
            $uploadSucces= $file->move($destinationPath,$filename);
            $stafs->foto= $filename;
        }
        $stafs->save();
        return redirect()->route('staf.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Staf  $staf
     * @return \Illuminate\Http\Response
     */
    public function show(Staf $staf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Staf  $staf
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $stafs = Staf::findOrFail($id);
        return view('staf.edit',compact('stafs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Staf  $staf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'nama_staf' => 'required|',
             'jabatan' => 'required|'
        ]);
        $stafs = Staf::findOrFail($id);
        $stafs->nama_staf = $request->nama_staf;
        $stafs->jabatan = $request->jabatan;

        if ($request->hasFile('foto')) {
            $uploaded_foto = $request->file('foto');
            $extension = $uploaded_foto->getClientOriginalExtension();
            $filename = md5(time()) . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . '/assets/admin/images/icon/';
            $uploaded_foto->move($destinationPath, $filename);
            $stafs->foto=$filename; 

            $stafs->save();
        }
        return redirect()->route('staf.index');
        }     
            

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Staf  $staf
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stafs = Staf::findOrFail($id);
        $stafs->delete();
        return redirect()->route('staf.index');
    }
}
