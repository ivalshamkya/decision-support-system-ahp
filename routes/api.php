<?php

use App\Models\Keputusan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get_siswa', function(Request $request) {

    $id = $request->input('id');
    if(!empty($id)){
        $siswa = Siswa::where('kelas_id', $id)->get();    
    }
    else{
        $siswa = Siswa::all();
    }
    return response()->json($siswa);
})->name('/guest/siswa/get');

Route::get('/get_siswa/id', function(Request $request) {

    $id = $request->input('id');
    if(!empty($id)){
        $siswa = Siswa::where('siswa_id', $id)->get();    
    }
    else{
        $siswa = Siswa::all();
    }
    return response()->json($siswa);
})->name('/siswa/by/id');

Route::get('/get_rekomendasi', function(Request $request) {

    $id = $request->input('id');
    if(!empty($id)){
        $keputusan = Keputusan::join('siswa', 'keputusan.siswa_id', '=', 'siswa.siswa_id')
                                ->join('kelas', 'siswa.kelas_id', '=', 'kelas.kelas_id')
                                ->join('jurusan', 'keputusan.jurusan_id', '=', 'jurusan.jurusan_id')
                                ->where('keputusan.siswa_id', $id)
                                ->get(); 
        return response()->json($keputusan);
    }
    else{
        $message = "ID parameter is empty.";
        return response()->json(['message' => $message]);
    }
})->name('/guest/rekomendasi/get');

