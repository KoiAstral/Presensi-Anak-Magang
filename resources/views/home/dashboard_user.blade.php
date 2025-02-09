<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
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
    <div class="relative h-screen overflow-hidden">
        <div id="mainContent" class="flex flex-col">
            <header class="bg-white border-b-2 border-[#396E66] p-4 flex items-center justify-between z-50 relative">
                <h1 class="text-lg font-semibold">Presensi Magang Sekretariat DPRD Kab. Banjar</h1>
                <div id="profileMenu" class="flex items-center space-x-2 cursor-pointer">
                    <img src="/images/akun.png" alt="Icon" class="h-10 w-10 rounded-full">
                    <div>
                        <span class="text-sm font-bold text-black">Azizah Nur Octaviani</span>
                        <p class="text-gray-500 text-xs mt-1 font-light">543221192</p>
                    </div>
                    <img id="arrowIcon" src="/images/panah.png" alt="Arrow" class="h-8 w-8 transition-transform duration-300">
                </div>

                <div id="modalProfile" class="absolute top-16 right-0 bg-white shadow-lg rounded-md w-64 hidden flex flex-col overflow-hidden">
                    <a href="/profile_detail" class="flex items-center px-4 py-2 w-full text-left hover:bg-gray-200 font-semibold text-black">
                        <img src="/images/detail_profile.png" alt="Icon" class="h-6 w-8 mr-2">
                        <span>Detail Profil</span>
                    </a>
                    <a id="btnLogout" class="flex items-center px-4 py-2 w-full text-left hover:bg-gray-200 font-semibold text-black cursor-pointer">
                        <img src="/images/logout2.png" alt="Icon" class="h-6 w-8 mr-2">
                        <span>Logout</span>
                    </a>
                </div>
            </header>

            <main class="p-6">
                <div class="flex justify-center space-x-6">
                    <div class="bg-[#396E66]/20 p-6 rounded-md w-1/3">
                        <div class="flex items-center justify-between">
                            <h2 class="text-xl font-bold text-black">Presensi Kehadiran</h2>
                            <img src="/images/presensi.png" alt="Icon" class="h-12 w-12">
                        </div>
                        <p class="text-sm font-light text-gray-600 mt-2">Anda belum melakukan presensi hari ini.</p>
                        <button id="btnPresensi" class="mt-4 bg-[#396E66] text-white font-bold px-4 py-2 rounded-md w-full">
                            Presensi
                        </button>
                    </div>

                    <div class="bg-[#00307D]/20 p-6 rounded-md w-1/3">
                        <div class="flex items-center justify-between">
                            <h2 class="text-xl font-bold text-black">Pengajuan Izin</h2>
                            <img src="/images/izin.png" alt="Icon" class="h-12 w-12">
                        </div>
                        <p class="text-sm font-light text-gray-600 mt-2">Silahkan buat pengajuan izin jika diperlukan.</p>
                        <button class="mt-4 bg-[#00307D] text-white font-bold px-4 py-2 rounded-md w-full">
                            <a href="/pengajuan_absensi" class="block w-full text-center">Buat Pengajuan</a>
                        </button>
                    </div>
                </div>

                <div class="mt-8 mx-20">
                    <table id="dataTable" class="display text-sm w-full border-collapse border border-gray-300">
                        <thead class="bg-[#EAEAEA]">
                            <tr>
                                <th class="border border-gray-300 px-4 py-2">Tanggal</th>
                                <th class="border border-gray-300 px-4 py-2">Waktu</th>|
                                <th class="border border-gray-300 px-4 py-2">status</th>|
                                <th class="border border-gray-300 px-4 py-2">detail</th>|
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-4 py-2">01/01/2000</td>
                                <td class="px-4 py-2">07.00</td>
                                <td class="px-4 py-2">hadir</td>
                                <td class="px-4 py-2"><a class="bg-[#396E66] text-white px-4 py-2" href="">Detail</a></td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2">01/01/2000</td>
                                <td class="px-4 py-2">07.30</td>
                                <td class="px-4 py-2">hadir</td>
                                <td class="px-4 py-2">hadir</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2">01/01/2000</td>
                                <td class="px-4 py-2">07.45</td>
                                <td class="px-4 py-2">hair</td>
                                <td class="px-4 py-2">hair</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2">01/01/2000</td>
                                <td class="px-4 py-2">09.00</td>
                                <td class="px-4 py-2">alpha</td>
                                <td class="px-4 py-2">alpha</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <div id="popupPresensi" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-md py-6 px-8 relative">
            <p class="text-center text-lg font-semibold mb-6 mt-4">Anda akan melakukan absensi untuk kehadiran hari ini.</p>
            <img id="closePopup" src="/images/Close.png" alt="Close pop up" class="absolute top-2 right-2 h-6 w-6 cursor-pointer">
            <div class="flex justify-around">
                <button id="btnBatal" class="bg-[#ECB131] text-white font-bold px-24 py-2 rounded-md">Batal</button>
                <button id="btnHadir" class="bg-[#396E66] text-white font-bold px-24 py-2 rounded-md">Hadir</button>
            </div>
        </div>
    </div>
    <div id="popupKonfirmasi" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-start justify-center z-50 pt-16">
        <div class="bg-white rounded-md p-4 relative animate-slide-down w-96">
            <div class="flex items-center">
                <p class="text-lg font-semibold mr-4">Terima kasih, presensi berhasil!</p>
                <img src="/images/berhasil.png" alt="Presensi Berhasil" class="h-8 w-8">
            </div>
        </div>
    </div>

    <div id="popupLogout" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-md py-6 px-12 relative">
            <p class="text-center text-lg font-semibold mb-8 mt-4">Apakah anda yakin ingin Logout?</p>
            <img id="closePopup" src="/images/close.png" alt="Close pop up" class="absolute top-2 right-2 h-6 w-6 cursor-pointer">
            <div class="flex space-x-4 mt-4">
            <button id="btnBatal" class="bg-[#ECB131] text-white font-bold flex-1 py-2 rounded-md shadow">
                Batal
            </button>
            <a href="{{route('logout')}}" class="bg-[#396E66] text-white font-bold flex-1 py-2 rounded-md shadow text-center inline-block">
                Ya
            </a>
        </div>
        </div>
    </div>
