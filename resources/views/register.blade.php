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
        <div class="bg-white rounded-lg p-8 w-[500px]" style="box-shadow: 0 4px 10px #396E66;">
            <div class="flex flex-col items-center mb-6">
                <img src="/images/dprd.png" alt="Logo" class="h-36">
                <p class="text-center text-lg font-bold mt-4">
                    Presensi PKL Sekretariat DPRD Kab. Banjar
                </p>
            </div>
            <form>
                <div class="mb-5 flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-transparent">
                    <img src="/images/nama.png" alt="Nama Logo" class="h-6 w-6 mr-2">
                    <input type="text" placeholder="Nama" 
                        class="w-full bg-transparent text-gray-700 focus:outline-none">
                </div>
                <div class="mb-5 flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-transparent">
                    <img src="/images/jurusan.png" alt="Jurusan Logo" class="h-6 w-6 mr-2">
                    <input type="text" placeholder="Jurusan" 
                        class="w-full bg-transparent text-gray-700 focus:outline-none">
                </div>
                <div class="mb-5 flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-transparent">
                    <img src="/images/kelas.png" alt="Kelas Logo" class="h-6 w-6 mr-2">
                    <input type="text" placeholder="Kelas" 
                        class="w-full bg-transparent text-gray-700 focus:outline-none">
                </div>
                <div class="mb-5 flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-transparent">
                    <img src="/images/asal.png" alt="Asal Sekolah Logo" class="h-6 w-6 mr-2">
                    <input type="text" placeholder="Asal Sekolah" 
                        class="w-full bg-transparent text-gray-700 focus:outline-none">
                </div>
                <div class="mb-5 flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-transparent">
                    <img src="/images/nisn.png" alt="NISN Logo" class="h-6 w-6 mr-2">
                    <input type="text" placeholder="NISN" 
                        class="w-full bg-transparent text-gray-700 focus:outline-none">
                </div>
                <div class="mb-5 flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-transparent">
                    <img src="/images/password.png" alt="Password Logo" class="h-6 w-6 mr-2">
                    <input type="password" placeholder="Password" 
                        class="w-full bg-transparent text-gray-700 focus:outline-none">
                </div>
                <div class="mb-5 flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-transparent">
                    <img src="/images/password2.png" alt="Konfirmasi Password Logo" class="h-6 w-6 mr-2">
                    <input type="password" placeholder="Konfirmasi Password" 
                        class="w-full bg-transparent text-gray-700 focus:outline-none">
                </div>
                <button type="submit"
                        class="w-full bg-[#396E66] hover:bg-[#2E5C55] text-white font-semibold py-3 px-4 rounded-lg flex items-center justify-center gap-2">
                        Register
                    <img src="/images/login.png" alt="Login Logo" class="h-6 w-6">
                </button>
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
