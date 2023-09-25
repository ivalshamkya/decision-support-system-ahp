@extends('layouts.layout')

@section('breadcrumb')
    Add Jurusan
@endsection

@section('container')
    <div class="p-7 bg-white shadow rounded-lg">
        <div class="flex justify-between mb-5">
            <div>
                <h1 class="text-3xl text-slate-900 font-medium mb-1">Tambah Jurusan</h1>
                <h5 class="text-base text-slate-700 mb-5">Dashboard/Tambah Jurusan</h5>
            </div>
        </div>
        <div class="relative overflow-x-auto px-1 sm:rounded-lg">
            <form action="{{ route('/dashboard/jurusan/insert') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="kode_jurusan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Jurusan</label>
                    <input type="text" id="kode_jurusan" name="kode_jurusan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Kode Jurusan.." required>
                </div>
                <div class="mb-6">
                    <label for="nama_jurusan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Jurusan</label>
                    <input type="text" id="nama_jurusan" name="nama_jurusan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nama Jurusan.." required>
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