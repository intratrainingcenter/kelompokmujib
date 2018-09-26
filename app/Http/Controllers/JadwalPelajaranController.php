<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Mapel;
use App\Models\Kelas;
use Illuminate\Support\Facades\DB;

class JadwalPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Jadwal::orderBy('id', 'desc')->with('get_kelas')->with('get_mapel')->get();
        $no = 1;
        $kelas = Kelas::all();

        return view('page.jadwal.index', compact('data', 'no', 'kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mapel = Mapel::all();
        $kelas = Kelas::all();

        $selectkelas = [];
        $selectmapel = [];
        foreach ($kelas as $item) {
            $selectkelas[$item->kode_kelas] = $item->nama_kelas;
        }
        foreach ($mapel as $item) {
            $selectmapel[$item->kode_mapel] = $item->nama_mapel;
        }
        return view('page.jadwal.create',compact('selectkelas', 'selectmapel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Jadwal;
        $data->kode_kelas = $request->kode_kelas;
        $data->hari       = $request->hari;
        $data->kode_mapel = $request->kode_mapel;
        $data->save();

        return redirect()->route('jadwal.index')->with('notifberhasil', 'Berhasil! Data Berhasil Ditambahkan');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $data = Jadwal::where('kode_kelas', $id)->with('get_kelas')->with('get_mapel')->get();
        $no = 1;
        return view('page.jadwal.show', compact('data', 'no'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mapel = Mapel::all();
        $kelas = Kelas::all();
        $data = Jadwal::where('id', $id)->first();
        

        $selectkelas = [];
        $selectmapel = [];
        foreach ($kelas as $item) {
            $selectkelas[$item->kode_kelas] = $item->nama_kelas;
        }
        foreach ($mapel as $item) {
            $selectmapel[$item->kode_mapel] = $item->nama_mapel;
        }
        return view('page.jadwal.edit',compact('selectkelas', 'selectmapel', 'data'));
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
        $data = Jadwal::find($id);
        $data->kode_kelas = $request->kode_kelas;
        $data->hari       = $request->hari;
        $data->kode_mapel = $request->kode_mapel;
        $data->save();

        return redirect()->route('jadwal.index')->with('notifberhasil', 'Berhasil! Data Berhasil Diedit!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jadwal::find($id)->delete();

        return redirect()->route('jadwal.index')->with('notifberhasil', 'Berhasil! Data Berhasil Dihapus!');
    }
}
