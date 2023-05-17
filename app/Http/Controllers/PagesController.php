<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    public function dashboard()
    {
        if(Auth::check()){
            $title = 'Dashboard';
            return view('pages.dashboard')->with('title', $title);;
        }

    }
    public function datasiswa()
    {
        $datasiswa = Siswa::orderBy('created_at','desc')->get();
        $title = 'Data Siswa';
        return view('pages.datasiswa', compact('title', 'datasiswa'))->with('title', $title);
    }
    public function dataguru()
    {
        $dataguru = Guru::orderBy('created_at','desc')->paginate(10);
        $title = 'Data Guru';
        return view('pages.dataguru', compact('title', 'dataguru'))->with('title', $title);
    }

    public function datakelas()
    {
        $datakelas = Kelas::orderBy('created_at','desc')->paginate(10);
        $title = 'Data Kelas';
        return view('pages.datakelas', compact('title', 'datakelas'))->with('title', $title);
    }

    public function updatedataguru(Request $request, $id = null)
    {
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
                'foto' => $data['foto'],
                'alamat' => $data['alamat']
            ]);
            return redirect()->back()->with('diky_success', 'Update Berhasil');;
        }
    }

    public function caridataguru(Request $request)
    {
        $cari = $request->cari;
        $title = 'Data Guru';
        $dataguru = Guru::where('nama','like',"%".$cari."%")->paginate(10);
        return view('pages.dataguru', compact('title', 'dataguru'))->with('title', $title);
    }

    public function datapindah()
    {
        $title = 'Data Mutasi/Pindah';
        return view('pages.datapindah')->with('title', $title);
    }

    public function datasiswapertanggal(Request $request)
    {
        $dari = $request->dari;
        $title = 'Data Siswa';
        $datasiswa = Siswa::whereYEAR('created_at','=',$dari)->orderBy('created_at','desc')->get();
        return view('pages.datasiswa', compact('title', 'datasiswa'))->with('title', $title);
    }

    public function datasiswaperstatus(Request $request)
    {
        $status = $request->status;
        $title = 'Data Siswa';
        $datasiswa = Siswa::where('status','=',$status)->get();
        return view('pages.datasiswa', compact('title', 'datasiswa'))->with('title', $title);
    }

    public function terimasiswa(Request $request, $id=null)
	{
		if($request->isMethod('post')){
            $data = $request->all();
            Siswa::where(['id'=>$id])->update([
                'status'=>"LULUS",
            ]);
            return redirect()->back()->with('diky_success', 'Siswa Di Luluskan');
        }

	}
    public function tolaksiswa(Request $request, $id=null)
	{
		if($request->isMethod('post')){
            $data = $request->all();
            Siswa::where(['id'=>$id])->update([
                'status'=>"DITOLAk",
            ]);
            return redirect()->back()->with('diky_success', 'Siswa Tidak Di Luluskan');
        }
	}

    public function batalsiswa(Request $request, $id=null)
	{
		if($request->isMethod('post')){
            $data = $request->all();
            Siswa::where(['id'=>$id])->update([
                'status'=>"PROSES",
            ]);
            return redirect()->back()->with('diky_success', 'Pembatalan Berhasil');
        }
	}

    public function tambahkelas(Request $request)
    { 
        {
        $data = new Kelas;
        $data->namakelas = $request->namakelas;
        $data->guru_id = $request->guru_id;
        $data->save();
        return redirect()->back()->with('diky_success', 'Berhasil');
        }
    }

    
}
