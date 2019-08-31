<?php

namespace App\Http\Controllers;

use App\Ki;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\KiImport;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class KiController extends Controller
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
        $kis = DB::table('kis')->paginate(10);
        return view('home', ['title' => 'Manajemen Kompetensi Insti', 'p' => 'adm-ki', 'datas' => $kis]);

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
        $file->move('file_ki', $nama_file);

        // // Import data
        Excel::import(new KiImport, public_path('/file_ki/'.$nama_file));

        // // NOtifikasi flash
        Session::flash('sukses', 'Data Kompetensi Inti telah tersimpan');

        // // Redirect
        return redirect('/adm-ki');
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
     * @param  \App\Ki  $ki
     * @return \Illuminate\Http\Response
     */
    public function show(Ki $ki)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ki  $ki
     * @return \Illuminate\Http\Response
     */
    public function edit(Ki $ki)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ki  $ki
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ki $ki)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ki  $ki
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ki $ki)
    {
        //
    }
}