</body>
</html>
<script>
    $(document).ready(function () {
        // table
        $('#dataTable').DataTable();

        // toggle profile
        let isProfileOpen = false;
        $('#profileMenu').on('click', function (e) {
            e.stopPropagation();
            $('#modalProfile').toggle();
            isProfileOpen = !isProfileOpen;
            const arrowIcon = $('#arrowIcon');
            arrowIcon.css('transform', isProfileOpen ? 'rotate(180deg)' : 'rotate(0deg)');
        });
        $(document).on('click', function () {
            $('#modalProfile').hide();
            isProfileOpen = false;
            $('#arrowIcon').css('transform', 'rotate(0deg)');
        });

        // pop up presensi
        $('#btnPresensi').on('click', function () {
            $('#popupPresensi').removeClass('hidden');
        });
        $('#closePopup, #btnBatal').on('click', function () {
            $('#popupPresensi').addClass('hidden');
        });
        $('#btnHadir').on('click', function () {
            $('#popupPresensi').addClass('hidden');
            $('#popupKonfirmasi').removeClass('hidden');
            setTimeout(() => {
                $('#popupKonfirmasi').addClass('hidden');
            }, 3000);
        });

        //pop up logout 
        $('#btnLogout').on('click', function () {
            $('#popupLogout').removeClass('hidden');
        });
        $('#closePopup, #btnBatal').on('click', function () {
            $('#popupLogout').addClass('hidden');
        });
    });
</script>

