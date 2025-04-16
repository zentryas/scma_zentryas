<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Jabatan;
use App\Models\Divisi;
use App\Models\Form;
use Inertia\Inertia;

class FormController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::all();
        $jabatan = Jabatan::all();
        $divisi = Divisi::all();

        return Inertia::render('Welcome', [
            'karyawan' => $karyawan,
            'jabatan' => $jabatan,
            'divisi' => $divisi,
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'tgl_pengajuan' => 'required',
            'kategori' => 'required',
            'karyawan_id' => 'required',
            'divisi_id' => 'required',
            'jabatan_id' => 'required',
        ]);

        $now = Carbon::now();

        $kode = 'SCMA_'. rand(100,1000);

        DB::table('form')->insert([
            'kode_pengajuan' => $kode,
            'kategori' => $request->kategori,
            'tgl_pengajuan' => $request->tgl_pengajuan,
            'karyawan_id' => $request->karyawan_id,
            'divisi_id' => $request->divisi_id,
            'jabatan_id' => $request->jabatan_id,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        return "Berhasil tersimpan";

        // return redirect()->back()->with([
        //     'toast' => 'success',
        //     'message' => 'Data berhasil diajukan!',
        // ]);
    }
}
