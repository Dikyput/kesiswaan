<?php

namespace App\Http\Controllers;

use App\Models\Datakelas;
use App\Models\Data_walikelas;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PDF;

class PagesController extends Controller
{
    public function dashboard()
    {
        if (Auth::check()) {
            $datasiswa = Siswa::all()->count();
            $dataguru = Guru::all()->count();

            $datasiswalulus = Siswa::where('status', '=', 'LULUS')->count();
            $datasiswaditolak = Siswa::where('status', '=', 'DITOLAK')->count();
            $title = 'Dashboard';
            return view('pages.dashboard', compact('datasiswa', 'datasiswalulus', 'datasiswaditolak', 'dataguru'))->with('title', $title);
        }

    }
    public function datasiswa()
    {
        if (Auth::check()) {

            $values = ['LULUS', 'DITOLAK', 'PROSES'];
            $datasiswa = Siswa::whereIn('status', $values)->get();
            // $datasiswa = Siswa::where('created_at','desc')->get();

            $title = 'Data Siswa';
            return view('pages.datasiswa', compact('title', 'datasiswa'))->with('title', $title);
        }
    }
    public function dataguru()
    {
        if (Auth::check()) {

            $dataguru = Guru::orderBy('created_at', 'desc')->get();
            $title = 'Data Guru';
            return view('pages.dataguru', compact('title', 'dataguru', ))->with('title', $title);
        }
    }

    public function hapusguru(Request $request, $id)
    {
        if (Auth::check()) {
            try {
                if ($request->isMethod('post')) {
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
                }
                return redirect()->back()->with('diky_hapus', 'Hapus Guru Berhasil');
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect()->back()->with('diky_error', 'Hapus Data Tidak Berhasil');
            }

        }

    }

    public function datakelas()
    {
        if (Auth::check()) {

            $dataguru = Guru::where('wali_kelas', 0)->get();
            $datakelas = Data_walikelas::orderBy('created_at', 'desc')->get();
            $namakelas = Datakelas::where('use_kelas', 0)->get();
            $title = 'Data Wali Kelas';
            return view('pages.datakelas', compact('datakelas', 'namakelas', 'dataguru', ))->with('title', $title);
        }
    }

    public function namakelas()
    {
        if (Auth::check()) {
            $kelas = Datakelas::orderBy('created_at', 'desc')->get();
            $datakelas = Kelas::orderBy('created_at', 'desc')->get();
            $title = 'Data Kelas';
            return view('pages.namakelas', compact('title', 'kelas', 'datakelas'))->with('title', $title);
        }
    }

