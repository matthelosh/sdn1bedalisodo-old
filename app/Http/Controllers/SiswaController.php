<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Siswa;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SiswaImport;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use DataTables;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexFromGuru(Request $request)
    {
        //
        // $rombel = 'App\Rombel'::where('kode_guru', Auth::user()->nip)->first();
        return view('home', ['title' => 'Data Siswa', 'p' => 'guru-siswa']);

    }

    public function showMySiswa(Request $request){
        $name = Auth::user()->name;
        $guru = 'App\Guru'::where('nama_guru', $name)->get();
        $rombel = 'App\Rombel'::where('id_guru', $guru[0]->nip)->get();

        return DataTables::of(Siswa::where('id_rombel', $rombel[0]->kode_rombel)->with(['Ortu'])->get())->make(true);

    }

    public function indexAdm()
    {
        //
        // $siswas = DB::table('siswas')->paginate(10);
        // $siswas = Siswa::with('Rombel')->get();
        return view('home', ['title' => 'Manajemen Siswa', 'p' => 'adm-siswa'/**, 'datas' => $siswas */]);

    }
    public function showData(Request $request)
    {
        if(Auth::user()->level == 'guru'){
            $name = Auth::user()->name;
            $guru = 'App\Guru'::where('nama_guru', $name)->get();
            $rombel = 'App\Rombel'::where('id_guru', $guru[0]->nip)->get();
            return DataTables::of(Siswa::where('id_rombel', $rombel[0]->kode_rombel)->with(['Ortu', 'Rombel'])->get())->addIndexColumn()->make(true);
        } else {
            return DataTables::of(Siswa::with(['Rombel', 'Ortu'])->get())->make(true);
        }
    }

    public function getMembers(Request $request) {
        // $members = Siswa::where('id_rombel', $request->id_rombel)->get();
        // $nonmembers = Siswa::where('id_rombel', null)->get();
        // $data = ['members' => $members, 'nonmembers' => $nonmembers];
        // return $data;
        $kode_rombel = $request->query('id_rombel');
        // $query = DB::table('siswas')->where('id_rombel', $kode_rombel)->get();
        // return $kode_rombel;
        return DataTables::of(Siswa::where('id_rombel', $kode_rombel))->make(true);
        // return DataTables::eloquent($query)->addIndexColumn()->make();

    }

    public function pindahRombel(Request $request){
        $nisns = $request->nisns;
        foreach($nisns as $nisn){
            Siswa::where('nisn', $nisn)->update(['id_rombel'=>$request->ke_rombel]);
        }

        return json_encode(['status'=>'sukses', 'msg' => 'Siswa telah dipindahkan']);
    }

    public function keluarkanSiswa(Request $request) {
        $nisns = $request->nisns;
        foreach($nisns as $nisn){
            Siswa::where('nisn', $nisn)->update(['id_rombel' => null]);
        }
        return json_encode(['status'=>'sukses', 'msg' => 'Siswa telah dikeluarkan']);
    }

    public function masukkanSiswa(Request $request) {
        $nisns = $request->nisns;
        foreach($nisns as $nisn){
            Siswa::where('nisn', $nisn)->update(['id_rombel' => $request->ke_rombel]);
        }
        return json_encode(['status'=>'sukses', 'msg' => 'Siswa telah dimasukkan']);
        // print_r( $request->ke_rombel);
    }

    public function getNonMembers() {
        return DataTables::of(Siswa::where('id_rombel', null))->make();

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
        $file->move('file_siswa', $nama_file);

        // // Import data
        Excel::import(new SiswaImport, public_path('/file_siswa/'.$nama_file));

        // // NOtifikasi flash
        Session::flash('sukses', 'Data siswa telah tersimpan');

        // // Redirect
        return redirect('/adm-siswa');
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
        //'nisn', 'nis', 'nama_siswa', 'jk', 'tempat_lahir', 'tanggal_lahir', 'agama', 'alamat_siswa', 'pend_sebelumnya','id_ortu', 'id_rombel'
        return Siswa::create([
            'nisn' => $request['nisn'],
            'nis'  => $request['nis'],
            'nama_siswa' => $request['nama_siswa'],
            'jk' => $request['jk'],
            'tempat_lahir' => $request['tempat_lahir'],
            'tanggal_lahir' => $request['tanggal_lahir'],
            'agama_siswa' => $request['agama'],
            'alamat_siswa' => $request['alamat_siswa'],
            'pend_sebelumnya' => $request['pend_sebelumnya'],
            'id_ortu' => $request['id_ortu'],
            'id_rombel' => $request['id_rombel']
        ]);
        return redirect('/adm-siswa');
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
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        //
    }
}
