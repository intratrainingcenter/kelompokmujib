<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $table = Siswa::all();

      return view('page.siswa.index', compact('table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      return view('page.siswa.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = new Siswa;
      $data->nis = '123123123';
      $data->nama = $request->nama;
      $data->kode_kelas = $request->kelas;
      $data->jenis_kelamin = $request->jenis_kelamin;
      $data->save();

      return redirect()->route('siswa.index')->with('notifberhasil', 'Data Siswa Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $table = Siswa::where('id', $id)->first();
      // dd($table);

      return view('page.siswa.edit', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      // dd($id, $request);
      $table = Siswa::where('id', $id)->first();
      $table->nama = $request->nama;
      $table->jenis_kelamin = $request->jenis_kelamin;
      $table->kode_kelas = $request->kelas;
      $table->save();
      return redirect()->route('siswa.index')->with('notifberhasil', 'Data "'.$request->nis.'" Berhasil Di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $table = Siswa::find($id);
      $table->delete();

      return redirect()->route('siswa.index')->with('notifberhasil', 'Data "'.$table->nama.'" Berhasil Dihapus!');
    }
}
