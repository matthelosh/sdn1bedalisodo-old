<?php

namespace App\Http\Controllers;

use App\Ekskul;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EkskulImport;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class EkskulController extends Controller
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
        $ekskuls = DB::table('ekskuls')->paginate(10);
        return view('home', ['title' => 'Manajemen Ekstrakurikuler', 'p' => 'adm-ekskul', 'datas' => $ekskuls]);

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
        $file->move('file_ekskul', $nama_file);

        // // Import data
        Excel::import(new EkskulImport, public_path('/file_ekskul/'.$nama_file));

        // // NOtifikasi flash
        Session::flash('sukses', 'Data Ekskul telah tersimpan');

        // // Redirect
        return redirect('/adm-ekskul');
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
     * @param  \App\Ekskul  $ekskul
     * @return \Illuminate\Http\Response
     */
    public function show(Ekskul $ekskul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ekskul  $ekskul
     * @return \Illuminate\Http\Response
     */
    public function edit(Ekskul $ekskul)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ekskul  $ekskul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ekskul $ekskul)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ekskul  $ekskul
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ekskul $ekskul)
    {
        //
    }
}
