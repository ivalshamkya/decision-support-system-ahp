@extends('layouts.layout')

@section('breadcrumb')
Pembobotan Alternatif
@endsection

@section('container')

<div id="loading" class="hidden">
    <div class="fixed z-50 top-0 bottom-0 left-0 right-0 w-screen h-screen flex justify-center items-center bg-black bg-opacity-40 backdrop-brightness-[.2]">
        <div role="status">
            <svg aria-hidden="true" class="w-14 h-14 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</div>

<div class="px-7 pt-4">
    <div class="flex justify-between mb-5">
        <div>
            <h1 class="text-3xl text-slate-900 font-medium mb-1">Pembobotan Alternatif</h1>
            <h5 class="text-base text-slate-700 mb-5">Dashboard/Pembobotan Alternatif</h5>
        </div>
    </div>
</div>

@foreach ($kriteria_pw as $item)
<input type="hidden" name="value-pw-{{$loop->iteration}}" id="value-pw-{{$loop->iteration}}" value="{{$item}}">
@endforeach

@php

$DEFAULT = [
    [
        [9/9], 
        [9/7, 9/7],
        [9/9, 9/9, 7/9],
        [9/9, 9/9, 7/9, 9/9],
        [9/7, 9/7, 7/7, 9/7, 9/7],
        [9/9, 9/9, 7/9, 9/9, 9/9, 7/9],
        [9/7, 9/7, 7/7, 9/7, 9/7, 7/7, 9/7],
    ],[
        [7/7], 
        [7/7, 7/7],
        [7/7, 7/7, 7/7],
        [7/7, 7/7, 7/7, 7/7],
        [7/9, 7/9, 7/9, 7/9, 7/9],
        [7/9, 7/9, 7/9, 7/9, 7/9, 9/9],
        [7/9, 7/9, 7/9, 7/9, 7/9, 9/9, 9/9],
    ],[
        [7/7], 
        [7/7, 7/7],
        [7/7, 7/7, 7/7],
        [7/7, 7/7, 7/7, 7/7],
        [7/9, 7/9, 7/9, 7/9, 7/9],
        [7/7, 7/7, 7/7, 7/7, 7/7, 9/7],
        [7/7, 7/7, 7/7, 7/7, 7/7, 9/7, 7/7],
    ],[
        [7/7], 
        [7/9, 7/9],
        [7/7, 7/7, 9/7],
        [7/7, 7/7, 9/7, 7/7],
        [7/5, 7/5, 9/5, 7/5, 7/5],
        [7/7, 7/7, 9/7, 7/7, 7/7, 5/7],
        [7/5, 7/5, 9/5, 7/5, 7/5, 5/5, 7/5],
    ],[
        [5/5], 
        [5/5, 5/5],
        [5/7, 5/7, 5/7],
        [5/9, 5/9, 5/9, 5/9],
        [5/7, 5/7, 5/7, 5/7, 9/7],
        [5/7, 5/7, 5/7, 5/7, 9/7, 7/7],
        [5/7, 5/7, 5/7, 5/7, 9/7, 7/7, 7/7],
    ]
];
@endphp


<div class="py-5 flex space-x-2">
    <button id="btn-hasil"
        class="bg-gradient-to-br from-gray-500 to-gray-800 text-white flex items-center justify-between px-3 py-2.5 rounded-lg transition ease-in duration-200 hover:shadow-xl">
        Lihat Hasil
    </button>
    <button id="btn-simpan"
    class="bg-gradient-to-br from-emerald-600 to-emerald-700 text-white flex items-center justify-between px-3 py-2.5 rounded-lg transition ease-in duration-200 hover:shadow-xl">
    <i class="fa fa-save mr-2"></i>
    Simpan Perhitungan
</button>
</div>

