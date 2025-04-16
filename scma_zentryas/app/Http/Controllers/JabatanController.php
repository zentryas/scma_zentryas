<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;
use Inertia\Inertia;

class JabatanController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $jabatan = Jabatan::all();
        return Inertia::render('Jabatan/Index', ['jabatan' => $jabatan]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create()
    {
        return Inertia::render('Jabatan/Create');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required',
            'kode_jabatan' => 'required',
        ]);

        $jabatan = new Jabatan();
        $jabatan->nama_jabatan = $request->nama_jabatan;
        $jabatan->kode_jabatan = $request->kode_jabatan;
        $jabatan->save();

        return redirect()->route('jabatan.index')->with([
            'toast' => 'success',
            'message' => 'Data berhasil disimpan!',
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function edit(Jabatan $jabatan)
    {
        return Inertia::render('Jabatan/Edit', ['jabatan' => $jabatan]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function Jabatan_update(Request $request, $id)
    {
        $request->validate([
            'nama_jabatan' => 'required',
            'kode_jabatan' => 'required',
        ]);

        $jabatan = Jabatan::find($id);
        
        $jabatan->update([
            'nama_jabatan' => $request->nama_jabatan,
            'kode_jabatan' => $request->kode_jabatan,
        ]);

        return redirect()->route('jabatan.index')->with([
            'toast' => 'success',
            'message' => 'Data berhasil diupdate!',
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();

        return redirect()->back()->with([
            'toast' => 'success',
            'message' => 'Data berhasil dihapus!',
        ]);
    }
}
