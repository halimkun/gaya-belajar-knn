<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (Auth::user()->hasRole('siswa')) {
            return $this->siswaDashboard();
        }

        return view('dashboard');
    }

    /**
     * Show the application dashboard for siswa.
     *
     * @return \Illuminate\View\View
     */
    public function siswaDashboard()
    {
        return view('siswa.dashboard', [
            'detail'      => Auth::user()->siswaDetail,
            'assessments' => Auth::user()->assessments,
        ]);
    }
}