<div class="hidden pb-10" id="tbl-hasil">
    <div class="p-7 mb-2 bg-white shadow rounded-lg">
        <div class="relative overflow-x-auto sm:rounded-lg">
            <h1 class="text-xl md:text-2xl font-medium mb-5">Pengambilan Keputusan</h1>
            <table class="w-full text-sm text-left border rounded-lg text-gray-500 divide-gray-300">
                <thead>
                    <tr class="text-center">
                        <th scope="col" class="px-7 md:px-0 py-5 bg-black text-slate-50">

                        </th>
                        @foreach ($kriterias as $kriteria)
                        <th scope="col" class="px-7 md:px-0 py-5 bg-blue-700 text-slate-50">
                            {{ $kriteria->nama_kriteria }}
                        </th>
                        @endforeach
                        <th scope="col" rowspan="2" class="px-7 md:px-0 py-5 bg-indigo-700 text-slate-50">
                            Bobot Prioritas
                        </th>
                        <th scope="col" rowspan="2" class="px-7 md:px-0 py-5 bg-gray-900 text-slate-50">
                            Ranking
                        </th>
                    </tr>
                    <tr class="text-center">
                        <th scope="col" class="px-7 md:px-0 py-5 bg-gray-600 text-slate-50">
                            PW Kriteria
                        </th>
                        @foreach ($kriteria_pw as $item)
                        <th scope="col" class="px-7 md:px-0 py-5 bg-blue-600 text-slate-50">
                            {{number_format($item, 6)}}
                        </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody id="keputusan-akhir">
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="target" class="">
    @foreach ($kriterias as $i => $pkriteria)
    @php
     $x = 0;
     $y = 0;
    @endphp
    <div class="pb-10">
        <div class="p-7 mb-2 bg-white shadow rounded-lg">
            <div class="relative overflow-x-auto sm:rounded-lg">
                <h1 class="text-xl md:text-2xl text-slate-900 font-medium mb-5">Kriteria {{
                    $pkriteria->nama_kriteria }}</h1>
                <table class="w-full text-sm text-left border rounded-lg text-gray-500 divide-gray-300">
                    <thead>
                        <tr class="text-center">
                            <th scope="col" class="px-7 md:px-0 py-5 bg-blue-800 text-slate-50">
                                {{ $pkriteria->nama_kriteria }}
                            </th>
                            @foreach ($jurusan as $jrs)
                            <th scope="col" class="px-7 md:px-0 py-5 bg-blue-600 text-slate-50">
                                {{ $jrs->nama_jurusan }}
                            </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jurusan as $jrs)
                        <tr class="text-center">
                            @if ($pkriteria->nama_kriteria == 'Minat Siswa')
                                {{-- @if ($jrs->nama_kriteria == $siswa[0]->minat_siswa) --}}
                                <th scope="row" class="bg-blue-600 min-w-[5rem] md:min-w-[10rem] text-slate-50" id="m{{$i}}-{{ $jrs->nama_jurusan }}">{{ $jrs->nama_jurusan }}</th>
                                @foreach ($jurusan as $jrs2)
                                @if ($jrs->nama_jurusan == $jrs2->nama_jurusan)
                                <td scope="col" class="md:px-7 py-5 min-w-[5rem] md:min-w-[10rem] bg-yellow-300">
                                    <input type="number" max="9" min="0" id="input-nilai"
                                        name="m{{$i}}-nilai-{{ $loop->parent->iteration }}-{{ $loop->iteration }}"
                                        class="w-full rounded-lg read-only:bg-slate-200" value="1" readonly>
                                </td>
                                @elseif($loop->iteration < $loop->parent->iteration)
                                <td scope="col" class="md:px-7 py-5 min-w-[5rem] md:min-w-[10rem]">
                                    <input type="number" id="input-nilai"
                                        name="m{{$i}}-nilai-{{ $loop->parent->iteration }}-{{ $loop->iteration }}"
                                        class="w-full rounded-lg {{ $jrs->nama_jurusan }}" value="{{ $jrs2->nama_jurusan == $siswa[0]->minat_siswa ? 1/(9/5) : 1/(5/5)}}" step="0.1">
                                </td>
                                @else
                                <td scope="col" class="md:px-7 py-5 min-w-[5rem] md:min-w-[10rem]">
                                    <input type="number" max="9" min="0" id="input-nilai"
                                        name="m{{$i}}-nilai-{{ $loop->parent->iteration }}-{{ $loop->iteration }}"
                                        {{-- value="{{$matriks[$i][$j++]}}" --}}
                                        class="w-full rounded-lg {{ $jrs->nama_jurusan }}" value="{{ $jrs->nama_jurusan == $siswa[0]->minat_siswa ? 9/5 : 5/5}}" step="0.1">
                                </td>
                                @endif
                                </td>
                                @endforeach
                            @else
                                <th scope="row" class="bg-blue-600 min-w-[5rem] md:min-w-[10rem] text-slate-50" id="m{{$i}}-{{ $jrs->nama_jurusan }}">{{ $jrs->nama_jurusan }}</th>
                                @php $x = 0; $y = 0; @endphp
                                @foreach ($jurusan as $jrs2)
                                    @if ($jrs->nama_jurusan == $jrs2->nama_jurusan)
                                    <td scope="col" class="md:px-7 py-5 min-w-[5rem] md:min-w-[10rem] bg-yellow-300">
                                        <input type="number" max="9" min="0" id="input-nilai"
                                            name="m{{$i}}-nilai-{{ $loop->parent->iteration }}-{{ $loop->iteration }}"
                                            class="w-full rounded-lg read-only:bg-slate-200" value="1" readonly>
                                    </td>
                                    @elseif($loop->iteration < $loop->parent->iteration)
                                    <td scope="col" class="md:px-7 py-5 min-w-[5rem] md:min-w-[10rem]">
                                        <input type="number" id="input-nilai"
                                            name="m{{$i}}-nilai-{{ $loop->parent->iteration }}-{{ $loop->iteration }}"
                                            class="w-full rounded-lg" value="{{ 1/($DEFAULT[$i][$loop->parent->iteration-2][$loop->iteration-1]) }}" readonly>
                                    </td>
                                    @else
                                    <td scope="col" class="md:px-7 py-5 min-w-[5rem] md:min-w-[10rem]">
                                        <input type="number" max="9" min="0" id="input-nilai"
                                            name="m{{$i}}-nilai-{{ $loop->parent->iteration }}-{{ $loop->iteration }}"
                                            {{-- value="{{$matriks[$i][$j++]}}" --}}
                                            class="w-full rounded-lg" value="{{ $DEFAULT[$i][$loop->iteration-2][$loop->parent->iteration-1] }}" step="0.1">
                                    </td>
                                    @endif
                                    </td>
                                @endforeach
                                
                            @endif
                        </tr>
                        @endforeach
                        <tr class="text-center">
                            <th scope="row" class="bg-green-600 text-slate-50">Jumlah</th>
                            @foreach ($jurusan as $jrs)
                            <td scope="col" id="m{{$i}}-jumlah-{{ $loop->iteration }}"
                                class="py-5 bg-green-500 text-slate-50 font-medium">1</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="my-5 flex justify-between">
                <button onclick="showMatrix('m{{$i}}')" id="btn-m{{$i}}"
                    class="bg-gradient-to-br from-blue-600 to-blue-700 text-white flex items-center justify-between px-3 py-2 rounded-lg transition ease-in duration-200 hover:shadow-xl">
                    <i class="fa fa-eye mr-1"></i> Lihat Matriks
                </button>
            </div>
        </div>

        <div class="hidden" id="target-m{{$i}}">
            <div class="p-7 mb-2 bg-white shadow rounded-lg">
                <div class="relative overflow-x-auto sm:rounded-lg">
                    <h1 class="text-xl md:text-2xl font-medium mb-5">Normalisasi Kriteria {{ $pkriteria->nama_kriteria}}</h1>
                    <table class="w-full text-sm text-left border rounded-lg text-gray-500 divide-gray-300">
                        <thead>
                            <tr class="text-center">
                                <th scope="col" class="px-7 md:px-0 py-5 bg-blue-800 text-slate-50">
                                    Kriteria
                                </th>
                                @foreach ($jurusan as $jrs)
                                <th scope="col" class="px-7 md:px-0 py-5 bg-blue-600 text-slate-50">
                                    {{ $jrs->nama_jurusan }}
                                </th>
                                @endforeach
                                <th scope="col" class="px-7 md:px-0 py-5 bg-red-500 text-slate-50">
                                    Jumlah
                                </th>
                                <th scope="col" class="px-7 md:px-0 py-5 bg-indigo-500 text-slate-50">
                                    Rata-rata(PW)
                                </th>
                                <th scope="col" class="px-7 md:px-0 py-5 bg-gray-800 text-slate-50">
                                    Eigen Value
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jurusan as $jrs)
                            <tr class="text-center">
                                <th scope="row" class="bg-blue-600 text-slate-50">{{ $jrs->nama_jurusan }}</th>
                                @foreach ($jurusan as $jrs2)
                                <td scope="col" class="md:px-7 py-5 min-w-[5rem] md:min-w-[10rem]">
                                    <input type="text" max="9" min="0"
                                        name="m{{$i}}-nilai-kriteria-{{ $loop->parent->iteration }}-{{ $loop->iteration }}"
                                        class="w-full rounded-lg" value="0" readonly>
                                </td>
                                @endforeach
                                <td scope="col" class="md:px-7 py-5 min-w-[5rem] md:min-w-[10rem] bg-red-400">
                                    <input type="text" max="9" min="0"
                                        id="m{{$i}}-nilai-kriteria-jumlah-{{ $loop->iteration }}"
                                        class="w-full rounded-lg" value="0" readonly>
                                </td>
                                <td scope="col" class="md:px-7 py-5 min-w-[5rem] md:min-w-[10rem] bg-indigo-400">
                                    <input type="text" max="9" min="0"
                                        id="m{{$i}}-nilai-kriteria-pw-{{ $loop->iteration }}" class="w-full rounded-lg"
                                        value="0" readonly>
                                </td>
                                <td scope="col" class="md:px-7 py-5 min-w-[5rem] md:min-w-[10rem] bg-gray-700">
                                    <input type="text" max="9" min="0"
                                        id="m{{$i}}-nilai-kriteria-eigen-{{ $loop->iteration }}"
                                        class="w-full rounded-lg" value="0" readonly>
                                </td>
                            </tr>
                            @endforeach
                            <tr class="text-center">
                                <th scope="row" class="bg-green-600 text-slate-50">Jumlah</th>
                                @foreach ($jurusan as $jrs)
                                <td scope="col" id="m{{$i}}-total-kriteria-{{ $loop->iteration }}"
                                    class="py-5 min-w-[5rem] md:min-w-[10rem] bg-green-500 text-slate-50 font-medium"></td>
                                @endforeach
                                <td scope="col" id="m{{$i}}-total-kriteria-jumlah"
                                    class="py-5 min-w-[5rem] md:min-w-[10rem] bg-green-500 text-slate-50 font-medium"></td>
                                <td scope="col" id="m{{$i}}-total-kriteria-pw"
                                    class="py-5 min-w-[5rem] md:min-w-[10rem] bg-green-500 text-slate-50 font-medium"></td>
                                <td scope="col" id="m{{$i}}-total-kriteria-eigen"
                                    class="py-5 min-w-[5rem] md:min-w-[10rem] bg-green-500 text-slate-50 font-medium"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="p-7 mb-5 bg-white shadow rounded-lg">
                <div class="relative overflow-x-auto sm:rounded-lg">
                    <h1 class="text-xl md:text-2xl font-medium mb-5">Consistency Ratio Kriteria {{ $pkriteria->nama_kriteria}}</h1>
                    <table class="w-72 text-sm text-left border rounded-lg text-gray-500 divide-y divide-gray-300">
                        <tr class="text-center border-b">
                            <th scope="col" class="px-7 py-5 bg-blue-800 text-slate-50">
                                CI
                            </th>
                            <td scope="col" class="px-7 py-5" id="m{{$i}}-ci">
                                -
                            </td>
                        </tr>
                        <tr class="text-center border-b">
                            <th scope="col" class="px-7 py-5 bg-red-500 text-slate-50">
                                RI
                            </th>
                            <td scope="col" class="px-7 py-5" id="m{{$i}}-ri">
                                -
                            </td>
                        </tr>
                        <tr class="text-center border-b">
                            <th scope="col" class="px-7 py-5 bg-indigo-500 text-slate-50">
                                CR
                            </th>
                            <td scope="col" class="px-7 py-5" id="m{{$i}}-cr">
                                -
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<form action="{{ route('save_keputusan') }}" method="POST" id="myForm">
    @csrf
    <input type="hidden" name="siswa_id" id="siswa_id" value="{{$siswa[0]->siswa_id}}">
    <input type="hidden" name="minat_siswa" id="minat_siswa" value="{{$siswa[0]->minat_siswa}}">
    <input type="hidden" name="jurusan_id" id="jurusan_id" value="">
