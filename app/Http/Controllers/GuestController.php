<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        return view('guest.dashboard');
    }

    public function siswa() {

        $siswa = Siswa::join('kelas', 'siswa.kelas_id', '=', 'kelas.kelas_id')->get();

        return view('guest.siswa', ['siswas' => $siswa]);
    }

    public function rekomendasi() {

        $kelas = Kelas::all();

        return view('guest.rekomendasi', ['kelas' => $kelas]);
    }
}
