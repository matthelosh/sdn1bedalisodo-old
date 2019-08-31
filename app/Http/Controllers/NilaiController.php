<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Nilai;
use App\Tapel;
use App\Semester;
use App\Rombel;
use App\User;
use App\Guru;
use Illuminate\Http\Request;



class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Periode
        $user = Auth::user();
        $periode = Tapel::all();
        $semester = Semester::all();
        $guru = DB::table('guru')->where('nama_guru', $user->name)->get();
        $rombel = DB::table('rombel')->where('id_guru', $guru[0]->nip)->get();
        // echo '<br />';
        // echo $guru[0]->nip;
        // echo '<br />';
        // echo $rombel;
        return view('home', ['title' => 'Entri Nilai', 'p'=>'guru-nilai', 'kode_rombel'=>$rombel]);
    }

    public function getNilaiByGuru(Request $request) {
        // return $request->query();
        // $siswas = 'App\Siswa'::where('id_rombel', $request->query('rombel'))->get();
        // return $siswas;
        // rombel: vi
        // mapel: pkn
        // sem: ganjil
        // tapel: 19_20
        // $idRombel = $request->query('rombel');
        // $idmapel = $request->query('mapel');
        // $idSem = $request->query('sem');
        // $tapel = $request->query('tapel');
        // ($query) { $query->orWhere('lastKnownUpAt','<>', '0'); }
        $req = $request;
        $siswas = DB::table('siswas')
                    ->where('siswas.id_rombel', $req->query('rombel'))
                    ->leftJoin('nilais', function ($leftJoin) use ($req) {
                        $leftJoin->on('siswas.nisn', '=', 'nilais.id_siswa')
                            ->where([
                                ['nilais.id_periode', '=', $req->query('tapel')],
                                ['nilais.id_semester', '=', $req->query('sem')],
                                ['nilais.id_mapel', '=', $req->query('mapel')],
                                ['nilais.id_rombel', '=', $req->query('rombel')],
                                ['nilais.id_kd', '=', $req->query('kd')],
                                ['nilais.ket', '=', $req->query('ket')]
                            ]);
                    })
                    ->get();

        return compact('siswas');
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
     * @param  \App\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show(Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai $nilai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nilai $nilai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai $nilai)
    {
        //
    }
}
