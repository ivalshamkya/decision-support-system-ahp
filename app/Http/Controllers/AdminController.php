<?php

namespace App\Http\Controllers;

use App\Imports\SiswaImport;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Keputusan;
use App\Models\Kriteria;
use App\Models\Siswa;
use App\Models\SubKriteria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class AdminController extends Controller
{
    public function index()
    {
        $currentMonth = date('Y-m');

        $usersCountThisMonth = User::whereMonth('created_at', now()->month)->count();
        $totalUsersCount = User::count();
        $totalSiswaCount = Siswa::count();
        $totalKelasCount = Kelas::count();
        $siswaInClass = Kelas::leftJoin(DB::raw('(SELECT kelas_id, COUNT(*) as count FROM siswa GROUP BY kelas_id) as siswa_counts'), 'kelas.kelas_id', '=', 'siswa_counts.kelas_id')
            ->select('kelas.kelas_id', 'kelas.kelas', DB::raw('COALESCE(siswa_counts.count, 0) as count'))
            ->get();
        $keputusanCounts = DB::select(
            "
                                        SELECT months.month_number, COALESCE(keputusan_counts.count, 0) AS count
                                        FROM (
                                            SELECT month_number
                                            FROM (
                                                SELECT 1 AS month_number UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6
                                                UNION SELECT 7 UNION SELECT 8 UNION SELECT 9 UNION SELECT 10 UNION SELECT 11 UNION SELECT 12
                                            ) AS months
                                        ) AS months
                                        LEFT JOIN (
                                            SELECT DATE_FORMAT(created_at, '%Y-%m') AS month, COUNT(*) AS count, MONTH(created_at) AS month_number
                                            FROM keputusan
                                            WHERE created_at >= DATE_FORMAT(NOW(), '%Y-%m-01')
                                            GROUP BY month, month_number
                                        ) AS keputusan_counts ON months.month_number = keputusan_counts.month_number
                                        ORDER BY months.month_number;
                                    "
        );


        return view('admin.dashboard', ['totalUser' => $totalUsersCount, 'totalSiswa' => $totalSiswaCount, 'totalKelas' => $totalKelasCount, 'count_user_month' => $usersCountThisMonth, 'siswaInClass' => $siswaInClass, 'keputusanEachMonth' => $keputusanCounts]);
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////

    public function siswa()
    {

        if (!session()->has('user')) return redirect('/');

        $siswa = Siswa::join('kelas', 'siswa.kelas_id', '=', 'kelas.kelas_id')->get();

        return view('admin.siswa', ['siswas' => $siswa]);
    }

    public function importSiswa(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);
        $excel = \Excel::toArray(new SiswaImport, $request->file('file')->store('temp'));

        if(!$excel) {
            return back()->with('failed', 'Gagal! File tidak dapat diimport.');
        }

        $failedRows = 0;
        $successRows = 0;
        foreach ($excel as $data) {
            foreach ($data as $row) {
                try {
                    Siswa::create([
                        'nis' => $row[0],
                        'nama' => $row[1],
                        'matematika' => $row[2],
                        'indonesia' => $row[3],
                        'inggris' => $row[4],
                        'biologi' => $row[5],
                        'ekonomi' => $row[6],
                        'minat_siswa' => $row[7],
                        'kelas_id' => $row[8],
                    ]);
                    $successRows++;
                } catch (\Exception $e) {
                    $failedRows++;
                    continue;
                }
            }
        }

        if ($failedRows > 0) {
            if($successRows > 0) {
                return redirect()->back()->with('warning', 'Warning! Beberapa Data Siswa Gagal Diimport, Karena format tidak valid.');
            }
            else{
                return back()->with('failed', 'Gagal! Data Siswa Gagal Diimport, Pastikan file dan formatnya valid!');
            }
        }
        else{
            return redirect()->route('/dashboard/siswa')->with('success', 'Sukses! Data Siswa Berhasil Diimport');
        }
    }



    public function add_siswa()
    {

        if (!session()->has('user')) return redirect('/');

        $kelas = Kelas::all();
        $jurusan = Jurusan::all();

        return view('admin.add_siswa', ['kelas' => $kelas, 'jurusan' => $jurusan]);
    }
    public function insert_siswa(Request $request)
    {

        if (!session()->has('user')) return redirect('/');

        $validatedData = $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'matematika' => 'required',
            'indonesia' => 'required',
            'inggris' => 'required',
            'biologi' => 'required',
            'ekonomi' => 'required',
            'minat_siswa' => 'required',
            'kelas_id' => 'required',
        ]);

        Siswa::create($validatedData);

        return redirect()->route('/dashboard/siswa')->with('success', 'Sukses! Data Siswa Berhasil Disimpan');
    }
    public function delete_siswa(Request $request)
    {

        if (!session()->has('user')) return redirect('/');

        $siswa_id = $request->input('siswa_id');

        $siswa = Siswa::findorFail($siswa_id);

        $siswa->delete();

        return redirect()->route('/dashboard/siswa')->with('success', 'Sukses! Data Siswa Berhasil Dihapus');
    }
    public function edit_siswa($id)
    {

        $siswa = Siswa::find($id);
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();

        return view('admin.edit_siswa', ['siswa' => $siswa, 'kelas' => $kelas, 'jurusan' => $jurusan]);
    }
    public function update_siswa(Request $request)
    {
        if (!session()->has('user')) return redirect('/');

        $validatedData = $request->validate([
            'siswa_id' => 'required',
            'nis' => 'required',
            'nama' => 'required',
            'matematika' => 'required',
            'indonesia' => 'required',
            'inggris' => 'required',
            'biologi' => 'required',
            'ekonomi' => 'required',
            'minat_siswa' => 'required',
            'kelas_id' => 'required',
        ]);

        $siswa_id = $request->input('siswa_id');

        $siswa = Siswa::findorFail($siswa_id);

        $siswa->update($validatedData);

        return redirect()->route('/dashboard/siswa')->with('success', 'Sukses! Data Siswa Berhasil Diupdate');
    }

    ////////////////////////////////////////////////////////////////////////////////

    public function kelas()
    {

        if (!session()->has('user')) return redirect('/');

        $kelas = Kelas::all();

        return view('admin.kelas', ['kelas' => $kelas]);
    }
    public function add_kelas()
    {

        if (!session()->has('user')) return redirect('/');

        return view('admin.add_kelas');
    }
    public function insert_kelas(Request $request)
    {

        if (!session()->has('user')) return redirect('/');

        $validatedData = $request->validate([
            'kelas' => 'required',
        ]);

        Kelas::create($validatedData);

        return redirect()->route('/dashboard/kelas')->with('success', 'Sukses! Data Kelas Berhasil Disimpan');
    }
    public function delete_kelas(Request $request)
    {

        if (!session()->has('user')) return redirect('/');

        $kelas_id = $request->input('kelas_id');

        $kelas = Kelas::findorFail($kelas_id);

        $kelas->delete();

        return redirect()->route('/dashboard/kelas')->with('success', 'Sukses! Data kelas Berhasil Dihapus');
    }
    public function edit_kelas($id)
    {

        $kelas = Kelas::find($id);

        return view('admin.edit_kelas', ['kelas' => $kelas]);
    }
    public function update_kelas(Request $request)
    {
        if (!session()->has('user')) return redirect('/');

        $validatedData = $request->validate([
            'kelas_id' => 'required',
            'kelas' => 'required',
        ]);

        $kelas_id = $request->input('kelas_id');

        $kelas = Kelas::findorFail($kelas_id);

        $kelas->update($validatedData);

        return redirect()->route('/dashboard/kelas')->with('success', 'Sukses! Data kelas Berhasil Diupdate');
    }

    ///////////////////////////////////////////////////////////////////////

    public function jurusan()
    {

        if (!session()->has('user')) return redirect('/');

        $jurusan = Jurusan::all();

        return view('admin.jurusan', ['jurusan' => $jurusan]);
    }
    public function add_jurusan()
    {

        if (!session()->has('user')) return redirect('/');

        return view('admin.add_jurusan');
    }
    public function insert_jurusan(Request $request)
    {

        if (!session()->has('user')) return redirect('/');

        $validatedData = $request->validate([
            'kode_jurusan' => 'required',
            'nama_jurusan' => 'required',
        ]);

        Jurusan::create($validatedData);

        return redirect()->route('/dashboard/jurusan')->with('success', 'Sukses! Data jurusan Berhasil Disimpan');
    }
    public function delete_jurusan(Request $request)
    {

        if (!session()->has('user')) return redirect('/');

        $jurusan_id = $request->input('jurusan_id');

        $jurusan = Jurusan::findorFail($jurusan_id);

        $jurusan->delete();

        return redirect()->route('/dashboard/jurusan')->with('success', 'Sukses! Data jurusan Berhasil Dihapus');
    }
    public function edit_jurusan($id)
    {

        $jurusan = Jurusan::find($id);

        return view('admin.edit_jurusan', ['jurusan' => $jurusan]);
    }
    public function update_jurusan(Request $request)
    {
        if (!session()->has('user')) return redirect('/');

        $validatedData = $request->validate([
            'jurusan_id' => 'required',
            'kode_jurusan' => 'required',
            'nama_jurusan' => 'required',
        ]);

        $jurusan_id = $request->input('jurusan_id');

        $jurusan = Jurusan::findorFail($jurusan_id);

        $jurusan->update($validatedData);

        return redirect()->route('/dashboard/jurusan')->with('success', 'Sukses! Data jurusan Berhasil Diupdate');
    }

    //////////////////////////////////////////////////////////////////////////////////////

    public function kriteria()
    {

        if (!session()->has('user')) return redirect('/');

        $kriteria = Kriteria::all();

        return view('admin.kriteria', ['kriteria' => $kriteria]);
    }
    public function add_kriteria()
    {

        if (!session()->has('user')) return redirect('/');

        return view('admin.add_kriteria');
    }
    public function insert_kriteria(Request $request)
    {

        if (!session()->has('user')) return redirect('/');

        $validatedData = $request->validate([
            'kriteria_id' => 'required',
            'nama_kriteria' => 'required',
        ]);

        Kriteria::create($validatedData);

        return redirect()->route('/dashboard/kriteria')->with('success', 'Sukses! Data kriteria Berhasil Disimpan');
    }
    public function delete_kriteria(Request $request)
    {

        if (!session()->has('user')) return redirect('/');

        $kriteria_id = $request->input('kriteria_id');

        $kriteria = Kriteria::findorFail($kriteria_id);

        $kriteria->delete();

        return redirect()->route('/dashboard/kriteria')->with('success', 'Sukses! Data kriteria Berhasil Dihapus');
    }
    public function edit_kriteria($id)
    {

        $kriteria = Kriteria::find($id);

        return view('admin.edit_kriteria', ['kriteria' => $kriteria]);
    }
    public function update_kriteria(Request $request)
    {
        if (!session()->has('user')) return redirect('/');

        $validatedData = $request->validate([
            'kriteria_id' => 'required',
            'nama_kriteria' => 'required',
        ]);

        $kriteria_id = $request->input('old_id');

        $kriteria = Kriteria::where('kriteria_id', $kriteria_id);

        $kriteria->update($validatedData);

        return redirect()->route('/dashboard/kriteria')->with('success', 'Sukses! Data kriteria Berhasil Diupdate');
    }

    ///////////////////////////////////////////////////////////////////////////////////////////

    public function subkriteria()
    {

        if (!session()->has('user')) return redirect('/');

        $subkriteria = SubKriteria::all();

        return view('admin.subkriteria', ['subkriteria' => $subkriteria]);
    }
    public function add_subkriteria()
    {

        if (!session()->has('user')) return redirect('/');

        return view('admin.add_subkriteria');
    }
    public function insert_subkriteria(Request $request)
    {

        if (!session()->has('user')) return redirect('/');

        $validatedData = $request->validate([
            'sub_kriteria' => 'required',
            'bobot' => 'required',
        ]);

        SubKriteria::create($validatedData);

        return redirect()->route('/dashboard/subkriteria')->with('success', 'Sukses! Data Sub Kriteria Berhasil Disimpan');
    }
    public function delete_subkriteria(Request $request)
    {

        if (!session()->has('user')) return redirect('/');

        $sub_kriteria_id = $request->input('sub_kriteria_id');

        $subkriteria = SubKriteria::findorFail($sub_kriteria_id);

        $subkriteria->delete();

        return redirect()->route('/dashboard/subkriteria')->with('success', 'Sukses! Data Sub Kriteria Berhasil Dihapus');
    }
    public function edit_subkriteria($id)
    {

        $subkriteria = SubKriteria::find($id);

        return view('admin.edit_subkriteria', ['subkriteria' => $subkriteria]);
    }
    public function update_subkriteria(Request $request)
    {
        if (!session()->has('user')) return redirect('/');

        $validatedData = $request->validate([
            'sub_kriteria' => 'required',
            'bobot' => 'required',
        ]);

        $sub_kriteria_id = $request->input('sub_kriteria_id');

        $subkriteria = SubKriteria::where('sub_kriteria_id', $sub_kriteria_id);

        $subkriteria->update($validatedData);

        return redirect()->route('/dashboard/subkriteria')->with('success', 'Sukses! Data Sub Kriteria Berhasil Diupdate');
    }

    ////////////////////////////////////////////////////////////////////////////////////

    public function perhitungan()
    {

        if (!session()->has('user')) return redirect('/');

        $siswa = Siswa::all();
        $kelas = Kelas::all();
        $kriteria = Kriteria::all();

        return view('admin.perhitungan', ['siswa' => $siswa, 'kelas' => $kelas, 'kriterias' => $kriteria]);
    }

    public function alternatif(Request $request)
    {

        if (!session()->has('user')) return redirect('/');
        if (empty($request->input('siswa_id'))) return redirect('/dashboard/perhitungan');

        $siswa = Siswa::where('siswa_id', $request->input('siswa_id'))->get();
        $kriteria = Kriteria::all();
        $jurusan = Jurusan::all();

        $kriteria_pw = array();

        foreach ($kriteria as $key => $value) {
            $kriteria_pw[$value->nama_kriteria] = $request->input('value-pw-' . ($key + 1));
        }

        return view('admin.alternatif', ['siswa' => $siswa, 'jurusan' => $jurusan, 'kriterias' => $kriteria, 'kriteria_pw' => $kriteria_pw]);
    }

    public function save_keputusan(Request $request)
    {

        if (!session()->has('user')) return redirect('/');
        if (empty($request->input('siswa_id')) || empty($request->input('jurusan_id'))) return redirect('/dashboard/perhitungan');

        $validatedData = $request->validate([
            'siswa_id' => 'required',
            'jurusan_id' => 'required',
        ]);

        Keputusan::create($validatedData);

        return redirect()->route('/dashboard/perankingan')->with('success', 'Sukses! Data Berhasil Disimpan');
    }
    public function delete_keputusan(Request $request)
    {

        if (!session()->has('user')) return redirect('/');

        $keputusan_id = $request->input('keputusan_id');

        $keputusan = Keputusan::findorFail($keputusan_id);

        $keputusan->delete();

        return redirect()->route('/dashboard/perankingan')->with('success', 'Sukses! Data Perankingan Berhasil Dihapus');
    }

    public function perankingan()
    {

        $keputusan = Keputusan::join('siswa', 'keputusan.siswa_id', '=', 'siswa.siswa_id')
            ->join('kelas', 'siswa.kelas_id', '=', 'kelas.kelas_id')
            ->join('jurusan', 'keputusan.jurusan_id', '=', 'jurusan.jurusan_id')
            ->get();

        return view('admin.perankingan', ['keputusan' => $keputusan]);
    }
    public function print_perankingan(Request $request)
    {
        $id = $request->input('id');
        if (!empty($id)) {
            $keputusan = Keputusan::join('siswa', 'keputusan.siswa_id', '=', 'siswa.siswa_id')
                ->join('kelas', 'siswa.kelas_id', '=', 'kelas.kelas_id')
                ->join('jurusan', 'keputusan.jurusan_id', '=', 'jurusan.jurusan_id')
                ->where('keputusan.siswa_id', $id)
                ->get();
            return view('print_rank', ['keputusan' => $keputusan]);
        } else {
            $keputusan = Keputusan::join('siswa', 'keputusan.siswa_id', '=', 'siswa.siswa_id')
                ->join('kelas', 'siswa.kelas_id', '=', 'kelas.kelas_id')
                ->join('jurusan', 'keputusan.jurusan_id', '=', 'jurusan.jurusan_id')
                ->get();
            return view('print_rank', ['keputusan' => $keputusan]);
        }
    }
}
