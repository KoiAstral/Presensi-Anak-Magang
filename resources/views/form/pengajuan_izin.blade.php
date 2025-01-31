<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Izin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
        .border-top-green {
            border-top: 4px solid #396E66;
        }
        .arrow-icon {
            transition: transform 0.2s ease;
        }
        .rotate-180 {
            transform: rotate(180deg);
        }
        @keyframes slide-down {
            from {
                transform: translateY(-10px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        .animate-slide-down {
            animation: slide-down 0.3s ease-out forwards;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="h-screen flex flex-col">
        <header class="bg-white border-b-2 border-[#396E66] p-3 flex items-center space-x-2">
            <button onclick="window.history.back()" class="p-2">
                <img src="/images/back.png" alt="Back" class="h-8 w-8">
            </button>
            <h1 class="text-lg font-semibold">Form Pengajuan Izin / Sakit</h1>
        </header>

        <main class="flex-1 flex items-start justify-center mt-10">
            <div class="w-full max-w-lg">
                <div class="bg-[#EAEAEA] p-4 mb-4 rounded-md border-top-green shadow-md text-center">
                    <h2 class="text-lg font-bold text-black">Form Pengajuan</h2>
                    <p class="text-medium text-gray-600">Silahkan isi data di bawah ini</p>
                </div>

                <form  method="POST" action="{{ route('store.absensi') }}">
                    @csrf

                    <!-- Nomor Induk -->
                    <div class="mb-5 flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-transparent">
                        <img src="/images/nisn.png" alt="Nomor Induk" class="h-6 w-6 mr-2">
                        <input type="text" name="nomor_induk" placeholder="Nomor Induk (NIP/NISN)" 
                            class="w-full bg-transparent text-gray-700 focus:outline-none" required>
                    </div>

                    <!-- Waktu Absensi -->
                    <div class="mb-5 flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-transparent">
                        <img src="/images/time.png" alt="Waktu Absensi" class="h-6 w-6 mr-2">
                        <input type="time" name="waktu_absensi" required
                            class="w-full bg-transparent text-gray-700 focus:outline-none">
                    </div>

                    <!-- Jenis Absensi -->
                    <div class="mb-5 flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-transparent relative">
                        <select id="jenis_absensi" name="jenis_absensi" required 
                            class="w-full bg-transparent text-gray-700 focus:outline-none appearance-none pr-10">
                            <option value="" disabled selected>Pilih jenis absensi</option>
                            <option value="izin">Izin</option>
                            <option value="sakit">Sakit</option>
                        </select>
                        <svg id="arrowIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700 absolute right-3 top-1/2 transform -translate-y-1/2 arrow-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>

                    <!-- Keterangan -->
                    <div class="mb-5 flex border-2 border-[#396E66] rounded-lg px-4 py-3 bg-transparent">
                        <img src="/images/alasan.png" alt="Keterangan" class="h-6 w-6 mr-2">
                        <textarea name="keterangan" placeholder="Jelaskan alasan izin / sakit" rows="3"
                            class="w-full bg-transparent text-gray-700 focus:outline-none resize-none" required></textarea>
                    </div>

                    <!-- Tanggal Mulai -->
                    <div class="mb-5 flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-transparent">
                        <img src="/images/date.png" alt="Tanggal Mulai" class="h-6 w-6 mr-2">
                        <input type="date" name="tanggal_mulai" required
                            class="w-full bg-transparent text-gray-700 focus:outline-none">
                    </div>

                    <!-- Tanggal Akhir -->
                    <div class="mb-5 flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-transparent">
                        <img src="/images/date.png" alt="Tanggal Akhir" class="h-6 w-6 mr-2">
                        <input type="date" name="tanggal_akhir" required
                            class="w-full bg-transparent text-gray-700 focus:outline-none">
                    </div>

                    <!-- Submit Button -->
                    <button id="btnKirim" type="submit"
                        class="w-full bg-[#396E66] hover:bg-[#2E5C55] text-white font-semibold py-3 px-4 rounded-lg flex items-center justify-center gap-2">
                        Kirim
                        <img src="/images/login.png" alt="Kirim" class="h-6 w-6">
                    </button>
                </form>
            </div>
        </main>

        <!-- Success Popup -->
        <div id="popupSuccess" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-start justify-center pt-16 z-50">
            <div class="bg-white rounded-md p-5 w-96 relative animate-slide-down">
                <div class="flex items-center justify-between">
                    <div class="flex flex-col items-start">
                        <p class="text-lg font-semibold">Pengajuan berhasil!</p>
                        <p class="text-sm font-medium">Menunggu konfirmasi admin.</p>
                    </div>
                    <img src="/images/berhasil.png" alt="Success" class="h-8 w-8 ml-4">
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('jenis_absensi').addEventListener('click', function() {
            document.getElementById('arrowIcon').classList.toggle('rotate-180');
        });

        document.getElementById('izinForm').addEventListener('submit', function(event) {
            event.preventDefault();
            document.getElementById('popupSuccess').classList.remove('hidden');

            setTimeout(() => {
                window.location.href = "/dashboard";
            }, 3000);
        });
    </script>
</body>
</html>
