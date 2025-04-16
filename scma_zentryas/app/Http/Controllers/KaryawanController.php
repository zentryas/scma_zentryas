<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use Inertia\Inertia;

class KaryawanController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $karyawan = Karyawan::all();
        return Inertia::render('Karyawan/Index', ['karyawan' => $karyawan]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create()
    {
        return Inertia::render('Karyawan/Create');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_karyawan' => 'required',
            'nik' => 'required',
        ]);

        $karyawan = new Karyawan();
        $karyawan->nama_karyawan = $request->nama_karyawan;
        $karyawan->nik = $request->nik;
        $karyawan->save();

        return redirect()->route('karyawan.index')->with([
            'toast' => 'success',
            'message' => 'Data berhasil disimpan!',
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function edit(Karyawan $karyawan)
    {
        return Inertia::render('Karyawan/Edit', ['karyawan' => $karyawan]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function karyawan_update(Request $request, $id)
    {
        $request->validate([
            'nama_karyawan' => 'required',
            'nik' => 'required',
        ]);

        $karyawan = Karyawan::find($id);
        
        $karyawan->update([
            'nama_karyawan' => $request->nama_karyawan,
            'nik' => $request->nik,
        ]);

        return redirect()->route('karyawan.index')->with([
            'toast' => 'success',
            'message' => 'Data berhasil diupdate!',
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();

        return redirect()->back()->with([
            'toast' => 'success',
            'message' => 'Data berhasil dihapus!',
        ]);
    }
}
