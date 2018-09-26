<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $table = Siswa::with('get_kelas')->get();
      // dd($table);

      return view('page.siswa.index', compact('table'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $tbl_student = Siswa::all()->last();
      $tbl_kelas = Kelas::all();

      $date = substr(Carbon::now()->format('Ydmi'),2);
      $id = $tbl_student->id + 1;
      if($tbl_student == NULL){
        $new_code = $date.'01' ;
      }else if($tbl_student->id < 9){
        $new_code = $date.'0'.$id ;
      }else {
        $new_code = $date.$id ;
      }
      $nis = $new_code;

      $kelas = [];
      foreach ($tbl_kelas as $data) {
        $kelas[$data->kode_kelas]= $data->nama_kelas;
      }
      // dd($kelas);
      return view('page.siswa.insert', compact('nis', 'kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $check = Siswa::where('nis', $request->nis)->first();
      // dd($check == NULL, $request->nis);
      if($check == NULL){
        $data = new Siswa;
        $data->nis = $request->nis;
        $data->nama = $request->nama;
        $data->kode_kelas = $request->kelas;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->save();
      }else {
        return redirect()->route('siswa.index')->with('notifwarning', 'Data Sudah Ada!');
      }

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
