<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
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
            <form method="POST" action="{{ route('register_proses') }}">
                @csrf
                
                <!-- Nama -->
                <div class="mb-5">
                    <div class="flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3">
                        <img src="/images/nama.png" alt="Nama" class="h-6 w-6 mr-2">
                        <input type="text" name="nama" placeholder="Nama Lengkap" class="w-full focus:outline-none" value="{{ old('nama') }}">
                    </div>
                    @error('nama')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                
                <!-- Nomor Induk -->
                <div class="mb-5">
                    <div class="flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3">
                        <img src="/images/nisn.png" alt="NISN/NIM" class="h-6 w-6 mr-2">
                        <input type="text" name="nomor_induk" placeholder="Nomor induk" class="w-full focus:outline-none" value="{{ old('nomor_induk') }}">
                    </div>
                    @error('nomor_induk')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                
                <!-- Email -->
                <div class="mb-5">
                    <div class="flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3">
                        <img src="/images/email.png" alt="Email" class="h-6 w-6 mr-2">
                        <input type="email" name="email" placeholder="Email" class="w-full focus:outline-none" value="{{ old('email') }}">
                    </div>
                    @error('email')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                
                <!-- Password -->
                <div class="mb-5">
                    <div class="flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3">
                        <img src="/images/password2.png" alt="Password" class="h-6 w-6 mr-2">
                        <input type="password" name="password" placeholder="Password" class="w-full focus:outline-none">
                    </div>
                    @error('password')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                
                <!-- Konfirmasi Password -->
                <div class="mb-5">
                    <div class="flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3">
                        <img src="/images/password.png" alt="Konfirmasi Password" class="h-6 w-6 mr-2">
                        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" class="w-full focus:outline-none">
                    </div>
                </div>
                
                <!-- Submit Button -->
                <button type="submit" class="w-full bg-[#396E66] hover:bg-[#2E5C55] text-white font-semibold py-3 px-4 rounded-lg flex items-center justify-center gap-2">
                    Register
                    <img src="/images/login.png" alt="Login" class="h-6 w-6">
                </button>
                
                <!-- Login Link -->
                <div class="text-center mt-5">
                    <p class="text-gray-500">
                        Sudah memiliki akun? 
                        <a href="/login" class="text-[#396E66] font-normal underline">Login</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
