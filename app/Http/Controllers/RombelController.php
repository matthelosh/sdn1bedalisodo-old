<?php

namespace App\Http\Controllers;

use App\Rombel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\RombelImport;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use DataTables;

class RombelController extends Controller
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
        $rombels = DB::table('rombel')->paginate(10);
        return view('home', ['title' => 'Manajemen Rombel', 'p' => 'adm-rombel', 'datas' => $rombels]);

    }

    public function cari(Request $request){
        if ($request->has('q')) {
            $cari = $request->q;
            $rombel = DB::table('rombel')->select('kode_rombel', 'nama_rombel')->where('nama_rombel', 'LIKE', '%'.$cari.'%')->get();
            return response()->json($rombel);
        }

    }

    public function showData()
    {
        return DataTables::of(Rombel::with(['Guru'])->get())->make(true);
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
        $file->move('file_rombel', $nama_file);

        // // Import data
        Excel::import(new RombelImport, public_path('/file_rombel/'.$nama_file));

        // // NOtifikasi flash
        Session::flash('sukses', 'Data Rombel telah tersimpan');

        // // Redirect
        return redirect('/adm-rombel');
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
     * @param  \App\Rombel  $rombel
     * @return \Illuminate\Http\Response
     */
    public function show(Rombel $rombel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rombel  $rombel
     * @return \Illuminate\Http\Response
     */
    public function edit(Rombel $rombel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rombel  $rombel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rombel $rombel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rombel  $rombel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rombel $rombel)
    {
        //
    }
}