</form>

<script>
    var randomIndex = [0, 0, 0, 0.58, 0.90, 1.12, 1.24, 1.32, 1.41, 1.45, 1.49]

    $('#btn-lihat').on('click', () => {
        if ($('#user').val().length > 0) {
            $('#target').removeClass('hidden');
        }
    });

    $('#btn-hasil').on('click', async () => {
        showLoading();
        
        try {
            await new Promise((resolve) => {
            setTimeout(resolve, 500);
            });
            
            await calculateAll();
            await keputusanAkhir();
        } catch (error) {
            console.error(error);
        } finally {
            $('#tbl-hasil').removeClass('hidden')
            hideLoading();
        }
    });

    $('#btn-simpan').on('click', async () => {
        if(checkInputOnAllMatrix()) {
            showLoading();
            
            try {
                await new Promise((resolve) => {
                setTimeout(resolve, 500);
                });
                
                await calculateAll();
                await keputusanAkhir();
            } catch (error) {
                console.error(error);
            } finally {
                hideLoading();
                $('#myForm').submit();
            }
        }
        else {
            Swal.fire({
                title: 'Error!',
                text: 'Pastikan isi masing-masing bobot pada matriks!',
                icon: 'error',
                timerProgressBar: true,
                timer: 1700
            })
        }
    });

    function showMatrix(m_id) {
        if ($(`#target-${m_id}`).hasClass('hidden')) {
            if (checkInputOnMatrix(m_id)) {
                calculateColumnTotal(m_id);
                updateNormalisasi(m_id);
                $(`#target-${m_id}`).removeClass('hidden');
                $(`btn-${m_id}`).html('Lihat Matriks');
            }
            else {
                Swal.fire({
                    title: 'Error!',
                    text: 'Pastikan isi masing-masing bobot pada matriks!',
                    icon: 'error',
                    timer: 1700
                })
            }
        }
        else {
            $(`#target-${m_id}`).addClass('hidden');
            $(`btn-${m_id}`).html('Sembunyikan Matriks');
        }
    }

    const inputs = $('input[id="input-nilai"]');

    inputs.each(function () {
        $(this).change(function () {
            const m_id = this.name.split('-')[0];
            const row = parseInt(this.name.split('-')[2]);
            const col = parseInt(this.name.split('-')[3]);
            const value = parseFloat(this.value);

            updateNilai(m_id, row, col, value);
        });
    });

    function updateNilai(m_id, row, col, value) {
        $(`input[name="${m_id}-nilai-${row}-${col}"]`).val(value);

        if (row !== col) {
            $(`input[name="${m_id}-nilai-${col}-${row}"]`).val((1 / value).toFixed(2));
        }
        calculateColumnTotal(m_id);
        updateNormalisasi(m_id);
    }

    function updateNormalisasi(m_id) {
        const columnCount = {{ count($jurusan)}};
        let total;
        for (let col = 1; col <= columnCount; col++) {
            let columnTotal = parseFloat($(`#${m_id}-jumlah-${col}`).html());
            for (let row = 1; row <= columnCount; row++) {
                let value = parseFloat($(`input[name="${m_id}-nilai-${row}-${col}"]`).val());
                let normalizedValue = value / columnTotal;
                $(`input[name="${m_id}-nilai-kriteria-${row}-${col}"]`).val(normalizedValue.toFixed(2));
            }
        }

        for (let row = 1; row <= columnCount; row++) {
            total = 0.0;
            let columnTotal = parseFloat($(`#${m_id}-jumlah-${row}`).html());
            for (let col = 1; col <= columnCount; col++) {
                let value = parseFloat($(`input[name="${m_id}-nilai-kriteria-${row}-${col}"]`).val());
                total += value;
            }
            $(`#${m_id}-nilai-kriteria-jumlah-${row}`).val((total).toFixed(2));
            $(`#${m_id}-nilai-kriteria-pw-${row}`).val((total / columnCount).toFixed(2));
        }
    }

    function calculateColumnTotal(m_id) {
        const columnCount = {{ count($jurusan)}};

        let totalKriteriaJumlah = 0;
        let totalKriteriaPW = 0;
        let totalKriteriaEigen = 0;

        for (let col = 1; col <= columnCount; col++) {
            let total = 0;
            let totalKriteria = 0;
            for (let row = 1; row <= columnCount; row++) {
                const value = parseFloat($(`input[name="${m_id}-nilai-${row}-${col}"]`).val());
                const valueKriteria = parseFloat($(`input[name="${m_id}-nilai-kriteria-${row}-${col}"]`).val());
                total += isNaN(value) ? 0 : value;
                totalKriteria += isNaN(valueKriteria) ? 0 : valueKriteria;
            }
            const valueKriteriaJumlah = parseFloat($(`#${m_id}-nilai-kriteria-jumlah-${col}`).val());
            const valueKriteriaPW = parseFloat($(`#${m_id}-nilai-kriteria-pw-${col}`).val());
            const valueKriteriaEigen = parseFloat($(`#${m_id}-nilai-kriteria-eigen-${col}`).val());

            totalKriteriaJumlah += isNaN(valueKriteriaJumlah) ? 0 : valueKriteriaJumlah;
            totalKriteriaPW += isNaN(valueKriteriaPW) ? 0 : valueKriteriaPW;
            totalKriteriaEigen += isNaN(valueKriteriaEigen) ? 0 : valueKriteriaEigen;
            $(`#${m_id}-jumlah-${col}`).html(total.toFixed(3));
            $(`#${m_id}-total-kriteria-${col}`).html(totalKriteria.toFixed(3));
        }
        $(`#${m_id}-total-kriteria-jumlah`).html(totalKriteriaJumlah);
        $(`#${m_id}-total-kriteria-pw`).html(totalKriteriaPW);
        $(`#${m_id}-total-kriteria-eigen`).html(totalKriteriaEigen.toFixed(5));

        for (let row = 1; row <= columnCount; row++) {
            let total2 = 0;
            for (let col = 1; col <= columnCount; col++) {
                let value = parseFloat($(`input[name="${m_id}-nilai-${row}-${col}"]`).val());
                let value2 = parseFloat($(`#${m_id}-nilai-kriteria-pw-${col}`).val());
                total2 += value * value2;
            }
            $(`#${m_id}-nilai-kriteria-eigen-${row}`).val(total2 / $(`#${m_id}-nilai-kriteria-pw-${row}`).val());
        }
        let ci = (((totalKriteriaEigen / columnCount) - columnCount) / (columnCount - 1))
        $(`#${m_id}-ci`).html((ci));
        $(`#${m_id}-ri`).html(randomIndex[columnCount]);
        $(`#${m_id}-cr`).html((ci / randomIndex[columnCount]));
    }

    function calculateAll() {
        // triggerAll();
        for (let i = 0; i < {{ count($jurusan) }}; i++) {
            calculateColumnTotal(`m${i}`);
            updateNormalisasi(`m${i}`);
        }
    }

    function checkInputOnMatrix(m_id) {
        const columnCount = {{ count($jurusan)}}
        for (let row = 0; row < columnCount; row++) {
            for (let col = 0; col < columnCount; col++) {
                let value = parseFloat($(`input[name="${m_id}-nilai-kriteria-${row}-${col}"]`).val());
                if (value == 0) {
                    return false;
                }
            }
        }
        return true;
    }

    function checkInputOnAllMatrix() {
        const columnCount = {{ count($jurusan)}}

        for (let i = 0; i < columnCount; i++) {
            for (let row = 0; row < columnCount; row++) {
                for (let col = 0; col < columnCount; col++) {
                    let value = parseFloat($(`input[name="m${i}-nilai-${row}-${col}"]`).val());
                    if (value == 0) {
                        console.log(`input[name="m${i}-nilai-${row}-${col}"]`, value);
                        return false;
                    }
                }
            }
        }
        return true;
    }

    function setValueOnMatriks() {
        let columnCount = {{ count($jurusan)}}
        let ver = 1;
        let hor = 2;

        for (let col = hor; col < columnCount+1; col++) {
            for (let row = 1; row < ver+1; row++) {
                let value = parseFloat($(`input[name="m5-nilai-${row}-${col}"]`).val((7/7)));
            }
            ver++;
            hor++;
        }
    }

    // setValueOnMatriks();

    function keputusanAkhir() {
        $('#keputusan-akhir').html('');
        let rowCount = {{ count($jurusan)}}
        let columnCount = {{ count($kriterias) }}
        let jurusan = {!! json_encode($jurusan)!!};
        let rowData = [];
        for (let row = 0; row < rowCount; row++) {
            let tempData = []
            tempData.push(jurusan[row].nama_jurusan)
            let pw = 0;
            for (let col = 0; col < columnCount; col++) {
                let value = parseFloat($(`#m${col}-nilai-kriteria-pw-${row+1}`).val());
                tempData.push(value.toFixed(2));
                let pwk = parseFloat($(`#value-pw-${col+1}`).val());
                pw += (pwk * value);
            }
            tempData.push(pw.toFixed(6));
            rowData.push(tempData);
        }

        rowData.sort((a, b) => parseFloat(b[b.length - 1]) - parseFloat(a[a.length - 1]));

        for (let i = 0; i < jurusan.length; i++) {
            if(jurusan[i].nama_jurusan == rowData[0][0]) {
                $('#jurusan_id').val(jurusan[i].jurusan_id);
                break;
            }
        }
        
        rowData.forEach(function (rowDataItem, i) {
            let newRow = `
                    <tr class='text-center'>
                        <td scope="col" class="px-7 py-5 bg-gray-500 text-slate-50 font-medium">
                            ${rowData[i][0]}
                        </td>
                    `;
                    rowData[i].shift();
            rowDataItem.forEach(function (cellData, j) {
                if(j == rowDataItem.length-1){
                    newRow += `
                            <td scope="col" class="px-7 py-5 bg-indigo-500 text-slate-50 border-b font-medium">
                                ${cellData}
                            </td>
                            `;
                }
                else{
                    if(j % 2 != 0) {
                        newRow += `
                            <td scope="col" class="px-7 py-5 text-slate-900 border-b font-medium">
                                ${cellData}
                            </td>
                            `;    
                    }
                    else{
                        newRow += `
                                <td scope="col" class="px-7 py-5 bg-slate-100 text-slate-900 border-b font-medium">
                                    ${cellData}
                                </td>
                                `;
                    }
                }
            });

            newRow += `
                        <td scope="col" class="px-7 py-5 bg-slate-700 text-slate-50 font-medium">
                        ${rowData.indexOf(rowDataItem) + 1}
                        </td>
                    </tr>
                    `;

            $('#keputusan-akhir').append(newRow);
            });
    }

    function triggerAll() {
        let rowCount = {{ count($jurusan)}}
        let columnCount = {{ count($kriterias) }}


        for (let i = 0; i < rowCount; i++) {
            let rc = rowCount;
            let y = 2;
            for (let j = 1; j <= rowCount; j++) {
                for (let k = y; k <= rc; k++) {
                    $(`input[name="m${i}-nilai-${j}-${k}"]`).trigger('change');
                }
                y++;
            }
        }
    }

    function triggerAllLight() {
        let columnCount = {{ count($kriterias) }}


        for (let i = 0; i < columnCount; i++) {
            $(`input[name="m${i}-nilai-1-2"]`).trigger('change');
        }
    }
        

    $(document).ready(() => {
        triggerAllLight();
    })

    function showLoading() {
        $('#loading').removeClass('hidden');
    }
    function hideLoading() {
        $('#loading').addClass('hidden');
    }

</script>
@endsection