<?php

namespace App\Http\Controllers;

use App\Models\Piket;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Piket::orderBy('id', 'desc')->with('get_kelas')->with('get_siswa')->get();
        $no = 1;
        return view('page.piket.index', compact('data', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        $selectkelas = [];
        foreach ($kelas as $item) {
            $selectkelas[$item->kode_kelas] = $item->nama_kelas;
        }
        return view('page.piket.create', compact('selectkelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Piket;
        $data->kode_kelas = $request->kode_kelas;
        $data->nis = $request->nis;
        $data->hari = $request->hari;
        $data->save();
        return redirect()->route('piket.index')->with('notifberhaasil', 'Berhasil! Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Piket  $piket
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$param)
    {
        $data = Siswa::where('kode_kelas', $request->code)->get();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Piket  $piket
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = Kelas::all();
        $data = Piket::where('id', $id)->with('get_siswa')->first();
        $selectkelas = [];
        foreach ($kelas as $item) {
            $selectkelas[$item->kode_kelas] = $item->nama_kelas;
        }
        return view('page.piket.edit', compact('selectkelas', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Piket  $piket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Piket::find($id);
        $data->kode_kelas = $request->kode_kelas;
        $data->nis = $request->nis;
        $data->hari = $request->hari;
        $data->save();
        return redirect()->route('piket.index')->with('notifberhasil', 'Berhasil! Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Piket  $piket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Piket::find($id)->delete();
        return redirect()->route('piket.index')->with('notifberhasil', 'Berhasil! Data Berhasil Dihapus!');
    }
}
