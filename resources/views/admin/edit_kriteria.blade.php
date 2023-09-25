@extends('layouts.layout')

@section('breadcrumb')
    Edit Kriteria
@endsection

@section('container')
    <div class="p-7 bg-white shadow rounded-lg">
        <div class="flex justify-between mb-5">
            <div>
                <h1 class="text-3xl text-slate-900 font-medium mb-1">Edit Kriteria</h1>
                <h5 class="text-base text-slate-700 mb-5">Dashboard/Edit Kriteria</h5>
            </div>
        </div>
        <div class="relative overflow-x-auto px-1 sm:rounded-lg">
            <form action="{{ route('/dashboard/kriteria/update') }}" method="POST">
                @csrf
                <input type="hidden" name="old_id" value="{{ $kriteria->kriteria_id }}">
                <div class="mb-6">
                    <label for="kriteria_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID Kriteria</label>
                    <input type="text" id="kriteria_id" value="{{ $kriteria->kriteria_id }}" name="kriteria_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="ID Kriteria.." required>
                </div>
                <div class="mb-6">
                    <label for="nama_kriteria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Kriteria</label>
                    <input type="text" id="nama_kriteria" value="{{ $kriteria->nama_kriteria }}" name="nama_kriteria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nama Kriteria.." required>
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