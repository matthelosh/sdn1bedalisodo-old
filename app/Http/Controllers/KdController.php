<?php

namespace App\Http\Controllers;

use App\Kd;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\KdImport;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use DataTables;
class KdController extends Controller
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
        // $kis = DB::table('kds')->paginate(10);
        // $kds = Kd::all();
        return view('home', ['title' => 'Manajemen Kompetensi Dasar', 'p' => 'adm-kd']);

    }

    public function showData()
    {
        return DataTables::of(Kd::query())->make(true);
    }

    public function cari(Request $request) {
        $kode_mapel = $request->query('mapel');
        $tipe_nilai = $request->query('tipe_nilai');
        $kode_rombel = $request->query('kode_rombel');
        $rombel = 'App\Rombel'::where('kode_rombel', $kode_rombel)->get();
        $tingkat = 'App\Tingkat'::where('id', $rombel[0]->id_tingkat)->get();

        switch($tipe_nilai){
            case "sikap":
                return Kd::where([
                                ['id_rombel' , '=', $tingkat[0]->kelas],
                                ['id_mapel' ,'=', $kode_mapel],
                                ['id_ki', '<', '3']
                            ])
                           ->get();
            break;
            case "pengetahuan":
                return Kd::where([
                        ['id_rombel' , '=', $tingkat[0]->kelas],
                        ['id_mapel' ,'=', $kode_mapel],
                        ['id_ki', '=', '3']
                    ])
                    ->get();
            break;
            case "keterampilan":
                return Kd::where([
                        ['id_rombel' , '=', $tingkat[0]->kelas],
                        ['id_mapel' ,'=', $kode_mapel],
                        ['id_ki', '=', '3']
                    ])
                    ->get();
            break;
        }
        return Kd::where(['id_rombel' => $tingkat[0]->kelas, 'id_mapel' => $kode_mapel])->get();
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
        $file->move('file_kd', $nama_file);

        // // Import data
        Excel::import(new KdImport, public_path('/file_kd/'.$nama_file));

        // // NOtifikasi flash
        Session::flash('sukses', 'Data Kompetensi Dasar telah tersimpan');

        // // Redirect
        return redirect('/adm-kd');
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
     * @param  \App\Kd  $kd
     * @return \Illuminate\Http\Response
     */
    public function show(Kd $kd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kd  $kd
     * @return \Illuminate\Http\Response
     */
    public function edit(Kd $kd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kd  $kd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kd $kd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kd  $kd
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kd $kd)
    {
        //
    }
}
