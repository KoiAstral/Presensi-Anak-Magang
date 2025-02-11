{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        @layer utilities {
            .bg-blur {
                backdrop-filter: blur(5px);
            }
        }
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body class="bg-cover bg-center bg-no-repeat" style="background-image: url('/images/gedung.jpg');">
    <div class="flex items-center justify-center min-h-screen bg-black/50">
        <div class="bg-white rounded-lg p-8 w-[550px]" style="box-shadow: 0 4px 10px #396E66;">
            <div class="flex flex-col items-center mb-6">
                <img src="/images/dprd.png" alt="Logo" class="h-36">
                <p class="text-center text-lg font-bold mt-4">
                    Presensi Magang Sekretariat DPRD Kab. Banjar
                </p>
            </div>
            <form method="POST" action="{{ route('login_proses') }}">
                @csrf

                <!-- Error Message for Incorrect Credentials -->
                <!-- Error Message for Nomor Induk -->
                @if ($errors->has('nomor_induk'))
                <div class="text-red-500 text-sm mb-4 text-center">
                    {{ $errors->first('nomor_induk') }}
                </div>
                @endif

                <!-- Input for Nomor Induk -->
                <div class="mb-8 flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-transparent">
                <img src="{{ asset('images/User.png') }}" alt="User Logo" class="h-6 w-6 mr-2">
                <input type="text" placeholder="Nomor Induk" 
                    class="w-full bg-transparent text-gray-700 focus:outline-none" 
                    name="nomor_induk" aria-label="Nomor Induk" value="{{ old('nomor_induk') }}" required>
                </div>

                <!-- Error Message for Password -->
                @if ($errors->has('password'))
                <div class="text-red-500 text-sm mb-4 text-center">
                    {{ $errors->first('password') }}
                </div>
                @endif

                <!-- Input for Password -->
                <div class="mb-8 flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-transparent">
                <img src="{{ asset('images/password2.png') }}" alt="Password Logo" class="h-6 w-6 mr-2">
                <input type="password" placeholder="Password" 
                    class="w-full bg-transparent text-gray-700 focus:outline-none" 
                    name="password" aria-label="Password" required>
                </div>
    
                
                <!-- Submit Button -->
                <button type="submit"
                        class="w-full bg-[#396E66] hover:bg-[#2E5C55] text-white font-semibold py-3 px-4 rounded-lg flex items-center justify-center gap-2">
                    <img src="{{ asset('images/login.png') }}" alt="Login Logo" class="h-6 w-6">
                    Login
                </button>

                <!-- Register Link --> 
                <div class="text-center mt-5">
                    <p class="text-gray-500">
                        Belum memiliki akun? 
                        <a href="{{ route('register') }}" class="text-[#396E66] font-normal underline">Buat Akun</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        @layer utilities {
            .bg-blur {
                backdrop-filter: blur(5px);
            }
        }
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body class="bg-cover bg-center bg-no-repeat" style="background-image: url('/images/gedung.jpg');">
    <div class="flex items-center justify-center min-h-screen bg-black/50">
        <div class="bg-white rounded-lg p-8 w-[550px]" style="box-shadow: 0 4px 10px #396E66;">
            <div class="flex flex-col items-center mb-6">
                <img src="/images/dprd.png" alt="Logo" class="h-36">
                <p class="text-center text-lg font-bold mt-4">
                    Presensi Magang Sekretariat DPRD Kab. Banjar
                </p>
            </div>
            <form method="POST" action="{{ route('login_proses') }}">
                @csrf

                <!-- Error Message for Incorrect Credentials -->
                @if ($errors->has('nomor_induk'))
                <div class="text-red-500 text-sm mb-4 text-center">
                    {{ $errors->first('nomor_induk') }}
                </div>
                @endif

                <!-- Input for Nomor Induk -->
                <div class="mb-8">
                    <label for="nomor_induk" class="text-gray-700 font-medium block mb-2">Nomor Induk</label>
                    <div class="flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-white">
                        <img src="{{ asset('/svg/nomor_induk.svg') }}" alt="User Icon" class="h-6 w-6 mr-2">
                        <input type="text" id="nomor_induk" name="nomor_induk"
                            placeholder="Masukkan Nomor Induk"
                            class="w-full bg-transparent text-gray-700 focus:outline-none"
                            value="{{ old('nomor_induk') }}" required>
                    </div>
                </div>

                <!-- Error Message for Password -->
                @if ($errors->has('password'))
                <div class="text-red-500 text-sm mb-4 text-center">
                    {{ $errors->first('password') }}
                </div>
                @endif

                <!-- Input for Password -->
                <div class="mb-8">
                    <label for="password" class="text-gray-700 font-medium block mb-2">Password</label>
                    <div class="flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-white">
                        <img src="{{ asset('/svg/Password2.svg') }}" alt="Password Icon" class="h-6 w-6 mr-2">
                        <input type="password" id="password" name="password"
                            placeholder="Masukkan Password"
                            class="w-full bg-transparent text-gray-700 focus:outline-none" required>
                    </div>
                </div>
    
                <!-- Submit Button -->
                <button type="submit"
                        class="w-full bg-[#396E66] hover:bg-[#2E5C55] text-white font-semibold py-3 px-4 rounded-lg flex items-center justify-center gap-2 transition-all">
                    <img src="{{ asset('images/login.png') }}" alt="Login Icon" class="h-6 w-6">
                    Login
                </button>

                <!-- Register Link --> 
                <div class="text-center mt-5">
                    <p class="text-gray-500">
                        Belum memiliki akun? 
                        <a href="{{ route('register') }}" class="text-[#396E66] font-semibold underline hover:text-[#2E5C55]">Buat Akun</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

