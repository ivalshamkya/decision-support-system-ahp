@extends('layouts.layout')

@section('breadcrumb')
    Jurusan
@endsection

@section('container')
    <div class="p-7 bg-white shadow rounded-lg">
        <div class="flex justify-between mb-5">
            <div>
                <h1 class="text-3xl text-slate-900 font-medium mb-1">Data Kriteria</h1>
                <h5 class="text-base text-slate-700 mb-5">Dashboard/Data Kriteria</h5>
                <a href="{{ route('/dashboard/kriteria/add') }}">
                    <!-- <button
                        class="bg-blue-600 text-white flex items-center px-3 py-2 rounded-lg hover:bg-blue-700">+ New Kriteria
                    </button> -->
                </a>
            </div>
        </div>
        <div class="relative overflow-x-auto sm:rounded-lg">
            <table class="w-full text-sm text-left row-border text-gray-500 divide-y divide-gray-300" id="myTable">
                <thead class="text-xs uppercase bg-gray-800 text-gray-100">
                    <tr class="text-center">
                        <th scope="col" class="px-6 py-5">
                            No
                        </th>
                        <th scope="col" class="px-6 py-5">
                            ID Kriteria
                        </th>
                        <th scope="col" class="px-6 py-5">
                            Nama Kriteria
                        </th>
                        <!-- <th scope="col" class="px-6 py-5">
                            Action
                        </th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kriteria as $i => $kt)
                    <tr class="bg-white border-b text-center">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $i+1 }}
                        </th>
                        <td class="px-6 py-4 text-gray-900">
                            {{ $kt->kriteria_id }}
                        </td>
                        <td class="px-6 py-4 text-gray-900">
                            {{ $kt->nama_kriteria }}
                        </td>
                        <!-- <td class="px-6 py-4">
                            <a href="{{ url('/dashboard/kriteria/edit/' . $kt->kriteria_id) }}">
                                <button type="button" class="text-white tracking-wide focus:outline-none focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 bg-teal-500 hover:bg-teal-700 focus:ring-teal-900">Edit</button>
                            </a>
                            <button type="button" data-modal-target="popup-modal-{{ $kt->kriteria_id }}"
                                data-modal-toggle="popup-modal-{{ $kt->kriteria_id }}"
                                class=" text-white tracking-wide focus:outline-none focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 bg-red-600 hover:bg-red-700 focus:ring-red-900">Delete
                            </button>

                            <div id="popup-modal-{{ $kt->kriteria_id }}" tabindex="-1"
                                class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative w-full max-w-md max-h-full">
                                    <div class="relative bg-white rounded-lg shadow">
                                        <button type="button"
                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                                            data-modal-hide="popup-modal-{{ $kt->kriteria_id }}">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <form action="{{ route('/dashboard/kriteria/delete') }}" method="POST"
                                            class="p-6 text-center">
                                            @csrf
                                            <input type="hidden" name="kriteria_id" value="{{ $kt->kriteria_id }}">
                                            <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500">Are
                                                Apakah kamu yakin untuk menghapus data ini?</h3>
                                            <button data-modal-hide="popup-modal-{{ $kt->kriteria_id }}" type="submit"
                                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Ya, Saya yakin
                                            </button>
                                            <button data-modal-hide="popup-modal-{{ $kt->kriteria_id }}" type="button"
                                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">No,
                                                cancel</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td> -->
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection