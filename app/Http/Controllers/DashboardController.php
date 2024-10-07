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

        // Chart Data
        $jmlSiswaByGender      = \App\Models\Dataset::selectRaw('jk, count(*) as jml')->groupBy('jk')->get();
        $jmlSiswaByJurusan     = \App\Models\Dataset::selectRaw('jurusan, count(*) as jml')->groupBy('jurusan')->get();
        $jmlLabel              = \App\Models\Dataset::selectRaw('label, count(*) as jml')->groupBy('label')->get();
        $dataJmlLabelByGender  = $this->getLabelByGenderData();
        $dataJmlLabelByJurusan = $this->getLabelByJurusanData();

        return view('dashboard', [
            'jmlSiswaByGender'      => $jmlSiswaByGender,
            'jmlSiswaByJurusan'     => $jmlSiswaByJurusan,
            'jmlLabel'              => $jmlLabel,
            'dataJmlLabelByGender'  => $dataJmlLabelByGender,
            'dataJmlLabelByJurusan' => $dataJmlLabelByJurusan,
        ]);
    }

    private function getLabelByJurusanData()
    {
        $jmlLabelByJurusan = \App\Models\Dataset::selectRaw('label, jurusan, count(*) as jml')->groupBy('label', 'jurusan')->get()->groupBy('jurusan');

        // Ekstrak label yang unik dari semua data
        $dataJmlLabelByJurusan = [
            "label" => $jmlLabelByJurusan->flatten(1)->pluck('label')->unique()->values(),
            "jurusan" => $jmlLabelByJurusan->keys(),
        ];

        // Ekstrak data jumlah untuk setiap jurusan berdasarkan label
        $dataJmlLabelByJurusan['jurusanData'] = [];
        foreach ($dataJmlLabelByJurusan['jurusan'] as $jurusan) {
            $dataJmlLabelByJurusan['jurusanData'][$jurusan] = $dataJmlLabelByJurusan['label']->map(function ($label) use ($jmlLabelByJurusan, $jurusan) {
                return $jmlLabelByJurusan->get($jurusan)->where('label', $label)->pluck('jml')->first() ?? 0;
            });
        }

        return $dataJmlLabelByJurusan;
    }

    private function getLabelByGenderData()
    {
        $jmlLabelByGender  = \App\Models\Dataset::selectRaw('label, jk, count(*) as jml')->groupBy('label', 'jk')->get()->groupBy('jk');

        // Ekstrak label yang unik dari semua data
        $dataJmlLabelByGender = [
            "label" => $jmlLabelByGender->flatten(1)->pluck('label')->unique()->values(),
        ];

        // Ekstrak data jumlah untuk perempuan, laki-laki, dan lainnya berdasarkan label
        $dataJmlLabelByGender['perempuanData'] = $dataJmlLabelByGender['label']->map(function ($label) use ($jmlLabelByGender) {
            return $jmlLabelByGender->get('Perempuan')->where('label', $label)->pluck('jml')->first() ?? 0;
        });

        $dataJmlLabelByGender['lakiData'] = $dataJmlLabelByGender['label']->map(function ($label) use ($jmlLabelByGender) {
            return $jmlLabelByGender->get('Laki-Laki')->where('label', $label)->pluck('jml')->first() ?? 0;
        });

        $dataJmlLabelByGender['otherData'] = $dataJmlLabelByGender['label']->map(function ($label) use ($jmlLabelByGender) {
            return $jmlLabelByGender->get('')->where('label', $label)->pluck('jml')->first() ?? 0;
        });

        return $dataJmlLabelByGender;
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
