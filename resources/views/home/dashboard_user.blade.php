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
                    <a href="/detail_profile" class="flex items-center px-4 py-2 w-full text-left hover:bg-gray-200 font-semibold text-black">
                        <img src="/images/detail_profile.png" alt="Icon" class="h-6 w-8 mr-2">
                        <span>Detail Profil</span>
                    </a>
                    <a href="/login" class="flex items-center px-4 py-2 w-full text-left hover:bg-gray-200 font-semibold text-black">
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
                        <button class="mt-4 bg-[#396E66] text-white font-bold px-4 py-2 rounded-md w-full">
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
                            Buat Pengajuan
                        </button>
                    </div>
                </div>

                <div class="mt-8 mx-20">
                    <table id="dataTable" class="display text-sm w-full border-collapse border border-gray-300">
                        <thead class="bg-[#EAEAEA]">
                            <tr>
                                <th class="border border-gray-300 px-4 py-2">Nama</th>
                                <th class="border border-gray-300 px-4 py-2">NIS</th>
                                <th class="border border-gray-300 px-4 py-2">Tanggal</th>
                                <th class="border border-gray-300 px-4 py-2">Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-4 py-2">Azizah Nur Octaviani</td>
                                <td class="px-4 py-2">543221192</td>
                                <td class="px-4 py-2">01/01/2000</td>
                                <td class="px-4 py-2">07.00</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2">Azizah Nur Octaviani</td>
                                <td class="px-4 py-2">543221192</td>
                                <td class="px-4 py-2">01/01/2000</td>
                                <td class="px-4 py-2">07.00</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2">Fauzia Ibaiti</td>
                                <td class="px-4 py-2">543221193</td>
                                <td class="px-4 py-2">01/01/2000</td>
                                <td class="px-4 py-2">07.00</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2">Fauzia Ibaiti</td>
                                <td class="px-4 py-2">543221193</td>
                                <td class="px-4 py-2">01/01/2000</td>
                                <td class="px-4 py-2">07.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });

    $(document).ready(function () {
    let isProfileOpen = false;
    $('#profileMenu').on('click', function (e) {
        e.stopPropagation();
        $('#modalProfile').toggle();
        isProfileOpen = !isProfileOpen;
        const arrowIcon = $('#arrowIcon');
        if (isProfileOpen) {
            arrowIcon.css('transform', 'rotate(180deg)');
        } else {
            arrowIcon.css('transform', 'rotate(0deg)');
        }
    });

    $(document).on('click', function () {
        $('#modalProfile').hide();
        isProfileOpen = false;
        $('#arrowIcon').css('transform', 'rotate(0deg)');
    });
    });
</script>

