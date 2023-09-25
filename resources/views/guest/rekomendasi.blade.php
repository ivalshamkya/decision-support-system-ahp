@extends('layouts.layout')

@section('breadcrumb')
    Rekomendasi Jurusan
@endsection

@section('container')
    <div class="px-7 pt-4">
        <div class="flex justify-between mb-5">
            <div>
                <h1 class="text-3xl text-slate-900 font-medium mb-1">Siswa</h1>
                <h5 class="text-base text-slate-700 mb-5">Dashboard/Rekomendasi Jurusan</h5>
            </div>
        </div>
    </div>
    <div class="p-7 mb-5 bg-white shadow rounded-lg">
        <div class="relative overflow-x-auto sm:rounded-lg">
            <h1 class="text-xl md:text-2xl font-medium mb-5">Pilih Siswa</h1>
            <div class="grid grid-cols-2 gap-5">
                <div class="mb-6">
                    <label for="kelas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                    <select id="kelas" name="kelas_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="" selected disabled>Pilih Kelas</option>
                        @foreach ($kelas as $kls)
                            <option value="{{$kls->kelas_id}}">{{$kls->kelas}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-6">
                    <label for="user" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                    <select id="user" name="user_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="" selected disabled>Pilih Nama</option>
                    </select>
                </div>
            </div>
            <div>
                <button id="btn-lihat" class="bg-gradient-to-br from-blue-500 to-blue-700 text-white flex items-center justify-between px-3 py-2.5 rounded-lg transition ease-in duration-200 hover:shadow-xl">Lihat Rekomendasi</button>
            </div>
        </div>
    </div>
    <div class="hidden" id="target">
        {{-- <div class="p-7 mb-5 bg-white shadow rounded-lg">
            <div class="relative overflow-x-auto sm:rounded-lg">
                <h1 class="text-xl md:text-2xl font-medium mb-5">Siswa yang dipilih</h1>
                <div class="grid grid-cols-2 gap-5">
                    <div class="mb-6 flex space-x-2 text-xl">
                        <span>Nama :</span>
                        <span>Yui</span>
                    </div>
                    <div class="mb-6 flex space-x-2 text-xl">
                        <span>Kelas :</span>
                        <span>XII IPA 4</span>
                    </div>
                </div>
            </div>
        </div> --}}
    
        <div class="p-7 mb-5 bg-white shadow rounded-lg">
            <div class="relative overflow-x-auto sm:rounded-lg">
                <h1 class="text-xl md:text-2xl font-medium mb-5">Hasil Rekomendasi</h1>
                <table class="w-full text-sm text-left row-border text-gray-500 divide-y divide-gray-300" id="myTableWithBtn">
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
                                Hasil Rekomendasi
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tbl_rank">
                    </tbody>
                </table>
                {{-- <div class="flex">
                    <button class="bg-blue-600 text-white flex items-center px-3 py-2 rounded-lg hover:bg-blue-700 disabled:bg-blue-950" disabled><i data-feather="printer"></i>&nbsp;Cetak</button>
                </div> --}}
            </div>
        </div>
    </div>

    <script>
        $('#kelas').on('change', (e) => {
            $.ajax({
                url: '/api/get_siswa',
                data: {id:e.target.value},
                type: 'GET',
                success: (res) => {
                    $('#target').addClass('hidden');
                    $('#user').html('`<option value="" selected disabled>Pilih Nama</option>`');
                    if(res.length > 0){
                        let option;
                        res.forEach(element => {
                           option = `<option value="${element.siswa_id}">${element.nama}</option>`;
                           $('#user').append(option);
                        });
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });

        $('#btn-lihat').on('click', () => {
            if($('#user').val()) {
                $.ajax({
                    url: '/api/get_rekomendasi',
                    data: {id:$('#user').val()},
                    type: 'GET',
                    success: (res) => {
                        $('#tbl_rank').html('');
                        if(res.length > 0){
                            let newRow;
                            res.forEach((rank, i) => {
                            newRow = `
                            <tr class="text-center">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">${i+1}</td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">${rank.nis}</td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">${rank.nama}</td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">${rank.kelas}</td>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">${rank.nama_jurusan}</td>
                                </tr>
                                `;
                                $('#tbl_rank').append(newRow);
                            });
                        }
                        $('#target').removeClass('hidden');
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
                $('#target').removeClass('hidden');
            }
            else{
                Swal.fire({
                    title: 'Error!',
                    text: 'Pilih siswa terlebih dahulu!',
                    icon: 'error',
                    timerProgressBar: true,
                    timer: 2000
                })
            }
        });
        
    </script>
@endsection