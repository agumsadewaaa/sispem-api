<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Flash;

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
        $this->middleware(function ($request, $next) {
            if (Auth::user()->isActive()) {
                if (Auth::user()->isUser()) {
                    if (!Auth::user()->hasPeminjam()) {
                        Flash::warning('Silahkan lengkapi dahulu data Anda!');
                        return redirect(route('users.peminjams.create', [Auth::user()->id]));
                    }
                }
                return $next($request);
            }
            Flash::error("<i class='fa fa-exclamation-triangle'> </i> Akun anda ditangguhkan. Silahkan Hubungi admin.");
            return $next($request);
        });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
