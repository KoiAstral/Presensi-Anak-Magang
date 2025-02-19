<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Izin</title>
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

        .arrow-icon {
            transition: transform 0.1s ease;
        }

        .rotate-180 {
            transform: rotate(180deg);
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
            <h1 class="text-lg font-semibold">Profile saya</h1>
        </header>
        <main class="flex-1 flex items-start justify-center mt-10">
            <div class="w-full max-w-lg">
                <div class="bg-[#EAEAEA] p-4 mb-4 rounded-md border-top-green shadow-md text-center">
                    <h2 class="text-lg font-bold text-black">Edit Profile</h2>
                </div>
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-8 flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-transparent">
                        <img src="/svg/Name.svg" alt="Nama Lengkap Logo" class="h-6 w-6 mr-2">
                        <input type="text" name="nama" placeholder="Nama Lengkap"
                            value="{{ old('nama', auth()->user()->nama) }}"
                            class="w-full bg-transparent text-gray-700 focus:outline-none">
                    </div>
                    <div class="mb-8 flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-transparent">
                        <img src="/svg/Email.svg" alt="Email Logo" class="h-6 w-6 mr-2">
                        <input type="email" name="email" placeholder="Email"
                            value="{{ old('email', auth()->user()->email) }}"
                            class="w-full bg-transparent text-gray-700 focus:outline-none">
                    </div>
                    <div class="mb-8 flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-transparent">
                        <img src="/svg/nomor_induk.svg" alt="NISN Logo" class="h-6 w-6 mr-2">
                        <input type="text" name="nomor_induk" placeholder="Nomor Induk"
                            value="{{ old('nomor_induk', auth()->user()->nomor_induk) }}"
                            class="w-full bg-transparent text-gray-700 focus:outline-none">
                    </div>
                    <div class="mb-8 flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-transparent">
                        <img src="/svg/school.svg" alt="Sekolah/Universitas Logo" class="h-6 w-6 mr-2">
                        <input type="text" name="sekolah" placeholder="Sekolah/Universitas"
                            value="{{ old('sekolah', auth()->user()->sekolah) }}"
                            class="w-full bg-transparent text-gray-700 focus:outline-none">
                    </div>
                    <button id="btnKirim" type="submit"
                        class="w-full bg-[#396E66] hover:bg-[#2E5C55] text-white font-semibold py-3 px-4 rounded-lg flex items-center justify-center gap-2">
                        Kirim Perubahan
                        <img src="/images/login.png" alt="Login Logo" class="h-6 w-6">
                    </button>
                </form>
            </div>
        </main>
        <div id="popupSuccess"
            class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-start justify-center z-50 pt-16">
            <div class="bg-white rounded-md p-4 relative animate-slide-down w-96">
                <div class="flex items-center">
                    <p class="text-lg font-semibold mr-4">Pembaharuan Profile berhasil</p>
                    <img src="/images/berhasil.png" alt="Presensi Berhasil" class="h-8 w-8">
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('form').on('submit', function(event) {
                event.preventDefault(); // Prevent default form submission
                $('#popupSuccess').removeClass('hidden');
                setTimeout(function() {
                    $('#popupSuccess').addClass('hidden');
                    $('form').unbind('submit').submit(); // Re-enable form submission
                }, 2000); // Reduce delay to 2 seconds for better UX
            });
        });
    </script>
</body>
</html>
