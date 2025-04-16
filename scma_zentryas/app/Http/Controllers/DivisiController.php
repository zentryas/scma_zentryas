<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Divisi;
use Inertia\Inertia;

class DivisiController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $divisi = Divisi::all();
        return Inertia::render('Divisi/Index', ['divisi' => $divisi]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create()
    {
        return Inertia::render('Divisi/Create');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_divisi' => 'required',
            'kode_divisi' => 'required',
        ]);

        $divisi = new Divisi();
        $divisi->nama_divisi = $request->nama_divisi;
        $divisi->kode_divisi = $request->kode_divisi;
        $divisi->save();

        return redirect()->route('divisi.index')->with([
            'toast' => 'success',
            'message' => 'Data berhasil disimpan!',
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function edit(divisi $divisi)
    {
        return Inertia::render('Divisi/Edit', ['divisi' => $divisi]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function divisi_update(Request $request, $id)
    {
        $request->validate([
            'nama_divisi' => 'required',
            'kode_divisi' => 'required',
        ]);

        $divisi = divisi::find($id);
        
        $divisi->update([
            'nama_divisi' => $request->nama_divisi,
            'kode_divisi' => $request->kode_divisi,
        ]);

        return redirect()->route('divisi.index')->with([
            'toast' => 'success',
            'message' => 'Data berhasil diupdate!',
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function destroy(divisi $divisi)
    {
        $divisi->delete();

        return redirect()->back()->with([
            'toast' => 'success',
            'message' => 'Data berhasil dihapus!',
        ]);
    }
}
