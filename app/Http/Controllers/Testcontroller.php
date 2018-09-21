<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Testcontroller extends Controller
{
    public function destroy($id)
    {
        $data = DB::table('mapels')->where('id', $id)->delete();
        // dd($data);
        return redirect()->route('mapel.index');
    }
}
