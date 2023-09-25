@extends('layouts.layout')

@section('breadcrumb')
    Add Users
@endsection

@section('container')
    <div class="p-7 bg-white shadow rounded-lg">
        <div class="flex justify-between mb-5">
            <div>
                <a href="{{ route('/dashboard/users') }}" class="mb-7 flex text-gray-600">
                    <i data-feather="arrow-left"></i> Back
                </a>
                <h1 class="text-3xl text-slate-900 font-medium mb-1">Edit Users</h1>
                <h5 class="text-base text-slate-700 mb-5">Dashboard/Edit Users</h5>
            </div>
        </div>
        <div class="relative overflow-x-auto px-1 sm:rounded-lg">
            <form action="{{ route('/dashboard/users/update') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                <div class="grid grid-cols-2 gap-2">
                    <div class="mb-6">
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <input type="text" id="nama" name="nama" value="{{ $user->nama }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nama.." required>
                    </div>
                    <div class="mb-6">
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                        <input type="text" id="username" name="username" value="{{ $user->username }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Username.." required>
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" id="email" name="email" value="{{ $user->email }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Email.." required>
                    </div>
                    <div class="mb-6">
                        <label for="password" class="flex mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Password
                            <button data-tooltip-target="tooltip-light" data-tooltip-trigger="hover" type="button" class="px-2 text-red-600"><i class="fa fa-info"></i></button>
                            <div id="tooltip-light" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                                Biarkan kosong apabila tidak ingin mengubah password!
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </label>
                        <input type="password" id="password" name="password" minlength="8" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Password..">
                    </div>
                    <div class="mb-6">
                        <label for="jabatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jabatan</label>
                        <input type="text" id="jabatan" name="jabatan" value="{{ $user->jabatan }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Jabatan.." required>
                    </div>
                    <div class="mb-6">
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                        <select id="role" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                            <option value="" disabled>Pilih Role</option>
                            <option value="admin" @if ($user->role == "admin") selected @endif>Admin</option>
                            <option value="superadmin" @if ($user->role == "superadmin") selected @endif>Superadmin</option>
                        </select>
                    </div>
                </div>
                <div>
                    <button type="submit" class="flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center">
                        <i class="fa fa-floppy-o"></i>&nbsp;Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection