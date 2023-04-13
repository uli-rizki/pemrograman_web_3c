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
        $validate = $request->validate([
            'nim' => 'required|max:12',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'prodi_id' => 'required',
            'tahun_angkatan' => 'required'
        ], [
            'nim.required' => 'NIM harus diisi',
            'nim.max' => 'NIM tidak boleh lebih dari 12 digit'
        ]);

        $mahasiswa = new Mahasiswa;
        $mahasiswa->fill($request->all());

        $simpan = $mahasiswa->save();

        if ($simpan) {
            return redirect()->back()->with(['success' => 'data berhasil disimpan']);
        } else {
            return redirect()->back()->with(['error' => 'data gagal disimpan']);
        }
    }

    public function edit($mahasiswa_id)
    {
        $mahasiswa = Mahasiswa::find($mahasiswa_id);

        return view('mahasiswa.edit', ['mahasiswa' => $mahasiswa]);
    }

    public function update(Request $request, $mahasiswa_id)
    {
        $mahasiswa = Mahasiswa::find($mahasiswa_id);

        $mahasiswa->fill($request->all());
        $update = $mahasiswa->save();

        if ($update) {
            return redirect()->back()->with(['success' => 'Data berhasil disimpan']);
        } else {
            return redirect()->back()->with(['error' => 'Data gagal disimpan']);
        }
    }
}
