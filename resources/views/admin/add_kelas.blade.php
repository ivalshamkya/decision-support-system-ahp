@extends('layouts.layout')

@section('breadcrumb')
    Add Kelas
@endsection

@section('container')
    <div class="p-7 bg-white shadow rounded-lg">
        <div class="flex justify-between mb-5">
            <div>
                <h1 class="text-3xl text-slate-900 font-medium mb-1">Tambah Kelas</h1>
                <h5 class="text-base text-slate-700 mb-5">Dashboard/Tambah Kelas</h5>
            </div>
        </div>
        <div class="relative overflow-x-auto px-1 sm:rounded-lg">
            <form action="{{ route('/dashboard/kelas/insert') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                    <input type="text" id="kelas" name="kelas" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Kelas.." required>
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