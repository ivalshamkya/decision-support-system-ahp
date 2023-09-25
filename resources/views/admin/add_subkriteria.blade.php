@extends('layouts.layout')

@section('breadcrumb')
    Add Sub Kriteria
@endsection

@section('container')
    <div class="p-7 bg-white shadow rounded-lg">
        <div class="flex justify-between mb-5">
            <div>
                <h1 class="text-3xl text-slate-900 font-medium mb-1">Tambah Sub Kriteria</h1>
                <h5 class="text-base text-slate-700 mb-5">Dashboard/Tambah Sub Kriteria</h5>
            </div>
        </div>
        <div class="relative overflow-x-auto px-1 sm:rounded-lg">
            <form action="{{ route('/dashboard/subkriteria/insert') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="sub_kriteria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sub Kriteria</label>
                    <input type="text" id="sub_kriteria" name="sub_kriteria" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Sub Kriteria.." required>
                </div>
                <div class="mb-6">
                    <label for="bobot" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bobot</label>
                    <input type="number" id="bobot" name="bobot" min="0" max="9" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Bobot.." required>
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