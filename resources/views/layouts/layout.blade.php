<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SPK Rekomendasi</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
</head>

<body class="bg-gray-100">
    <nav class="bg-white dark:bg-gray-900 fixed w-full h-[72px] z-50 top-0 left-0 border-b border-gray-200 dark:border-gray-600">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/dashboard" class="flex items-center">
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">SPK Rekomendasi Jurusan</span>
            </a>
            <div class="flex md:order-2 space-x-3">
                {{-- <button data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation"
                    aria-controls="drawer-navigation" type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-50 bg-gray-600 rounded-lg focus:outline-none focus:ring-2 hover:bg-gray-700 focus:ring-gray-600"
                    aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button> --}}
            </div>
        </div>
    </nav>

    <div class="flex">
        <div id="" class="fixed top-[72px] left-0 z-50 w-64 h-screen p-4 overflow-y-auto transition-transform bg-white">
            <h5 class="text-base font-semibold text-gray-500 uppercase">Menu</h5>
            <div class="py-4 overflow-y-auto">
                @if (session()->has('user'))
                    <ul class="space-y-2">
                        <li>
                            <a href="{{ route('/dashboard') }}" class="{{ request()->is('dashboard') ? 'bg-indigo-500 text-slate-50' : '' }} group flex items-center p-2 text-gray-900 rounded-lg transition ease-in duration-150 hover:bg-indigo-300 hover:text-slate-50">
                                <div class="w-10 h-10 p-1 flex items-center rounded-lg text-center text-gray-500 bg-slate-50">
                                    <i class="fa fa-dashboard mx-auto group-hover:text-slate-800"></i>
                                </div>
                                <span class="ml-3">Dashboard</span>
                            </a>
                        </li>
                        @if (session('user')->role == 'superadmin')    
                            <li>
                                <a href="{{ route('/dashboard/users') }}" class="{{ request()->is('dashboard/users') ? 'bg-indigo-500 text-slate-50' : '' }} group flex items-center p-2 text-gray-900 rounded-lg transition ease-in duration-150 hover:bg-indigo-300 hover:text-slate-50">
                                    <div class="w-10 h-10 p-1 flex items-center rounded-lg text-center text-gray-500 bg-slate-50">
                                        <i class="fa fa-users mx-auto group-hover:text-slate-800"></i>
                                    </div>
                                    <span class="ml-3">Manajemen Users</span>
                                </a>
                            </li>
                        @endif
                        <li>
                            <button type="button" class="{{ (request()->is('dashboard/siswa') || request()->is('dashboard/kelas')) ? 'bg-indigo-500 text-slate-50' : '' }} group w-full flex items-center justify-between p-2 text-gray-900 rounded-lg transition ease-in duration-150 hover:bg-indigo-300 hover:text-slate-50" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 p-1 flex items-center rounded-lg text-center text-gray-500 bg-slate-50 group-hover:text-slate-900">
                                        <i class="fa fa-graduation-cap mx-auto group-hover:text-slate-800"></i>
                                    </div>
                                    <span class="ml-3">Siswa</span>
                                </div>
                                <i class="fa fa-chevron-down ml-auto {{ (request()->is('dashboard/siswa') || request()->is('dashboard/kelas')) ? '' : 'text-gray-500' }} text-sm group-hover:text-slate-50"></i>
                            </button>
                            <ul id="dropdown-example" class="{{ (request()->is('dashboard/siswa') || request()->is('dashboard/kelas')) ? '' : 'hidden' }} mt-1 py-2 px-2 rounded-lg bg-indigo-50 space-y-2">
                                <li>
                                    <a href="{{route('/dashboard/kelas') }}" class="flex items-center p-2 {{ request()->is('dashboard/kelas') ? 'bg-indigo-500 text-slate-50' : 'text-slate-900' }} rounded-lg hover:bg-indigo-300 hover:text-slate-50">
                                        <span class="flex-1 ml-3 whitespace-nowrap">Data Kelas</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('/dashboard/siswa') }}" class="flex items-center p-2 {{ request()->is('dashboard/siswa') ? 'bg-indigo-500 text-slate-50' : 'text-slate-900' }} rounded-lg hover:bg-indigo-300 hover:text-slate-50">
                                        <span class="flex-1 ml-3 whitespace-nowrap">Data Siswa</span>
                                    </a>
                                </li>                               
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('/dashboard/jurusan') }}" class="{{ request()->is('dashboard/jurusan') ? 'bg-indigo-500 text-slate-50' : '' }} group flex items-center p-2 rounded-lg transition ease-in duration-150 hover:bg-indigo-300 hover:text-slate-50">
                                <div class="w-10 h-10 p-1 flex items-center rounded-lg text-center text-gray-500 bg-slate-50 group-hover:text-slate-900">
                                    <i class="fa fa-book mx-auto group-hover:text-slate-800"></i>
                                </div>
                                <span class="ml-3 whitespace-nowrap">Alternatif Jurusan</span>
                            </a>
                        </li>
                        <li>
                            <button type="button" class="{{ (request()->is('dashboard/kriteria') || request()->is('dashboard/subkriteria')) ? 'bg-indigo-500 text-slate-50' : '' }} group w-full flex items-center justify-between p-2 text-gray-900 rounded-lg transition ease-in duration-150 hover:bg-indigo-300 hover:text-slate-50" aria-controls="dropdown2" data-collapse-toggle="dropdown2">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 p-1 flex items-center rounded-lg text-center text-gray-500 bg-slate-50 group-hover:text-slate-900">
                                        <i class="fa fa-list mx-auto group-hover:text-slate-800"></i>
                                    </div>
                                    <span class="ml-3">Kriteria</span>
                                </div>
                                <i class="fa fa-chevron-down ml-auto {{ (request()->is('dashboard/kriteria') || request()->is('dashboard/subkriteria')) ? 'text-slate-50' : 'text-gray-500' }} text-sm group-hover:text-slate-50"></i>
                            </button>
                            <ul id="dropdown2" class="{{ (request()->is('dashboard/kriteria') || request()->is('dashboard/subkriteria')) ? '' : 'hidden' }} py-2 space-y-2 mt-1 rounded-lg bg-indigo-50 px-2">
                                <li>
                                    <a href="{{route('/dashboard/kriteria') }}" class="flex items-center p-2 {{ (request()->is('dashboard/kriteria')) ? 'bg-indigo-500 text-slate-50' : 'text-slate-900' }} rounded-lg transition ease-in duration-150 hover:bg-indigo-300 hover:text-slate-50">
                                        <span class="flex-1 ml-3 whitespace-nowrap">Data Kriteria</span>
                                    </a>
                                </li>
                                {{-- <li>
                                    <a href="{{route('/dashboard/subkriteria') }}" class="flex items-center p-2 {{ (request()->is('dashboard/subkriteria')) ? 'bg-indigo-500 text-slate-50' : 'text-slate-900' }} rounded-lg transition ease-in duration-150 hover:bg-indigo-300 hover:text-slate-50">
                                        <span class="flex-1 ml-3 whitespace-nowrap">Data Sub Kriteria</span>
                                    </a>
                                </li> --}}
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('/dashboard/perhitungan') }}" class="{{ (request()->is('dashboard/perhitungan')) ? 'bg-indigo-500 text-slate-50' : 'text-slate-900' }} group flex items-center p-2 text-gray-900 rounded-lg transition ease-in duration-150 hover:bg-indigo-300 hover:text-slate-50">
                                <div class="w-10 h-10 p-1 flex items-center rounded-lg text-center text-gray-500 bg-slate-50 group-hover:text-slate-900">
                                    <i class="fa fa-pencil mx-auto group-hover:text-slate-800"></i>
                                </div>
                                <span class="ml-3">Perhitungan</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('/dashboard/perankingan') }}" class="{{ (request()->is('dashboard/perankingan')) ? 'bg-indigo-500 text-slate-50' : 'text-slate-900' }} group flex items-center p-2 text-gray-900 rounded-lg transition ease-in duration-150 hover:bg-indigo-300 hover:text-slate-50">
                                <div class="w-10 h-10 p-1 flex items-center rounded-lg text-center text-gray-500 bg-slate-50 group-hover:text-slate-900">
                                    <i class="fa fa-bar-chart mx-auto group-hover:text-slate-800"></i>
                                </div>
                                <span class="ml-3">Hasil Perankingan</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('/auth/sign-out') }}" class="group flex items-center p-2 text-gray-900 bg-red-200 rounded-lg transition ease-in duration-150 hover:bg-red-500 hover:text-slate-50">
                                <div class="w-10 h-10 p-1 flex items-center rounded-lg text-center bg-slate-50">
                                    <i class="fa fa-sign-out mx-auto group-hover:text-slate-800"></i>
                                </div>
                                <span class="ml-3">Sign Out</span>
                            </a>
                        </li>
                    </ul>
                @else
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('/guest/dashboard') }}" class="{{ request()->is('guest/dashboard') ? 'bg-indigo-500 text-slate-50' : '' }} group flex items-center p-2 text-gray-900 rounded-lg transition ease-in duration-150 hover:bg-indigo-300 hover:text-slate-50">
                            <div class="w-10 h-10 p-1 flex items-center rounded-lg text-center text-gray-500 bg-slate-50">
                                <i class="fa fa-dashboard mx-auto group-hover:text-slate-800"></i>
                            </div>
                            <span class="ml-3">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('/guest/siswa') }}" class="{{ request()->is('guest/siswa') ? 'bg-indigo-500 text-slate-50' : '' }} group flex items-center p-2 text-gray-900 rounded-lg transition ease-in duration-150 hover:bg-indigo-300 hover:text-slate-50">
                            <div class="w-10 h-10 p-1 flex items-center rounded-lg text-center text-gray-500 bg-slate-50">
                                <i class="fa fa-graduation-cap mx-auto group-hover:text-slate-800"></i>
                            </div>
                            <span class="ml-3">Data Siswa</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('/guest/rekomendasi') }}" class="{{ request()->is('guest/rekomendasi') ? 'bg-indigo-500 text-slate-50' : '' }} group flex items-center p-2 text-gray-900 rounded-lg transition ease-in duration-150 hover:bg-indigo-300 hover:text-slate-50">
                            <div class="w-10 h-10 p-1 flex items-center rounded-lg text-center text-gray-500 bg-slate-50">
                                <i class="fa fa-list-ol mx-auto group-hover:text-slate-800"></i>
                            </div>
                            <span class="ml-3">Rekomendasi Jurusan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('/auth/sign-out') }}" class="group flex items-center p-2 text-gray-900 bg-red-200 rounded-lg transition ease-in duration-150 hover:bg-red-500 hover:text-slate-50">
                            <div class="w-10 h-10 p-1 flex items-center rounded-lg text-center bg-slate-50">
                                <i class="fa fa-sign-out mx-auto group-hover:text-slate-800"></i>
                            </div>
                            <span class="ml-3">Sign Out</span>
                        </a>
                    </li>
                </ul>
                @endif
            </div>
        </div>
    
        <section class="container ml-64 mr-auto mt-28 mb-6 px-4 md:px-12">
            
            <nav class="flex mb-7" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="/dashboard"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                            <i class="fa fa-home mr-1"></i>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-sm font-medium text-gray-700 md:ml-2">@yield('breadcrumb')</span>
                        </div>
                    </li>
                </ol>
            </nav>
    
            @yield('container')
    
        </section>
    </div>

    <br><br><br><br>

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        $('#myTable').dataTable({
            ordering: true,
            language: {
                paginate: {
                next: '<ion-icon name="arrow-forward-outline" class="text-xl mt-auto cursor-pointer"></ion-icon>',
                previous: '<ion-icon name="arrow-back-outline" class="text-xl mt-auto cursor-pointer"></ion-icon>'
                }
            },
        });
        $('#myTableWithBtn').DataTable({
            ordering: true,
            language: {
                paginate: {
                next: '<ion-icon name="arrow-forward-outline" class="text-xl mt-auto cursor-pointer"></ion-icon>',
                previous: '<ion-icon name="arrow-back-outline" class="text-xl mt-auto cursor-pointer"></ion-icon>'
                }
            },
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf',
                {
                    text: 'Print',
                    action: function (e, dt, node, config) {
                        // Custom button action
                        $.ajax({
                            url: '/dashboard/perankingan/print',
                            data: {id:$('#user').val()},
                            type: 'GET',
                            headers: {
                                'X-CSRF-TOKEN': csrfToken
                            },
                            success: function(res) {
                                var newTab = window.open();
                                newTab.document.open();
                                newTab.document.write(res);
                                newTab.document.close();
                            },
                            error: function(xhr) {
                                console.log(xhr.responseText);
                            }
                        });
                    }
                }
            ]
        });
        $('#checkout-trigger').on('click', () => {
            $('#checkout-btn').click();
        });
        $('.dataTables_length select').addClass('w-14');
        $('.dataTables_filter').addClass('p-2');
        $('.dataTables_filter input').css('border-radius', '8px');
        $('.dataTables_wrapper .dataTables_paginate').addClass('flex items-center');
        $('.pagination li a').css({
            'background': 'rgb(235 245 255 / 1)',
            'border-radius': '10px'
        });
        $('.dataTables_wrapper .dataTables_paginate .paginate_button.next, .dataTables_wrapper .dataTables_paginate .paginate_button.previous').addClass('mt-2');

    </script>
</body>

</html>