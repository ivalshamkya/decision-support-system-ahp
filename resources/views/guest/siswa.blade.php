@extends('layouts.layout')

@section('breadcrumb')
    Siswa
@endsection

@section('container')
    <div class="p-7 bg-white shadow rounded-lg">
        <div class="flex justify-between mb-5">
            <div>
                <h1 class="text-3xl text-slate-900 font-medium mb-1">Data Siswa</h1>
                <h5 class="text-base text-slate-700 mb-5">Dashboard/Data Siswa</h5>
            </div>
        </div>
        <div class="relative overflow-x-auto sm:rounded-lg">
            <table class="w-full text-sm text-left row-border text-gray-500 divide-y divide-gray-300 " id="myTable">
                <thead class="text-xs uppercase bg-gray-800 text-gray-100">
                    <tr class="text-center">
                        <th scope="col" class="px-6 py-5">
                            No
                        </th>
                        <th scope="col" class="px-6 py-5">
                            NIS
                        </th>
                        <th scope="col" class="px-6 py-5">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-5">
                            Kelas
                        </th>
                        <th scope="col" class="px-6 py-5">
                            Matematika
                        </th>
                        <th scope="col" class="px-6 py-5">
                            B.Indonesia
                        </th>
                        <th scope="col" class="px-6 py-5">
                            B.Inggris
                        </th>
                        <th scope="col" class="px-6 py-5">
                            Biologi
                        </th>
                        <th scope="col" class="px-6 py-5">
                            Ekonomi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswas as $i => $siswa)
                    <tr class="bg-white border-b text-center">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $i+1 }}
                        </th>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $siswa->nis }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $siswa->nama }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $siswa->kelas }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $siswa->matematika }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $siswa->indonesia }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $siswa->inggris }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $siswa->biologi }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $siswa->ekonomi }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection