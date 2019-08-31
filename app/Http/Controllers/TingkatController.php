<?php

namespace App\Http\Controllers;

use App\Tingkat;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TingkatImport;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class TingkatController extends Controller
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
        $tingkats = DB::table('tingkats')->paginate(10);
        return view('home', ['title' => 'Manajemen Tingkat/Kelas', 'p' => 'adm-tingkat', 'datas' => $tingkats]);

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
        $file->move('file_tingkat', $nama_file);

        // // Import data
        Excel::import(new TingkatImport, public_path('/file_tingkat/'.$nama_file));

        // // NOtifikasi flash
        Session::flash('sukses', 'Data Tingkat/Kelas telah tersimpan');

        // // Redirect
        return redirect('/adm-tingkat');
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
     * @param  \App\Tingkat  $tingkat
     * @return \Illuminate\Http\Response
     */
    public function show(Tingkat $tingkat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tingkat  $tingkat
     * @return \Illuminate\Http\Response
     */
    public function edit(Tingkat $tingkat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tingkat  $tingkat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tingkat $tingkat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tingkat  $tingkat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tingkat $tingkat)
    {
        //
    }
}
