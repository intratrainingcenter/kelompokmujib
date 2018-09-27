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
        $data = Absensi::orderBy('id', 'desc')->with('get_siswa')->get();
        $no = 1;
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
        $check = Absensi::where('nis', $request->nis)->where('created_at', date('Y-m-d'))->doesntExist();
        if ($check) {
            $data = new Absensi;
            $data->nis = $request->nis;
            $data->keterangan = $request->keterangan;
            $data->created_at = date('Y-m-d');
            $data->save();
    
            return redirect()->route('absensi.index')->with('notifberhasil', 'Berhasil! Data Berhasil Ditambahkan!');
        } else {
            return redirect()->route('absensi.index')->with('notifgagal', 'Gagal! Siswa Sudah Diabsen Hari Ini!');
        }
        
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
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Absensi::find($id);
        $data->keterangan = $request->keterangan;
        $data->save();
        return redirect()->route('absensi.index')->with('notifberhasil', 'Berhasil! Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Absensi::find($id)->delete();

        return redirect()->route('absensi.index')->with('notifberhasil', 'Berhasil! Data Berhasil Dihapus');
    }
}
