<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->level == 'guru'){
            $usernama = Auth::user()->name;
            $guru = 'App\Guru'::where('nama_guru', $usernama)->get();
            $rombel = 'App\Rombel'::where('id_guru', $guru[0]->nip)->get();

            return view('home', ['p'=> 'admHome', 'rombel' => $rombel[0], 'title' => 'Dashboard'] );
        }
        return view('home', ['p'=>'admHome','title'=>'Dashboard', 'rombel' => null]);
        // echo $rombel[0];
    }
}
