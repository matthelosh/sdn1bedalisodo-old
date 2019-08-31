<?php

namespace App\Http\Controllers;

use App\Guru;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\GuruImport;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class GuruController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->only('indexAdm');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $gurus = Guru::all();
        return view('home', ['title' => 'Manajemen Guru', 'p' => 'guru', 'datas' => $gurus]);

    }

    public function indexAdm()
    {
        //
        $gurus = DB::table('guru')->paginate(10);
        return view('home', ['title' => 'Manajemen Guru', 'p' => 'adm-guru', 'datas' => $gurus]);

    }

    public function import(Request $request){
        // Import Guru
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        // // Ambil file excel
        $file = $request->file('file');

        // // Membuat nama unik
        $nama_file = rand().$file->getClientOriginalName();

        // // Pindah ke folder publik
        $file->move('file_guru', $nama_file);

        // // Import data
        Excel::import(new GuruImport, public_path('/file_guru/'.$nama_file));

        // // NOtifikasi flash
        Session::flash('sukses', 'Data Guru telah tersimpan');

        // // Redirect
        return redirect('/adm-guru');
        // $gurus = Guru::all();
        // return view('home', ['title' => 'Manajemen Guru', 'p' => 'adm-guru', 'datas' => $gurus ,'nama_file' =>$nama_file]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $foto = ($request->file('foto'))?$request->file('foto'): "null";
        $nama_foto="null";
        if ($foto != "null"){
            $this->validate($request, [
                'foto' => 'mimes:jpg,jpeg,png,bmp,JPG,JPEG'
            ]);
            $nama_file = $request['nip'].'.jpg';
            $foto->move('img/guru/',$nama_file);
            $status_foto = "ada";
        }
        else {
            $status_foto = "null";
        }
        Guru::create([
            'nip' => $request['nip'],
            'nama_guru'=> $request['nama_guru'],
            'golongan'=> $request['golongan'],
            'jk'=> $request['jk'],
            'tempat_lahir'=> $request['tempat_lahir'],
            'tanggal_lahir'=> $request['tanggal_lahir'],
            'agama'=> $request['agama'],
            'alamat'=> $request['alamat'],
            'hp'=> $request['hp'],
            'email'=> $request['email'],
            'ijazah'=> $request['ijazah'],
            'jabatan'=> $request['jabatan'],
            'tmt'=> $request['tmt'],
            'tmt_disini'=> $request['tmt_disini'],
            'sk_terakhir'=> $request['sk_terakhir'],
            'status_peg'=> $request['status_peg'],
            'foto' => $status_foto
        ]);

        // echo $nama_foto;
        return redirect('/adm-guru');
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
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Guru $guru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guru $guru)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru)
    {
        //
    }
}
