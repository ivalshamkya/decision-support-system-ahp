<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

</head>

<body class="h-screen bg-gradient-to-br from-teal-300 to-emerald-400">
    <div class="pt-36 flex justify-center">
        <div class="w-[90vw] md:w-[856px] rounded-[45px] bg-white shadow-2xl px-14 md:px-48 pt-[63px] pb-8">
            @if(session('loginError'))
            <div id="alert-2" class="flex p-4 mb-4 text-slate-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <i data-feather="info"></i>
                <span class="sr-only">Info</span>
                <div class="ml-3 text-sm font-medium">
                    {{ session('loginError') }}
                </div>
                <button type="button"
                    class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-2" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            @endif
            <form action="{{ route('/auth/sign-in') }}" method="POST">
                @csrf
                <div class="mb-7">
                    <h2 class="text-4xl whitespace-nowrap text-center text-slate-800 font-bold mb-2">
                        Sign In to Your Account
                    </h2>
                    <h4 class="text-base text-center text-slate-800 mb-4">Sistem Pendukung Keputusan Rekomendasi Jurusan Di Perguruan Tinggi</h4>
                </div>
                <div class="flex flex-col mb-5">
                    <label for="username" class="mb-2">Username</label>
                    <input type="text" name="username"
                        class="py-3 px-4 border-2 border-slate-500 rounded-lg transition ease-in duration-200"
                        id="username" placeholder="enter username" />
                </div>
                <div class="flex flex-col mb-7">
                    <label for="password" class="mb-2">Password</label>
                    <input type="password" name="password"
                        class="py-3 px-4 border-2 border-slate-500 rounded-lg transition ease-in duration-200"
                        id="password" placeholder="enter password" />
                </div>
                <div class="flex justify-center mb-5">
                    <button type="submit"
                    class="w-44 py-2.5 bg-green-400 text-slate-100 tracking-widest font-semibold rounded-lg transition ease-in duration-150 hover:bg-green-500">
                        SIGN IN
                    </button>
                </div>
                <div class="flex justify-center">
                    <span class="text-slate-500 font-light">Masuk sebagai siswa/pengunjung? <a href="{{ route('/guest/dashboard') }}"
                            class="text-blue-800 hover:text-blue-900 underline">Klik disini</a></span>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>