<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ambil_data = Pegawai::with('relasijabatan')->get();
        return view('pegawai.index', compact('ambil_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jab = Jabatan::all();
        return view('pegawai.tambah', compact('jab'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pegawai::create([
            'nama' => $request -> nama,
            'id_jabatan' => $request -> id_jabatan,
        ]);

        return redirect(route('pegawai.index'))->with('berhasil', 'Berhasil menambahkan jabatan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jab = Jabatan::all();
        $ambil_data = Pegawai::with('relasijabatan')->findorfail($id);
        return view('pegawai.edit', compact('ambil_data','jab'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Pegawai::find($id)->update([
            'nama' => $request -> nama,
            'id_jabatan' => $request -> id_jabatan,
        ]);

        return redirect(route('pegawai.index'))->with('berhasil', 'Berhasil mengupdate pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Pegawai::find($id)->delete();
        return redirect(route('pegawai.index'))->with('berhasil', 'Berhasil menghapus Pegawai');
    }
}
