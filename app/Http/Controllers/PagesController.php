<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Data_walikelas;
use App\Models\Datakelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use PDF;

class PagesController extends Controller
{
    public function dashboard()
    {
        if(Auth::check()){
            $datasiswa = Siswa::all()->count();
            $dataguru = Guru::all()->count();
            $datasiswaproses = Siswa::where('status','=','PROSES')->count();
            $datasiswalulus = Siswa::where('status','=','LULUS')->count();
            $datasiswaditolak = Siswa::where('status','=','DITOLAK')->count();
            $title = 'Dashboard';
            return view('pages.dashboard', compact('datasiswa', 'datasiswaproses', 'datasiswalulus', 'datasiswaditolak', 'dataguru'))->with('title', $title);;
        }

    }
    public function datasiswa()
    {
        if(Auth::check()){
            $datasiswaproses = Siswa::where('status','=','PROSES')->count();
        $datasiswa = Siswa::orderBy('created_at','desc')->get();
        $datasiswaproses = Siswa::where('status','=','PROSES')->count();
        $title = 'Data Siswa';
        return view('pages.datasiswa', compact('title', 'datasiswa', 'datasiswaproses', 'datasiswaproses'))->with('title', $title);
        }
    }
    public function dataguru()
    {
        if(Auth::check()){
            $datasiswaproses = Siswa::where('status','=','PROSES')->count();
        $dataguru = Guru::orderBy('created_at','desc')->paginate(10);
        $title = 'Data Guru';
        return view('pages.dataguru', compact('title', 'dataguru', 'datasiswaproses'))->with('title', $title);
        }
    }

    public function hapusguru(Request $request, $id){
        if (Auth::check()) {
            try {
                if ($request->isMethod('post')) {
                    Data_walikelas::where(['guru_id' => $id])->delete();
                    Guru::where(['id' => $id])->delete();
                    return redirect()->back()->with('diky_hapus', 'Hapus Guru Berhasil');
                }
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect()->back()->with('diky_error', 'Hapus Data Tidak Berhasil');
            }
            
        }

    }

    public function datakelas()
    {
        if(Auth::check()){
            $datasiswaproses = Siswa::where('status','=','PROSES')->count();
        $dataguru = Guru::where('wali_kelas', 0)->paginate(10);
        $datakelas = Data_walikelas::orderBy('created_at','desc')->paginate(10);
        $title = 'Data Wali Kelas';
        return view('pages.datakelas', compact('title', 'datakelas', 'dataguru', 'datasiswaproses'))->with('title', $title);
        }
    }

    public function namakelas()
    {
        if(Auth::check()){
        $datasiswaproses = Siswa::where('status','=','PROSES')->count();
        $kelas = Datakelas::orderBy('created_at','desc')->paginate(10);
        $title = 'Data Kelas';
        return view('pages.namakelas', compact('title', 'datasiswaproses', 'kelas'))->with('title', $title);
        }
    }

    public function hapuskelas(Request $request, $id){
        try {
            if (Auth::check()) {
                if ($request->isMethod('post')) {
                    Data_walikelas::where(['id' => $id])->delete();
                    $guru_id = $request->input('guru_id');
                    Guru::where(['id' => $guru_id])->update([
                        'wali_kelas' => 0,
                    ]);
                    return redirect()->back()->with('diky_hapus', 'Hapus Data Berhasil');
                }
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back()->with('diky_error', 'Hapus Data Tidak Berhasil');
        }

    }

    public function datapindah()
    {
        if(Auth::check()){
            $datasiswaproses = Siswa::where('status','=','PROSES')->count();
            $datapindah = Siswa::where('status','=','MUTASI')->paginate(10);
            $title = 'Data Mutasi/Pindah';
            return view('pages.datapindah', compact('title', 'datasiswaproses', 'datapindah'))->with('title', $title);
        }
    }

    public function print()
    {
        $datapindah = Siswa::where('status','=','MUTASI')->paginate(10);
        $title = 'Data Mutasi';
        $pdf = PDF::loadview('pages.print', compact('title','datapindah'))->setOptions(['defaultFont' => 'sans-serif'])->setPaper('A4','potrait');
        return view('pages.print', compact('datapindah'))->with('title', $title);
    }

    public function updatedataguru(Request $request, $id = null)
    {
        if(Auth::check()){
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
                    'alamat' => $data['alamat']
                ]);
            if($request->hasfile('foto'))
            {
                $file = $request->file('foto');
                $extenstion = $file->getClientOriginalExtension();
                $filename = 'Staff-'.time().'.'.$extenstion;
                $file->move('images/staff', $filename);
                Guru::where(['id' => $id])->update(['foto' => $filename,]);
            }
                return redirect()->back()->with('diky_success', 'Update Berhasil');;
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

        if($request->hasfile('foto'))
        {
            $file = $request->file('foto');
            $extenstion = $file->getClientOriginalExtension();
            $filename = 'Staff-'.time().'.'.$extenstion;
            $file->move('images/staff', $filename);
            $data->foto = $filename;
        }
        $data->save();
        return redirect()->back()->with('diky','Guru Sukses Ditambahkan');
    }

    public function caridataguru(Request $request)
    {
        if(Auth::check()){
            $cari = $request->cari;
            $title = 'Data Guru';
            $dataguru = Guru::where('wali_kelas','like',"%".$cari."%")->paginate(10);
            return view('pages.dataguru', compact('title', 'dataguru'))->with('title', $title);
        }
    }


    public function datasiswapertanggal(Request $request)
    {
        if(Auth::check()){
            $dari = $request->dari;
            $title = 'Data Siswa';
            $datasiswa = Siswa::whereYEAR('created_at','=',$dari)->orderBy('created_at','desc')->get();
            return view('pages.datasiswa', compact('title', 'datasiswa'))->with('title', $title);
        }
    }

    public function datasiswaperstatus(Request $request)
    {
        if(Auth::check()){
            $status = $request->status;
            $title = 'Data Siswa';
            $datasiswa = Siswa::where('status','=',$status)->get();
            return view('pages.datasiswa', compact('title', 'datasiswa'))->with('title', $title);
        }
    }

    public function terimasiswa(Request $request, $id=null)
	{
        if(Auth::check()){
            if($request->isMethod('post')){
                $data = $request->all();
                Siswa::where(['id'=>$id])->update([
                    'status'=>"LULUS",
                ]);
                return redirect()->back()->with('diky_success', 'Siswa Di Luluskan');
            }
        }

	}
    public function tolaksiswa(Request $request, $id=null)
	{
        if(Auth::check()){
            if($request->isMethod('post')){
                $data = $request->all();
                Siswa::where(['id'=>$id])->update([
                    'status'=>"DITOLAk",
                ]);
                return redirect()->back()->with('diky_success', 'Siswa Tidak Di Luluskan');
            }
        }
	}

    public function batalsiswa(Request $request, $id=null)
	{
        if(Auth::check()){
            if($request->isMethod('post')){
                $data = $request->all();
                Siswa::where(['id'=>$id])->update([
                    'status'=>"PROSES",
                ]);
                return redirect()->back()->with('diky_success', 'Pembatalan Berhasil');
            }
        }
	}

    public function tambahkelas(Request $request)
    { 
        if(Auth::check()){
            $data = new Data_walikelas;
            $data->namakelas = $request->namakelas;
            $data->guru_id = $request->guru_id;
            $data->save();
            $guru_id = $request->guru_id;
                    Guru::where(['id' => $guru_id])->update([
                        'wali_kelas' => 1,
                    ]);
            return redirect()->back()->with('diky_success', 'Kelas Berhasil Ditambahkan');
        }
    }
    
}
