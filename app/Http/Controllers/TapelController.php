<?php

namespace App\Http\Controllers;

use App\Tapel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TapelImport;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class TapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Tapel::all();
    }


    public function getByKode(Request $request, $kode_tapel){
        $tapel = Tapel::where('kode_tapel', 'like', $kode_tapel.'%')->get();
        return $tapel;
    }

    public function indexAdm()
    {
        //
        $tapels = DB::table('tapels')->paginate(10);
        return view('home', ['title' => 'Manajemen Tapel', 'p' => 'adm-tapel', 'datas' => $tapels]);

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
        $file->move('file_tapel', $nama_file);

        // // Import data
        Excel::import(new TapelImport, public_path('/file_tapel/'.$nama_file));

        // // NOtifikasi flash
        Session::flash('sukses', 'Data Tapel telah tersimpan');

        // // Redirect
        return redirect('/adm-tapel');
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
     * @param  \App\Tapel  $tapel
     * @return \Illuminate\Http\Response
     */
    public function show(Tapel $tapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tapel  $tapel
     * @return \Illuminate\Http\Response
     */
    public function edit(Tapel $tapel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tapel  $tapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tapel $tapel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tapel  $tapel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tapel $tapel)
    {
        //
    }
}
