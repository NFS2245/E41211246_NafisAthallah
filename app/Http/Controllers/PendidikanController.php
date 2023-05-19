<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendidikanController extends Controller
{   // untuk mengambil data
    public function index (){
        $pengalaman_kerja = DB::table('pengalaman_kerja')->get();
        return view('backend.pengalaman_kerja.index', compact('pengalaman_kerja'));
    }
    // untuk menambah data
    public function create (){
        $pengalaman_kerja = null;
        return view('backend.pengalaman_kerja.create', compact('pengalaman_kerja'));
    }

    public function store (Request $request){
        DB::table('pengalaman_kerja')->insert([ 'nama_saham' => $request->nama_saham,
        'kode_saham' => $request->kode_saham,
        'tahun_masuk' => $request->tahun_masuk, 'tahun_keluar' => $request->tahun_keluar
        ]);
        return redirect()->route('pengalaman_kerja.index')
        ->with('success', 'Data Saham baru telah berhasil disimpan.');
    }
    // untuk menghapus data
    public function destroy($id)
    {
    DB::table('pengalaman_kerja')->where('id', $id)->delete();
    return redirect()->route('pengalaman_kerja.index')
        ->with('success', 'Data Saham telah berhasil dihapus.');
    }
    //untuk mengupdate data
    public function edit($id)
    {
        $pengalaman_kerja = DB::table('pengalaman_kerja')->where('id', $id)->first();
        return view('backend.pengalaman_kerja.edit', compact('pengalaman_kerja'));
    }

    public function update(Request $request, $id)
    {
        DB::table('pengalaman_kerja')->where('id', $id)->update([
            'nama_saham' => $request->nama_saham,
            'kode_saham' => $request->kode_saham,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar
        ]);
        return redirect()->route('pengalaman_kerja.index')
            ->with('success', 'Data Saham telah berhasil diupdate.');
    }
    
}
