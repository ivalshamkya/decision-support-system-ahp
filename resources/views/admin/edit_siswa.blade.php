@extends('layouts.layout')

@section('breadcrumb')
    Add Siswa
@endsection

@section('container')
    <div class="p-7 bg-white shadow rounded-lg">
        <div class="flex justify-between mb-5">
            <div>
                <h1 class="text-3xl text-slate-900 font-medium mb-1">Edit Siswa</h1>
                <h5 class="text-base text-slate-700 mb-5">Dashboard/Edit Siswa</h5>
            </div>
        </div>
        <div class="relative overflow-x-auto px-1 sm:rounded-lg">
            <form action="{{ route('/dashboard/siswa/update') }}" method="POST">
                @csrf
                <input type="hidden" name="siswa_id" value="{{ $siswa->siswa_id }}">
                <div class="mb-6">
                    <label for="nis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIS</label>
                    <input type="text" id="nis" name="nis" value="{{ $siswa->nis }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="NIS.." required>
                </div>
                <div class="mb-6">
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                    <input type="text" id="nama" name="nama" value="{{ $siswa->nama }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nama.." required>
                </div>
                <div class="mb-6 flex justify-between space-x-2">
                    <div>
                        <label for="matematika" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Matematika</label>
                        <input type="number" name="matematika" value="{{ $siswa->matematika }}" min="0" max="100" id="matematika" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="0 ~ 100" required>
                    </div>
                    <div>
                        <label for="indonesia" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Indonesia</label>
                        <input type="number" name="indonesia" value="{{ $siswa->indonesia }}" min="0" max="100" id="indonesia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="0 ~ 100" required>
                    </div>
                    <div>
                        <label for="inggris" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Inggris</label>
                        <input type="number" name="inggris" value="{{ $siswa->inggris }}" min="0" max="100" id="inggris" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="0 ~ 100" required>
                    </div>
                    <div>
                        <label for="biologi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Biologi</label>
                        <input type="number" name="biologi" value="{{ $siswa->biologi }}" min="0" max="100" id="biologi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="0 ~ 100" required>
                    </div>
                    <div>
                        <label for="ekonomi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ekonomi</label>
                        <input type="number" name="ekonomi" value="{{ $siswa->ekonomi }}" min="0" max="100" id="ekonomi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="0 ~ 100" required>
                    </div>
                </div>
                <div class="mb-6">
                    <label for="minat_siswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Minat Siswa</label>
                    <select id="minat_siswa" name="minat_siswa" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="" selected disabled>Pilih Minat Siswa</option>
                        @foreach ($jurusan as $jrs)
                            <option value="{{$jrs->nama_jurusan}}" @if ($jrs->nama_jurusan == $siswa->minat_siswa) selected @endif>{{$jrs->nama_jurusan}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-6">
                    <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                    <select id="kelas" name="kelas_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="" disabled>Pilih Kelas</option>
                        @foreach ($kelas as $kls)
                            <option value="{{$kls->kelas_id}}" @if ($siswa->kelas_id == $kls->kelas_id) selected @endif>{{$kls->kelas}}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection