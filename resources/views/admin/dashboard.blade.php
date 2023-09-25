@extends('layouts.layout')

@section('breadcrumb')
    Dashboard
@endsection

@section('container')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        <div class="relative overflow-hidden p-7 flex flex-col justify-center items-center bg-gradient-to-br from-blue-500 via-blue-400 to-cyan-300 rounded-lg shadow">
            <img src="{{ asset('img/abstractchart.png') }}" class="absolute w-full opacity-20" alt="">
            <div class="w-20 h-20 mb-5 flex rounded-full text-center text-4xl text-slate-50 bg-indigo-500 shadow">
                <i class="fa fa-user my-auto mx-auto"></i>
            </div>
            <h1 class="mb-3 text-slate-50 text-xl font-medium">
                Total User
            </h1>
            <h1 class="mb-3 text-slate-50 text-xl font-semibold">
                {{ $totalUser }}
            </h1>
        </div>
        <div class="relative overflow-hidden p-7 flex flex-col justify-center items-center bg-gradient-to-br from-indigo-400 to-purple-300 rounded-lg shadow">
            <img src="{{ asset('img/abstractchart.png') }}" class="absolute w-full opacity-20" alt="">
            <div class="w-20 h-20 mb-5 flex rounded-full text-center text-4xl text-slate-50 bg-indigo-500 shadow">
                <i class="fa fa-graduation-cap my-auto mx-auto"></i>
            </div>
            <h1 class="mb-3 text-slate-50 text-xl font-medium">
                Total Siswa
            </h1>
            <h1 class="mb-3 text-slate-50 text-xl font-semibold">
                {{ $totalSiswa }}
            </h1>
        </div>
        <div class="relative overflow-hidden p-7 flex flex-col justify-center items-center bg-gradient-to-br from-red-400 to-red-300 rounded-lg shadow">
            <img src="{{ asset('img/abstractchart.png') }}" class="absolute w-full opacity-20" alt="">
            <div class="w-20 h-20 mb-5 flex rounded-full text-center text-4xl text-slate-50 bg-indigo-500 shadow">
                <i class="fa fa-building my-auto mx-auto"></i>
            </div>
            <h1 class="mb-3 text-slate-50 text-xl font-medium">
                Total Kelas
            </h1>
            <h1 class="mb-3 text-slate-50 text-xl font-semibold">
                {{ $totalKelas }}
            </h1>
        </div>
    </div>
    <div class="my-10">
        <div class="grid xl:grid-cols-3 gap-5">
            <div class="p-7 bg-white rounded-3xl shadow-xl md:col-span-2">
                <h1 class="text-left font-semibold mb-7">Jumlah Perankingan/Bulan</h1>
                <div id="chart-perankingan"></div>
            </div>
            <div class="p-7 bg-white rounded-3xl shadow-xl">
                <h1 class="text-left font-semibold mb-7">Jumlah Siswa Tiap Kelas</h1>
                <div id="chart-kelas"></div>
            </div>
        </div>
    </div>


    <script>
        var eachMonth = {!! json_encode($keputusanEachMonth) !!}
        var seriesData = [];
        var seriesLabel = [];
        eachMonth.forEach((item) => {
            seriesData.push(item.count);
            seriesLabel.push(item.kelas);
        });

        console.log(seriesData)
        var options = {
          series: [{
            name: "Jumlah",
            data: seriesData
        }],
          chart: {
          height: 350,
          type: 'line',
        },
        dataLabels: {
          enabled: true
        },
        stroke: {
          curve: 'smooth'
        },
        grid: {
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        xaxis: {
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart-perankingan"), options);
        chart.render();
    </script>

    <script>
        var siswa = {!! json_encode($siswaInClass) !!}
        var seriesData = [];
        var seriesLabel = [];
        siswa.forEach((item) => {
            seriesData.push(item.count);
            seriesLabel.push(item.kelas);
        });

        console.log(seriesData)
        var options = {
                series: seriesData,
                chart: {
                    width: 400,
                    type: 'pie',
                },
                legend: {
                    position: 'bottom'
                },
                labels: seriesLabel,
                responsive: [{
                breakpoint: 768,
                options: {
                    chart: {
                        width: 380
                    },
                }

                }]
            };

        var chart = new ApexCharts(document.querySelector("#chart-kelas"), options);
        chart.render();
    </script>
@endsection