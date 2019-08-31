<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Mapel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MapelImport;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class MapelController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function indexAdm()
    {
        //
        $mapels = DB::table('mapels')->paginate(10);
        return view('home', ['title' => 'Manajemen Mapel', 'p' => 'adm-mapel', 'datas' => $mapels]);

    }


    public function cari(Request $request) {
        $level = Auth::user()->level;
        switch($level){
            case "gurupai":
                return Mapel::where('kode_mapel', 'pabp')->get();
            break;
            case "gurupjok":
                return Mapel::where('kode_mapel', 'pjok')->get();
            case "guru":
                if ($request->query('tipe_nilai') == 'sikap'){
                    return Mapel::where('kode_mapel', 'pkn')->get();
                }
                return Mapel::where([
                    ['kode_mapel', '!=', 'pabp'],
                    ['kode_mapel', '!=', 'pjok']
                    ])->get();
        }
        // return Mapel::all();
    }
    /**
     * Import Excel Data.
     *
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        //
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // // Ambil file excel
        $file = $request->file('file');

        // // Membuat nama unik
        $nama_file = rand().$file->getClientOriginalName();

        // // Pindah ke folder publik
        $file->move('file_mapel', $nama_file);

        // // Import data
        Excel::import(new MapelImport, public_path('/file_mapel/'.$nama_file));

        // // NOtifikasi flash
        Session::flash('sukses', 'Data Mapel telah tersimpan');

        // // Redirect
        return redirect('/adm-mapel');
        // $gurus = Guru::all();
        // return view('home', ['title' => 'Manajemen Guru', 'p' => 'adm-guru', 'datas' => $gurus ,'nama_file' =>$nama_file]);
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
     * @param  \App\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function show(Mapel $mapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function edit(Mapel $mapel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mapel $mapel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mapel $mapel)
    {
        //
    }
}
