<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Mapel::all()->sortByDesc('id');
        $no = 1;

        return view('page.mapel.index', compact('data', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.mapel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = Mapel::where('kode_mapel', $request->kode_mapel)->doesntExist();
        if ($check) {
            $data = new Mapel;
            $data->kode_mapel = $request->kode_mapel;
            $data->nama_mapel = $request->nama_mapel;
            $data->save();
            return redirect()->route('mapel.index')->with('notifberhasil', 'Berhasil! Data Berhasil Ditambahkan');
        } else {
            return redirect()->route('mapel.index')->with('notifgagal', 'Gagal! Kode Mata Pelajaran Sudah Ada');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Mapel::where('id', $id)->first();

        return view('page.mapel.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Mapel::where('id', $id)->first();
        $data->kode_mapel = $request->kode_mapel;
        $data->nama_mapel = $request->nama_mapel;
        $data->save();
        return redirect()->route('mapel.index')->with('notifberhasil', 'Berhasil! Data Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Mapel::find($id);
        $data->delete();
        return redirect()->route('mapel.index')->with('notifberhasil', 'Berhasil! Data Berhasil Dihapus!');
    }
}
