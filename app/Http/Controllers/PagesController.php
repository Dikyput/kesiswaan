<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
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
        $datasiswa = DB::table('siswas')->get();
        $title = 'Data Siswa';
        return view('pages.datasiswa', ['datasiswa'=>$datasiswa])->with('title', $title);
    }

    public function datasiswapertanggal(Request $request)
    {
        $dari = $request->$dari;
        $sampai = $request->$sampai;
        $datasiswa = DB::table('siswas')->get();
        $title = 'Data Siswa dari $dari';
        $data = Siswa::whereDate('created_at','>=',$dari)->whereDate('created_at','<=',$sampai)->
        orderBy('created_at','desc')->get();
        return view('pages.datasiswa', ['datasiswa'=>$datasiswa])->with('title', $title);
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
}
