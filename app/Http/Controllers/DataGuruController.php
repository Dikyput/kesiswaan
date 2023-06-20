<?php

namespace App\Http\Controllers;

use App\Models\Datakelas;
use App\Models\Data_walikelas;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $dataguru = Guru::orderBy('created_at', 'desc')->get();
            $title = 'Data Guru';
            return view('pages.dataguru.index', compact('dataguru'))->with('title', $title);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::check()) {
            $datawalikelas = Data_walikelas::where('guru_id', $id)->get();
            $dataguru = Guru::where('id', $id)->get();
            $title = 'Details Guru';
            return view('pages.dataguru.details', ['dataguru' => $dataguru, 'datawalikelas' => $datawalikelas])->with('title', $title);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Auth::check()) {
            $data = $request->all();
            Guru::where(['id' => $id])->update([
                'nip' => $data['nip'],
                'nama' => $data['nama'],
                'jk' => $data['jk'],
                'agama' => $data['agama'],
                'notelp' => $data['notelp'],
                'tempatlahir' => $data['tempatlahir'],
                'alamat' => $data['alamat'],
            ]);
            if ($request->hasfile('foto')) {
                $file = $request->file('foto');
                $extenstion = $file->getClientOriginalExtension();
                $filename = 'Staff-' . time() . '.' . $extenstion;
                $file->move('images/staff', $filename);
                Guru::where(['id' => $id])->update(['foto' => $filename]);
            }
            return redirect()->back()->with('diky_success', 'Update Berhasil');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::check()) {
            try {
                $kelas = Data_walikelas::where(['guru_id' => $id])->get('kelas_id');
                $hasil = isset($kelas[0]['kelas_id']) ? $kelas[0]['kelas_id'] : null;
                if ($hasil !== null) {
                    DataKelas::where(['id' => $hasil])->update([
                        'use_kelas' => 0,
                    ]);
                }
                Data_walikelas::where(['guru_id' => $id])->delete();
                Guru::where(['id' => $id])->delete();
                return redirect()->back()->with('diky_success', 'Hapus Guru Berhasil');
                return redirect()->back()->with('diky_hapus', 'Hapus Guru Berhasil');
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect()->back()->with('diky_error', 'Hapus Data Tidak Berhasil');
            }

        }
    }
}
