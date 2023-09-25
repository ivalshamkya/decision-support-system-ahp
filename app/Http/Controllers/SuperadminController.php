<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SuperadminController extends Controller
{
    public function index()
    {
        
        $usersCountThisMonth = User::whereMonth('created_at', now()->month)->count();
        $totalUsersCount = User::count();
        $siswaInClass = Siswa::select('kelas_id', DB::raw('COUNT(*) as count'))
                        ->join('kelas', 'kelas.kelas_id', '=', 'siswa.kelas_id')
                        ->groupBy('siswa.kelas_id')
                        ->get();

        return view('superadmin.dashboard', ['total_user' => $totalUsersCount ,'count_user_month' => $usersCountThisMonth, 'siswa_in_class' => $siswaInClass]);
    }

    public function users() {

        if(!session()->has('user')) return redirect('/');

        $users = User::all();

        return view('superadmin.users', ['users' => $users]);
    }
    public function add_users() {

        if(!session()->has('user')) return redirect('/');

        return view('superadmin.add_users');
    }
    public function insert_users(Request $request) {

        if(!session()->has('user')) return redirect('/');

        $validatedData = $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'jabatan' => 'required',
            'role' => 'required',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('/dashboard/users')->with('success', 'Sukses! Data user Berhasil Disimpan');
    }
    public function delete_users(Request $request) {

        if(!session()->has('user')) return redirect('/');

        $user_id = $request->input('user_id');

        $user = User::findorFail($user_id);

        $user->delete();

        return redirect()->route('/dashboard/users')->with('success', 'Sukses! Data user Berhasil Dihapus');
    }
    public function edit_users($id) {
        
        $user = User::find($id);

        return view('superadmin.edit_users', ['user' => $user]);

    }
    public function update_users(Request $request) {
        if(!session()->has('user')) return redirect('/');
        
        if(empty($request->input('password'))) {
            $validatedData = $request->validate([
                'user_id' => 'required',
                'nama' => 'required',
                'username' => 'required',
                'email' => 'required',
                'jabatan' => 'required',
                'role' => 'required',
            ]);
        }
        else {
            $validatedData = $request->validate([
                'user_id' => 'required',
                'nama' => 'required',
                'username' => 'required',
                'email' => 'required',
                'password' => 'required',
                'jabatan' => 'required',
                'role' => 'required',
            ]);
        }
    
        $user_id = $request->input('user_id');
    
        $user = user::findorFail($user_id);
    
        $user->update($validatedData);
    
        return redirect()->route('/dashboard/users')->with('success', 'Sukses! Data user Berhasil Diupdate');
    }
}
