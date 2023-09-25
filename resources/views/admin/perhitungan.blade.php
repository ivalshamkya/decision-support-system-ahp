@extends('layouts.layout')

@section('breadcrumb')
    Pembobotan
@endsection

@section('container')
    <div class="px-7 pt-4">
        <div class="flex justify-between mb-5">
            <div>
                <h1 class="text-3xl text-slate-900 font-medium mb-1">Pembobotan</h1>
                <h5 class="text-base text-slate-700 mb-5">Dashboard/Pembobotan</h5>
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

    <div id="target" class="hidden">
        <div class="relative overflow-x-auto mb-5 shadow sm:rounded-lg">
            <table class="w-full text-sm text-left row-border text-gray-500 divide-y divide-gray-300">
                <thead class="text-xs uppercase bg-gray-800 text-gray-100">
                    <tr class="text-center">
                        <th scope="col" class="px-6 py-5">
                            Matematika
                        </th>
                        <th scope="col" class="px-6 py-5">
                            Indonesia
                        </th>
                        <th scope="col" class="px-6 py-5">
                            Inggris
                        </th>
                        <th scope="col" class="px-6 py-5">
                            Biologi
                        </th>
                        <th scope="col" class="px-6 py-5">
                            Ekonomi
                        </th>
                        <th scope="col" class="px-6 py-5">
                            Minat Siswa
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white border-b text-center" id="data-nilai">
                    </tr>
                </tbody>
            </table>
        </div>
    
        <div class="p-7 mb-5 bg-white shadow rounded-lg">
            <div class="relative overflow-x-auto sm:rounded-lg">
                <h1 class="text-xl md:text-2xl font-medium mb-5">Matriks Perbandingan Berpasangan</h1>
                <table class="w-full text-sm text-left border rounded-lg text-gray-500 divide-gray-300">
                    <thead>
                        <tr class="text-center">
                            <th scope="col" class="px-7 md:px-0 py-5 bg-blue-800 text-slate-50">
                                Kriteria
                            </th>
                            @foreach ($kriterias as $kriteria)
                                <th scope="col" class="px-7 md:px-0 py-5 bg-blue-600 text-slate-50">
                                    {{ $kriteria->nama_kriteria }}
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kriterias as $kriteria)
                            <tr class="text-center">
                                <th scope="row" class="bg-blue-600 w-40 text-slate-50">{{ $kriteria->nama_kriteria }}</th>
                                @foreach ($kriterias as $kriteria2)
                                        @if ($kriteria->nama_kriteria == $kriteria2->nama_kriteria)
                                            <td scope="col" class="md:px-7 py-5 w-56 bg-yellow-300">
                                                <input type="number" max="9" min="0" id="input-nilai" name="nilai-{{ $loop->parent->iteration }}-{{ $loop->iteration }}" class="w-full rounded-lg read-only:bg-slate-200" value="1" readonly>
                                            </td>
                                        @elseif($loop->iteration < $loop->parent->iteration)
                                            <td scope="col" class="md:px-7 py-5 w-56">
                                                <input type="number" id="input-nilai" name="nilai-{{ $loop->parent->iteration }}-{{ $loop->iteration }}" class="w-full rounded-lg" value="0" readonly>
                                            </td>
                                        @else
                                            <td scope="col" class="md:px-7 py-5 w-56">
                                                <input type="number" max="9" min="0" id="input-nilai" name="nilai-{{ $loop->parent->iteration }}-{{ $loop->iteration }}" class="w-full rounded-lg" value="0" step="0.1">
                                            </td>
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                        <tr class="text-center">
                            <th scope="row" class="bg-green-600 text-slate-50">Jumlah</th>
                            @foreach ($kriterias as $kriteria)
                                <td scope="col" id="jumlah-{{ $loop->iteration }}" class="py-5 bg-green-500 text-slate-50 font-medium">1</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
                <div class="my-5 flex justify-between">
                    <button id="btn-lanjut-alternatif" class="bg-gradient-to-br from-emerald-500 to-emerald-700 text-white flex items-center justify-between px-3 py-2 rounded-lg transition ease-in duration-200 hover:shadow-xl">Perhitungan Alternatif</button>
                    <button id="btn-lihat-matriks" class="bg-gradient-to-br from-blue-600 to-blue-700 text-white flex items-center justify-between px-3 py-2 rounded-lg transition ease-in duration-200 hover:shadow-xl">
                        <i class="fa fa-eye mr-1"></i> Lihat Matriks
                    </button>
                </div>
            </div>
        </div>

        <div class="hidden" id="target-matriks">
            <div class="p-7 mb-5 bg-white shadow rounded-lg">
                <div class="relative overflow-x-auto sm:rounded-lg">
                    <h1 class="text-xl md:text-2xl font-medium mb-5">Matriks Nilai Kriteria</h1>
                    <table class="w-full text-sm text-left border rounded-lg text-gray-500 divide-gray-300">
                        <thead>
                            <tr class="text-center">
                                <th scope="col" class="px-7 md:px-0 py-5 bg-blue-800 text-slate-50">
                                    Kriteria
                                </th>
                                @foreach ($kriterias as $kriteria)
                                    <th scope="col" class="px-7 md:px-0 py-5 bg-blue-600 text-slate-50">
                                        {{ $kriteria->nama_kriteria }}
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
                            @foreach ($kriterias as $kriteria)
                                <tr class="text-center">
                                    <th scope="row" class="bg-blue-600 w-40 text-slate-50">{{ $kriteria->nama_kriteria }}</th>
                                    @foreach ($kriterias as $kriteria2)
                                        <td scope="col" class="md:px-7 py-5 w-56">
                                            <input type="text" max="9" min="0" name="nilai-kriteria-{{ $loop->parent->iteration }}-{{ $loop->iteration }}" class="w-full rounded-lg" value="0" readonly>
                                        </td>
                                    @endforeach
                                    <td scope="col" class="md:px-7 py-5 w-56 bg-red-400">
                                        <input type="text" max="9" min="0" id="nilai-kriteria-jumlah-{{ $loop->iteration }}" class="w-full rounded-lg" value="0" readonly>
                                    </td>
                                    <td scope="col" class="md:px-7 py-5 w-56 bg-indigo-400">
                                        <input type="text" max="9" min="0" id="nilai-kriteria-pw-{{ $loop->iteration }}" class="w-full rounded-lg" value="0" readonly>
                                    </td>
                                    <td scope="col" class="md:px-7 py-5 w-56 bg-gray-700">
                                        <input type="text" max="9" min="0" id="nilai-kriteria-eigen-{{ $loop->iteration }}" class="w-full rounded-lg" value="0" readonly>
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="text-center">
                                <th scope="row" class="bg-green-600 text-slate-50">Jumlah</th>
                                @foreach ($kriterias as $kriteria)
                                    <td scope="col" id="total-kriteria-{{ $loop->iteration }}" class="py-5 bg-green-500 text-slate-50 font-medium"></td>
                                @endforeach
                                <td scope="col" id="total-kriteria-jumlah" class="py-5 bg-green-500 text-slate-50 font-medium"></td>
                                <td scope="col" id="total-kriteria-pw" class="py-5 bg-green-500 text-slate-50 font-medium"></td>
                                <td scope="col" id="total-kriteria-eigen" class="py-5 bg-green-500 text-slate-50 font-medium"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    
            <div class="p-7 mb-5 bg-white shadow rounded-lg">
                <div class="relative overflow-x-auto sm:rounded-lg">
                    <h1 class="text-xl md:text-2xl font-medium mb-5">Consistency Ratio</h1>
                    <table class="w-72 text-sm text-left border rounded-lg text-gray-500 divide-y divide-gray-300">
                        <tr class="text-center border-b">
                            <th scope="col" class="px-7 py-5 bg-blue-800 text-slate-50">
                                CI
                            </th>
                            <td scope="col" class="px-7 py-5" id="ci">
                                -
                            </td>
                        </tr>
                        <tr class="text-center border-b">
                            <th scope="col" class="px-7 py-5 bg-red-500 text-slate-50">
                                RI
                            </th>
                            <td scope="col" class="px-7 py-5" id="ri">
                                -
                            </td>
                        </tr>
                        <tr class="text-center border-b">
                            <th scope="col" class="px-7 py-5 bg-indigo-500 text-slate-50">
                                CR
                            </th>
                            <td scope="col" class="px-7 py-5" id="cr">
                                -
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('/dashboard/alternatif') }}" method="POST" id="myform">
        @csrf
        <input type="hidden" name="siswa_id" id="siswa_id">
        @foreach ($kriterias as $kriteria)
           <input type="hidden" name="value-pw-{{$loop->iteration}}" id="value-pw-{{$loop->iteration}}">
        @endforeach
    </form>


    <script>
        var randomIndex = [0, 0, 0, 0.58, 0.90, 1.12, 1.24, 1.32, 1.41, 1.45, 1.49]

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
                    url: '/api/get_siswa/id',
                    data: {id:$('#user').val()},
                    type: 'GET',
                    success: (res) => {
                        $('#siswa_id').val($('#user').val());
                        for (let row = 1; row <= {{ count($kriterias) }}; row++) {
                            $(`#jumlah-${row}`).html('0');
                        }
                        $(`#ci`).html('0');
                        $(`#ri`).html('0');
                        $(`#cr`).html('0');
                        let nilai = `
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            ${ res[0].matematika }
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            ${ res[0].indonesia }
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            ${ res[0].inggris }
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            ${ res[0].biologi }
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            ${ res[0].ekonomi }
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            ${ res[0].minat_siswa }
                        </td>
                         `;
                        document.getElementById('data-nilai').innerHTML = nilai;
                        const nilaiMatematika = res[0].matematika;
                        const nilaiIndonesia = res[0].indonesia;
                        const nilaiInggris = res[0].inggris;
                        const nilaiBiologi = res[0].biologi;
                        const nilaiEkonomi = res[0].ekonomi;
                        
                        const nilaiTertinggi = Math.max(
                            nilaiMatematika,
                            nilaiIndonesia,
                            nilaiInggris,
                            nilaiBiologi,
                            nilaiEkonomi
                            );
                            
                            const jumlahNilaiTertinggi = Object.values(res[0]).filter(value => value === nilaiTertinggi).length;
                            
                            // const bobotMatematika = ((nilaiMatematika / nilaiTertinggi) * 9);
                            // const bobotIndonesia = ((nilaiIndonesia / nilaiTertinggi) * 9);
                            // const bobotInggris = ((nilaiInggris / nilaiTertinggi) * 9);
                            // const bobotBiologi = ((nilaiBiologi / nilaiTertinggi) * 9);
                            // const bobotEkonomi = ((nilaiEkonomi / nilaiTertinggi) * 9);
                            
                            // const arrayBobot = [bobotMatematika, bobotIndonesia, bobotInggris, bobotBiologi, bobotEkonomi];
                        var arrayBobot = Array(5).fill(9);
                        let arrayNilai = [nilaiMatematika, nilaiIndonesia, nilaiInggris, nilaiBiologi, nilaiEkonomi];
                        let uniqueArr = [...new Set(arrayNilai)];
                        uniqueArr = uniqueArr.sort((a, b) => b - a);
                        let bobot = 9;
                        for (let i = 0; i < uniqueArr.length; i++) {
                            for (let j = 0; j < arrayNilai.length; j++) {
                                if(uniqueArr[i] == arrayNilai[j]) {
                                    arrayBobot[j] = bobot;
                                }
                            }
                            bobot--;
                        }
                        arrayBobot.push(9);
                        setValueOnMatriks(arrayBobot);

                        
                        $('#target').removeClass('hidden');
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
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

        $('#btn-lihat-matriks').on('click', () => {
            if(checkInputOnMatrix()) {   
                triggerAll();
                $('#target-matriks').removeClass('hidden');
            }   
            else{
                Swal.fire({
                    title: 'Error!',
                    text: 'Harap isi seluruh bobot pada matriks!',
                    icon: 'error',
                    timerProgressBar: true,
                    timer: 2000
                })
            }
        });

        $('#btn-lanjut-alternatif').on('click', () => {
            triggerAll();
            if(checkInputOnMatrix()) {   
                if(parseFloat($('#cr').text()) <= 0.1 ) {   
                    setForm();
                    $(`#myform`).submit();
                }   
                else{
                    Swal.fire({
                        title: 'Error!',
                        text: 'Consistency Ratio harus kurang dari sama dengan 0.1',
                        icon: 'error',
                        timerProgressBar: true,
                        timer: 2000
                    })
                }
            }   
            else{
                Swal.fire({
                    title: 'Error!',
                    text: 'Harap isi seluruh bobot pada matriks!',
                    icon: 'error',
                    timerProgressBar: true,
                    timer: 2000
                })
            }
        });

        const inputs = $('input[id="input-nilai"]');

        inputs.each(function() {
            $(this).change(function() {
                const row = parseInt(this.name.split('-')[1]);
                const col = parseInt(this.name.split('-')[2]);
                const value = parseFloat(this.value);

                updateNilai(row, col, value);
            });
        });

        function updateNilai(row, col, value) {
            $(`input[name="nilai-${row}-${col}"]`).val(value);
            
            if (row !== col) {
                $(`input[name="nilai-${col}-${row}"]`).val((1 / value).toFixed(2));
            }
            calculateColumnTotal();
            updateNormalisasi();
        }

        function updateNormalisasi() {
            const columnCount = {{count($kriterias)}};
            let total;
            for (let col = 1; col <= columnCount; col++) {
                let columnTotal = parseFloat($(`#jumlah-${col}`).html());
                for (let row = 1; row <= columnCount; row++) {
                    let value = parseFloat($(`input[name="nilai-${row}-${col}"]`).val());
                    let normalizedValue = value / columnTotal;
                    $(`input[name="nilai-kriteria-${row}-${col}"]`).val(normalizedValue);
                }
            }
            
            for (let row = 1; row <= columnCount; row++) {
                total = 0.0;
                let columnTotal = parseFloat($(`#jumlah-${row}`).html());
                for (let col = 1; col <= columnCount; col++) {
                    let value = parseFloat($(`input[name="nilai-kriteria-${row}-${col}"]`).val());
                    total += value;
                }
                $(`#nilai-kriteria-jumlah-${row}`).val((total).toFixed(6));
                $(`#nilai-kriteria-pw-${row}`).val((total / columnCount).toFixed(6));
            }
        }

        function setValueOnMatriks(dataNilai) {
            const columnCount = {{ count($kriterias)}}
            let ver = 1;
            let hor = 2;
            let i = 0;

            console.log(dataNilai)
            
            for (let col = hor; col < columnCount+1; col++) {
                for (let row = 1; row < ver+1; row++) {
                    let value = parseFloat($(`input[name="nilai-${row}-${col}"]`).val((dataNilai[i]/dataNilai[hor-1])));
                    i++;
                }
                ver++;
                hor++;
                i = 0;
            }
            triggerAll();
        }
        

        function calculateColumnTotal() {
            const columnCount = {{ count($kriterias) }};
            
            let totalKriteriaJumlah = 0;
            let totalKriteriaPW = 0;
            let totalKriteriaEigen = 0;

            for (let col = 1; col <= columnCount; col++) {
                let total = 0;
                let totalKriteria = 0;
                for (let row = 1; row <= columnCount; row++) {
                    const value = parseFloat($(`input[name="nilai-${row}-${col}"]`).val());
                    const valueKriteria = parseFloat($(`input[name="nilai-kriteria-${row}-${col}"]`).val());
                    total += isNaN(value) ? 0 : value;
                    totalKriteria += isNaN(valueKriteria) ? 0 : valueKriteria;
                }
                const valueKriteriaJumlah = parseFloat($(`#nilai-kriteria-jumlah-${col}`).val());
                const valueKriteriaPW = parseFloat($(`#nilai-kriteria-pw-${col}`).val());
                const valueKriteriaEigen = parseFloat($(`#nilai-kriteria-eigen-${col}`).val());

                totalKriteriaJumlah += isNaN(valueKriteriaJumlah) ? 0 : valueKriteriaJumlah;
                totalKriteriaPW += isNaN(valueKriteriaPW) ? 0 : valueKriteriaPW;
                totalKriteriaEigen += isNaN(valueKriteriaEigen) ? 0 : valueKriteriaEigen;
                $(`#jumlah-${col}`).html(total);
                $(`#total-kriteria-${col}`).html(totalKriteria);
            }

            $(`#total-kriteria-jumlah`).html(totalKriteriaJumlah);
            $(`#total-kriteria-pw`).html(totalKriteriaPW);
            $(`#total-kriteria-eigen`).html(totalKriteriaEigen);

            for (let row = 1; row <= columnCount; row++) {
                let total2 = 0;
                for (let col = 1; col <= columnCount; col++) {
                    let value = parseFloat($(`input[name="nilai-${row}-${col}"]`).val());
                    let value2 = parseFloat($(`#nilai-kriteria-pw-${col}`).val());
                    total2 += value * value2;
                }

                $(`#nilai-kriteria-eigen-${row}`).val(total2 / $(`#nilai-kriteria-pw-${row}`).val());
            }
            let ci = (((totalKriteriaEigen/columnCount) - columnCount) / (columnCount-1))
            $(`#ci`).html((ci));
            $(`#ri`).html(randomIndex[columnCount]);
            $(`#cr`).html((ci / randomIndex[columnCount]));
        }

        function setForm() {
            const columnCount = {{count($kriterias)}};

            for (let row = 1; row <= columnCount; row++) {
                $(`#value-pw-${row}`).val($(`#nilai-kriteria-pw-${row}`).val());
            }
        }


        function checkInputOnMatrix(m_id) {
            const columnCount = {{ count($kriterias)}}
            for (let row = 0; row < columnCount; row++) {
                for (let col = 0; col < columnCount; col++) {
                    let value = parseFloat($(`input[name="nilai-${row}-${col}"]`).val());
                    if (value == 0) {
                        return false;
                    }
                }
            }
            return true;
        }

        function triggerAll() {
            let columnCount = {{ count($kriterias) }}

            for (let i = 0; i < columnCount; i++) {
                let rc = columnCount;
                let y = 2;
                for (let j = 1; j <= columnCount; j++) {
                    for (let k = y; k <= rc; k++) {
                        $(`input[name="nilai-${j}-${k}"]`).trigger('change');
                    }
                    y++;
                }
            }
        }

    </script>
@endsection