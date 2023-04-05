<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::with('prodi')->get();

        return view('mahasiswa.index', ['mahasiswa' => $mahasiswa]);
    }

    public function tambah()
    {
        return view('mahasiswa.tambah');
    }

    public function simpan(Request $request)
    {
        $mahasiswa = new Mahasiswa;
        $mahasiswa->fill($request->all());

        $simpan = $mahasiswa->save();

        if ($simpan) {
            return redirect()->back()->with(['success' => 'data berhasil disimpan']);
        } else {
            return redirect()->back()->with(['error' => 'data gagal disimpan']);
        }
    }
}
