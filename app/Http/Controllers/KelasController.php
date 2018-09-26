<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Carbon\Carbon;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $table = Kelas::all();

      return view('page.kelas.index', compact('table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $table = Kelas::all()->last();
      $date = substr(Carbon::now()->format('Ydi'),2);
      $id = $table->id + 1;
      if($table == NULL){
        $new_kode = 'KD'.$date.'01' ;
      }else if($table->id < 9){
        $new_kode = 'KD'.$date.'0'.$id ;
      }else {
        $new_kode = 'KD'.$date.$id ;
      }
      return view('page.kelas.insert', compact('new_kode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = new Kelas;
      $data->kode_kelas = $request->kode_kelas;
      $data->nama_kelas = $request->nama_kelas;
      $data->save();

      return redirect()->route('kelas.index')->with('notifberhasil', 'Data Siswa Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kelasmodel  $kelasmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Kelasmodel $kelasmodel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kelasmodel  $kelasmodel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $table = Kelas::where('id', $id)->first();
      // dd($table);

      return view('page.kelas.edit', compact('table'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kelasmodel  $kelasmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $table = Kelas::where('id', $id)->first();
      $table->nama_kelas = $request->nama_kelas;
      $table->save();
      return redirect()->route('kelas.index')->with('notifberhasil', 'Data "'.$request->kode_kelas.'" Berhasil Di edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kelasmodel  $kelasmodel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // dd($id);
      $table = Kelas::find($id);
      $table->delete();

      return redirect()->route('kelas.index')->with('notifberhasil', 'Data "'.$table->nama_kelas.'" Berhasil Dihapus!');
    }
}
