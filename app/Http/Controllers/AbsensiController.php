<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Absensi::orderBy('updated_at', 'desc')->with('siswa')->get();
        $no = 1; 
        // dd(date("Y-m-d H:i:s"));
        return view('page.absensi.index', compact('data', 'no'));
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
        return view('page.absensi.create', compact('selectkelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $param)
    {
        $data = Siswa::where('kode_kelas', $request->code)->get();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Absensi::where('id', $id)->with('siswa')->first();
        $kelas = Kelas::all();
        $selectkelas = [];
        foreach ($kelas as $item) {
            $selectkelas[$item->kode_kelas] = $item->nama_kelas;
        }
        return view('page.absensi.edit',compact('selectkelas', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absensi $absensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absensi $absensi)
    {
        //
    }
}
