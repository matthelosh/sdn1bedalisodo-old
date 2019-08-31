<?php

namespace App\Http\Controllers;

use App\Ortu;
use App\Siswa;
use Illuminate\Http\Request;

class OrtuController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        Ortu::create([
            'id_siswa' => $request['id_siswa'],
            'nama_ayah' => $request['nama_ayah'],
            'nama_ibu' => $request['nama_ibu'],
            'job_ayah' => $request['job_ayah'],
            'job_ibu' => $request['job_ibu'],
            'alamat_jl' => $request['alamat_jl'],
            'alamat_desa' => $request['alamat_desa'],
            'alamat_kec' => $request['alamat_kec'],
            'alamat_kab' => $request['alamat_kab'],
            'alamat_prov' => $request['alamat_prov'],
            'hp_ortu' => $request['hp_ortu'],
            'nama_wali' => $request['hp_wali'],
            'job_wali' => $request['job_wali'],
            'alamat_wali' =>  $request['alamat_wali'],
            'hp_wali' => $request['hp_wali']
        ]);

        $ortu = Ortu::where('id_siswa', $request['id_siswa'])->get();

        $updateSiswa = Siswa::where('nisn', $request['id_siswa'])->update(['id_ortu' => $ortu[0]->id]);

        return redirect('/adm-siswa');

            // print_r($ortu[0]->id);
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
     * @param  \App\Ortu  $ortu
     * @return \Illuminate\Http\Response
     */
    public function show(Ortu $ortu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ortu  $ortu
     * @return \Illuminate\Http\Response
     */
    public function edit(Ortu $ortu)
    {
        //

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ortu  $ortu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ortu $ortu)
    {
        //
        print_r($ortu);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ortu  $ortu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ortu $ortu)
    {
        //
    }
}