    public function hapuskelas(Request $request, $id)
    {
        try {
            if (Auth::check()) {
                if ($request->isMethod('post')) {
                    Data_walikelas::where(['id' => $id])->delete();
                    $guru_id = $request->input('guru_id');
                    $kelas_id = $request->input('kelas_id');
                    Guru::where(['id' => $guru_id])->update([
                        'wali_kelas' => 0,
                    ]);
                    DataKelas::where(['id' => $kelas_id])->update([
                        'use_kelas' => 0,
                    ]);
                    return redirect()->back()->with('diky_hapus', 'Hapus Data Berhasil');
                }
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('diky_error', 'Hapus Data Tidak Berhasil');
        }

    }

    public function hapusnamakelas(Request $request, $id)
    {

        if (Auth::check()) {
            if ($request->isMethod('post')) {
                $walikelas = Data_walikelas::where(['kelas_id' => $id])->get('id');
                $hasil = isset($walikelas[0]['id']) ? $walikelas[0]['id'] : null;
                if ($hasil !== null) {
                    Data_walikelas::where(['id' => $hasil])->delete();
                    $walikelasguru = Guru::where(['id' => $hasil])->get('id');
                    $hasilguru = isset($walikelasguru[0]['id']) ? $walikelasguru[0]['id'] : null;
                    if ($walikelasguru !== null) {
                        Guru::where(['id' => $hasilguru])->update([
                            'wali_kelas' => 0,
                        ]);
                    }
                }
                DataKelas::where(['id' => $id])->delete();
                return redirect()->back()->with('diky_hapus', 'Hapus Data Berhasil');
            }
        }

    }

    public function datapindah()
    {
        if (Auth::check()) {

            $datasiswalulus = Siswa::where('status', '=', 'LULUS')->get();
            $datapindah = Siswa::where('status', '=', 'MUTASI')->paginate(10);
            $title = 'Data Mutasi/Pindah';
            return view('pages.datapindah', compact('title', 'datasiswalulus', 'datapindah'))->with('title', $title);
        }
    }

    public function tambahdatapindah(Request $request)
    {
        try {
            if (Auth::check()) {
                if ($request->isMethod('post')) {
                    $data = $request->all();
                    $idsiswa = $request->input('id');
                    Siswa::where(['id' => $idsiswa])->update([
                        'status' => "MUTASI",
                        'alasan' => $data['alasan'],
                    ]);
                    return redirect()->back()->with('diky_success', 'Mutasi Berhasil Dibuat');
                }
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('diky_error', 'Mutasi Tidak Berhasil Dibuat, Pastikan Anda Input Data Dengan Benar!');
        }
    }

    function print() {
        $datapindah = Siswa::where('status', '=', 'MUTASI')->paginate(10);
        $title = 'Data Mutasi';
        $pdf = PDF::loadview('pages.print', compact('title', 'datapindah'))->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4', 'potrait');
        return view('pages.print', compact('datapindah'))->with('title', $title);
    }

    public function updatedataguru(Request $request, $id = null)
    {
        if (Auth::check()) {
            if ($request->isMethod('post')) {
                $data = $request->all();
                Guru::where(['id' => $id])->update([

                    'nip' => $data['nip'],
                    'nama' => $data['nama'],
                    'password' => $data['password'],
                    'jk' => $data['jk'],
                    'agama' => $data['agama'],
                    'notelp' => $data['notelp'],
                    'tempatlahir' => $data['tempatlahir'],
                    'tgllahir' => $data['tgllahir'],
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
    }

    public function tambahguru(Request $request)
    {
        $data = new Guru;
        $data->nip = $request->input('nip');
        $data->nama = $request->input('nama');
        $data->password = Hash::make($request->input('password'));
        $data->jk = $request->input('jk');
        $data->agama = $request->input('agama');
        $data->notelp = $request->input('notelp');
        $data->tempatlahir = $request->input('tempatlahir');
        $data->tgllahir = $request->input('tgllahir');
        $data->alamat = $request->input('alamat');

        if ($request->hasfile('foto')) {
            $file = $request->file('foto');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'Staff-' . time() . '.' . $extenstion;
            $file->move('images/staff', $filename);
            $data->foto = $filename;
        }
        $data->save();
        return redirect()->back()->with('diky_success', 'Guru Sukses Ditambahkan');
    }

    public function caridataguru(Request $request)
    {
        if (Auth::check()) {
            $cari = $request->cari;
            $title = 'Data Guru';
            $dataguru = Guru::where('wali_kelas', 'like', "%" . $cari . "%")->paginate(10);
            return view('pages.dataguru', compact('title', 'dataguru'))->with('title', $title);
        }
    }

    public function datasiswapertanggal(Request $request)
    {
        if (Auth::check()) {
            $dari = $request->dari;
            $title = 'Data Siswa';
            $datasiswa = Siswa::whereYEAR('created_at', '=', $dari)->orderBy('created_at', 'desc')->get();
            return view('pages.datasiswa', compact('title', 'datasiswa'))->with('title', $title);
        }
    }

    public function datasiswaperstatus(Request $request)
    {
        if (Auth::check()) {
            $status = $request->status;
            $title = 'Data Siswa';
            $datasiswa = Siswa::where('status', '=', $status)->get();
            return view('pages.datasiswa', compact('title', 'datasiswa'))->with('title', $title);
        }
    }

    public function terimasiswa(Request $request, $id = null)
    {
        try {
            if (Auth::check()) {
                if ($request->isMethod('post')) {
                    $data = $request->all();
                    Siswa::where(['id' => $id])->update([
                        'status' => "LULUS",
                    ]);
                    return redirect()->back()->with('diky_success', 'Siswa Di Luluskan');
                }
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('diky_error', 'Data Gagal Dirubah');
        }
    }
    public function tolaksiswa(Request $request, $id = null)
    {
        try {
            if (Auth::check()) {
                if ($request->isMethod('post')) {
                    $data = $request->all();
                    Siswa::where(['id' => $id])->update([
                        'status' => "DITOLAk",
                    ]);
                    return redirect()->back()->with('diky_success', 'Siswa Tidak Di Luluskan');
                }
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('diky_error', 'Data Gagal Dirubah');
        }
    }

    public function batalsiswa(Request $request, $id = null)
    {
        try {
            if (Auth::check()) {
                if ($request->isMethod('post')) {
                    $data = $request->all();
                    Siswa::where(['id' => $id])->update([
                        'status' => "PROSES",
                    ]);
                    return redirect()->back()->with('diky_success', 'Pembatalan Berhasil');
                }
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('diky_error', 'Data Gagal Dibatalkan');
        }
    }

    public function tambahkelas(Request $request)
    {
        try {
            if (Auth::check()) {
                $data = new Data_walikelas;
                $data->namakelas = $request->namakelas;
                $data->kelas_id = $request->kelas_id;
                $data->guru_id = $request->guru_id;
                $data->save();
                $guru_id = $request->guru_id;
                $kelas_id = $request->kelas_id;
                Guru::where(['id' => $guru_id])->update([
                    'wali_kelas' => 1,
                ]);
                DataKelas::where(['id' => $kelas_id])->update([
                    'use_kelas' => 1,
                ]);
                return redirect()->back()->with('diky_success', 'Wali Kelas Berhasil Ditambahkan');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('diky_error', 'Data Gagal Ditambahkan Atau Nama Kelas Sudah Ada');
        }
    }

    public function tambahnamakelas(Request $request)
    {
        try {
            if (Auth::check()) {
                $data = new Datakelas;
                $data->nama = $request->nama;
                $data->tingkat_kelas = $request->tingkat_kelas;
                $data->save();
                return redirect()->back()->with('diky_success', 'Kelas Berhasil Ditambahkan');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('diky_error', 'Data Gagal Ditambahkan Atau Nama Kelas Sudah Ada');
        }
    }

}
