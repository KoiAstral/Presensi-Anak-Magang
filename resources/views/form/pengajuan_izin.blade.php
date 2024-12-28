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
            <h1 class="text-lg font-semibold">Form pengajuan izin / sakit</h1>
        </header>
        <main class="flex-1 flex items-start justify-center mt-10">
            <div class="w-full max-w-lg">
                <div class="bg-[#EAEAEA] p-4 mb-4 rounded-md border-top-green shadow-md text-center">
                    <h2 class="text-lg font-bold text-black">Form pegajuan izin / sakit</h2>
                    <p class="text-medium text-gray-600">Silahkan isi data dibawah ini</p>
                </div>
                <form>
                    <div class="mb-5 flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-transparent">
                        <img src="/images/nama.png" alt="Nama Logo" class="h-6 w-6 mr-2">
                        <input type="text" placeholder="Nama" 
                            class="w-full bg-transparent text-gray-700 focus:outline-none">
                    </div>
                    <div class="mb-5 flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-transparent">
                        <img src="/images/asal.png" alt="Sekolah/Universitas Logo" class="h-6 w-6 mr-2">
                        <input type="text" placeholder="Sekolah/Universitas" 
                            class="w-full bg-transparent text-gray-700 focus:outline-none">
                    </div>
                    <div class="mb-5 flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-transparent">
                        <img src="/images/nisn.png" alt="NISN Logo" class="h-6 w-6 mr-2">
                        <input type="text" placeholder="NISN/NIM" 
                            class="w-full bg-transparent text-gray-700 focus:outline-none">
                    </div>
                    <div class="mb-5 flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-transparent">
                        <img src="/images/alasan.png" alt="Alasan Logo" class="h-6 w-6 mr-2">
                        <input type="text" placeholder="Alasan izin / sakit" 
                            class="w-full bg-transparent text-gray-700 focus:outline-none">
                    </div>
                    <div class="mb-5 flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-transparent relative">
                        <select id="jenis_izin" name="jenis_izin" required class="w-full bg-transparent text-gray-700 focus:outline-none appearance-none pr-10">
                            <option value="" disabled selected>Pilih jenis izin</option>
                            <option value="sakit">Izin</option>
                            <option value="pribadi">Sakit</option>
                        </select>
                        <svg id="arrow" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700 absolute right-3 top-1/2 transform -translate-y-1/2 arrow-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                    <div class="mb-5 flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-transparent">
                        <img src="/images/date.png" alt="Mulai izin Logo" class="h-6 w-6 mr-2">
                        <input type="text" placeholder="Mulai izin" 
                            class="w-full bg-transparent text-gray-700 focus:outline-none">
                    </div>
                    <div class="mb-5 flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-transparent">
                        <img src="/images/date.png" alt="Sampai dengan Logo" class="h-6 w-6 mr-2">
                        <input type="text" placeholder="Sampai dengan" 
                            class="w-full bg-transparent text-gray-700 focus:outline-none">
                    </div>
                    <button id="btnKirim" type="submit"
                            class="w-full bg-[#396E66] hover:bg-[#2E5C55] text-white font-semibold py-3 px-4 rounded-lg flex items-center justify-center gap-2">
                            Kirim
                        <img src="/images/login.png" alt="Login Logo" class="h-6 w-6">
                    </button>
                </form>
            </div>
        </main>
        <div id="popupSuccess" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-start justify-center pt-16 z-50">
            <div class="bg-white rounded-md p-5 w-96 relative animate-slide-down">
                <div class="flex items-center justify-between">
                    <div class="flex flex-col items-start">
                        <p class="text-lg font-semibold">Pengajuan izin berhasil!</p>
                        <p class="text-sm font-medium">Menunggu konfirmasi admin</p>
                    </div>
                    <img src="/images/berhasil.png" alt="Success Icon" class="h-8 w-8 ml-4">
                </div>
            </div>
        </div>
    </div>
    <script>
        const select = document.getElementById('jenis_izin');
        const arrow = document.getElementById('arrow');

        select.addEventListener('click', function() {
            arrow.classList.toggle('rotate-180'); 
        });

        $(document).ready(function() {
            $('#btnKirim').on('click', function(event) {
                event.preventDefault();
                $('#popupSuccess').removeClass('hidden');
                setTimeout(function() {
                    $('#popupSuccess').addClass('hidden');
                    window.location.href = "/dashboard_user";
                }, 2000);
            });
        });
    </script>
</body>
</html>
    