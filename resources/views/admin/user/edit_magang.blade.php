<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Magang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }

        .border-top-green {
            border-top: 4px solid #396E66;
        }

        @keyframes slide-down {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .animate-slide-down {
            animation: slide-down 0.5s ease-out forwards;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="h-screen flex flex-col">
        <header class="bg-white border-b-2 border-[#396E66] p-2 flex items-center space-x-2">
            <button onclick="window.history.back()" class="p-2">
                <img src="/images/back.png" alt="Back" class="h-10 w-10">
            </button>
            <h1 class="text-lg font-semibold">Edit data anak magang</h1>
        </header>
        <main class="flex-1 flex items-start justify-center mt-10">
            <div class="w-full max-w-lg">
                <div class="bg-[#EAEAEA] p-4 mb-8 rounded-md border-top-green shadow-md text-center">
                    <h2 class="text-lg font-bold text-black">Edit data anak magang</h2>
                    <p class="text-medium text-gray-600">Silahkan edit data dibawah ini.</p>
                </div>
                <form action="{{ route('admin.user.update_magang', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-8">
                        <div class="flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-transparent">
                            <img src="/svg/name.svg" alt="Nama Lengkap Logo" class="h-6 w-6 mr-2">
                            <input type="text" name="nama" value="{{ old('nama', $user->nama) }}"
                                class="w-full bg-transparent text-gray-700 focus:outline-none">
                        </div>
                        @error('nama')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-8">
                        <div class="flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-transparent">
                            <img src="/svg/School.svg" alt="Sekolah/Universitas Logo" class="h-6 w-6 mr-2">
                            <input type="text" name="sekolah" value="{{ old('sekolah', $user->sekolah) }}"
                                class="w-full bg-transparent text-gray-700 focus:outline-none">
                        </div>
                        @error('sekolah')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-8">
                        <div class="flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-transparent">
                            <img src="/svg/nomor_induk.svg" alt="NISN Logo" class="h-6 w-6 mr-2">
                            <input type="text" name="nomor_induk"
                                value="{{ old('nomor_induk', $user->nomor_induk) }}"
                                class="w-full bg-transparent text-gray-700 focus:outline-none">
                        </div>
                        @error('nomor_induk')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-8">
                        <div class="flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-transparent">
                            <img src="/svg/email.svg" alt="Email Logo" class="h-6 w-6 mr-2">
                            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                class="w-full bg-transparent text-gray-700 focus:outline-none">
                        </div>
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Tombol Submit -->
                    <button id="btnkirim" type="submit"
                        class="w-full bg-[#396E66] hover:bg-[#2E5C55] text-white font-semibold py-3 px-4 rounded-lg flex items-center justify-center gap-2">
                        Kirim
                        <img src="/svg/login.svg" alt="Login Logo" class="h-6 w-6">
                    </button>
                </form>
            </div>
        </main>
</body>

</html>
