@extends('layouts.layout')

@section('breadcrumb')
    Hasil Perankingan
@endsection

@section('container')
    <div class="p-7 bg-white shadow rounded-lg">
        <div class="flex justify-between mb-5">
            <div>
                <h1 class="text-3xl text-slate-900 font-medium mb-1">Hasil Perankingan</h1>
                <h5 class="text-base text-slate-700 mb-5">Dashboard/Hasil Perankingan</h5>
                <a href="{{ route('/dashboard/perankingan/print') }}">
                    <button
                        class="bg-blue-600 text-white flex items-center px-3 py-2 rounded-lg hover:bg-blue-700">
                        <ion-icon name="print" class="text-lg mr-1"></ion-icon>
                        Cetak
                    </button>
                </a>
            </div>
        </div>
        <div class="relative overflow-x-auto sm:rounded-lg">
            <table class="w-full text-sm text-left row-border text-gray-500 divide-y divide-gray-300 " id="myTable">
                <thead class="text-xs uppercase bg-gray-800 text-gray-100">
                    <tr>
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
                            Hasil Rekomendasi
                        </th>
                        <th scope="col" class="px-6 py-5">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($keputusan as $rank)
                        <tr class="bg-white border-b text-center">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $loop->iteration }}
                            </th>
                            <td class="px-6 py-4 text-gray-900">
                                {{ $rank->nis }}
                            </td>
                            <td class="px-6 py-4 text-gray-900">
                                {{ $rank->nama }}
                            </td>
                            <td class="px-6 py-4 text-gray-900">
                                {{ $rank->kelas }}
                            </td>
                            <td class="px-6 py-4 text-gray-900">
                                {{ $rank->nama_jurusan }}
                            </td>
                            <td class="px-6 py-4">
                                <button type="button" data-modal-target="deleteModal"
                                    data-modal-toggle="deleteModal"
                                    onclick="showDeleteModal({{$rank->keputusan_id}})"
                                    class=" text-white tracking-wide focus:outline-none focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 bg-red-600 hover:bg-red-700 focus:ring-red-900">Hapus</button>

                                </td>
                            </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <div id="deleteModal" tabindex="-1"
        class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                    data-modal-hide="deleteModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <form action="{{ route('/dashboard/keputusan/delete') }}" method="POST"
                    class="p-6 text-center">
                    @csrf
                    <input type="hidden" name="keputusan_id" value="">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500">Apakah kamu yakin untuk menghapus data ini?</h3>
                    <button data-modal-hide="deleteModal" type="submit"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Ya, Saya yakin
                    </button>
                    <button data-modal-hide="deleteModal" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Batal</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).on('click', '[data-modal-toggle="deleteModal"]', function() {
            var targetModal = $(this).data('modal-target');
            
            $('body').addClass('overflow-hidden');
            $('#' + targetModal).attr('role', 'dialog');
            $('#' + targetModal).attr('aria-modal', 'true');
            $('#' + targetModal).removeClass('hidden');
            $('#' + targetModal).addClass('flex');
            $('#' + targetModal).removeAttr('aria-hidden');
            $('#' + targetModal).show();
        });
        
        $(document).on('click', '[data-modal-hide="deleteModal"]', function() {
            var targetModal = $(this).data('modal-hide');
            
            $('body').removeClass('overflow-hidden');
            $('#' + targetModal).addClass('hidden');
            $('#' + targetModal).removeAttr('aria-modal');
            $('#' + targetModal).removeAttr('role');
            $('#' + targetModal).removeClass('flex');
            $('#' + targetModal).attr('aria-hidden', 'true');
            $('#' + targetModal).hide();
        });
        
        function showDeleteModal(siswaId) {
            $('#deleteModal input[name="keputusan_id"]').val(siswaId);
            
            $('body').addClass('overflow-hidden');
            $('#deleteModal').addClass('flex');
            $('#deleteModal').attr('role', 'dialog');
            $('#deleteModal').attr('aria-modal', 'true');
            $('#deleteModal').removeClass('hidden');
            $('#deleteModal').removeAttr('aria-hidden');
            $('#deleteModal').show();
        }
    </script>
@endsection