<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Presensi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
        main {
            transition: padding-left 0.3s ease;
        }
        #dataTable_wrapper {
            width: 100%;
        }
        #dataTable {
            width: 100%;
            table-layout: auto;
        }
        #dataTable th, #dataTable td {
            white-space: nowrap; 
        }
        #dataTable th:nth-child(3),
        #dataTable td:nth-child(3) {
            min-width: 150px; 
        }
        #dataTable th:nth-child(4),
        #dataTable td:nth-child(4) {
            min-width: 200px; 
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
        <div id="sidebar" class="bg-black text-white w-64 h-full fixed top-0 left-0 -translate-x-full transition-transform z-40 flex flex-col justify-between">
            <div>
                <div class="px-4 pt-3 pb-2 flex items-center border-b border-gray-300">
                    <img src="/images/username.png" alt="User Icon" class="h-10 w-10 mr-4">
                    <span class="text-sm font-semibold">{{$user->nama}}</span>
                </div>
                <div class="border-1"></div>
                <div class="mt-4">
                    <a href="/dashboard" class="flex items-center px-4 py-2 hover:bg-gray-700">
                        <img src="/svg/home.svg" alt="Home Icon" class="h-6 w-6 mr-4">
                        <span>Home</span>
                    </a>
                    <a href="/data-siswa" class="flex items-center px-4 py-2 hover:bg-gray-700">
                        <img src="/images/data.png" alt="Riwayat Absensi Icon" class="h-6 w-6 mr-4">
                        <span>Data Anak Magang</span>
                    </a>
                    <a href="/riwayat-presensi" class="flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700">
                        <img src="/images/riwayat.png" alt="Riwayat Absensi Icon" class="h-6 w-6 mr-4">
                        <span>Riwayat Presensi</span>
                    </a>
                    <a href="/konfirmasi-pengajuan" class="flex items-center px-4 py-2 hover:bg-gray-700">
                        <img src="/svg/data_pengajuan.svg" alt="Konfirmasi Izin Icon" class="h-6 w-6 mr-4">
                        <span>Konfirmasi Pengajuan Izin</span>
                    </a>
                </div>
            </div>
            <div class="p-4 flex items-center cursor-pointer" id="logoutButton">
                <a class="flex items-center">
                    <img src="/images/logout.png" alt="Logout Icon" class="h-6 w-6 mr-4">
                    <span>Logout</span>
                </a>
            </div>
        </div>

        <div id="mainContent" class="flex flex-col transition-transform duration-300 w-full pl-0">
            <header class="bg-white border-b-2 border-[#396E66] p-4 flex items-center z-50 relative">
                <button id="sidebarToggle" class="mr-4 text-[#396E66] focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <h1 class="text-lg font-semibold">Presensi Magang Sekretariat DPRD Kab. Banjar</h1>
            </header>
            <main id="content" class="p-6 flex flex-col items-center mx-auto">
                <div class="bg-[#EAEAEA] p-4 mb-6 rounded-md border-t-4 border-[#396E66] shadow-md text-center w-full max-w-md">
                    <h2 class="text-lg font-bold text-black">Data Presensi Anak Magang</h2>
                </div>
                <div class="w-full max-w-5xl mx-auto">
                    <table id="dataTable" class="display w-full">
                        <thead class="bg-[#EAEAEA]">
                            <tr>
                                <th class="border border-gray-300 px-6 py-4">No</th>
                                <th class="border border-gray-300 px-6 py-4">nomor induk</th>
                                <th class="border border-gray-300 px-6 py-4">nama</th>
                                <th class="border border-gray-300 px-6 py-4">Tanggal presensi</th>
                                <th class="border border-gray-300 px-6 py-4">waktu presensi</th>
                                <th class="border border-gray-300 px-6 py-4">status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($presensi as $data )
                            <tr>
                                <td class="px-6 py-4">{{$loop->iteration}}</td>
                                <td class="px-6 py-4">{{ $data->user->nomor_induk }}</td>
                                <td class="px-6 py-4">{{ $data->user->nama }}</td>
                                <td class="px-6 py-4">{{$data->tanggal_presensi}}</td>
                                <td class="px-6 py-4">{{$data->waktu_presensi}}</td>
                                <td class="px-6 py-4">{{$data->status}}</td>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
            <div id="logoutModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white rounded-md py-6 px-12 relative">
                    <p class="text-center text-lg font-semibold mb-8 mt-4">Apakah anda yakin ingin Logout?</p>
                    <img id="closePopup" src="/svg/Close.svg" alt="Close pop up" class="absolute top-2 right-2 h-6 w-6 cursor-pointer">
                    <div class="flex space-x-4 mt-4">
                    <button id="cancelLogout" class="bg-[#ECB131] text-white font-bold flex-1 py-2 rounded-md shadow">
                        Batal
                    </button>
                    <a href="{{route('logout')}}" class="bg-[#396E66] text-white font-bold flex-1 py-2 rounded-md shadow text-center inline-block">
                        Ya
                    </a>
                </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        const sidebarToggle = document.getElementById("sidebarToggle");
        const sidebar = document.getElementById("sidebar");
        const mainContent = document.getElementById("mainContent");
        sidebarToggle.addEventListener("click", () => {
            sidebar.classList.toggle("-translate-x-full");
            sidebar.classList.toggle("translate-x-0");
            mainContent.style.paddingLeft = sidebar.classList.contains("-translate-x-full") ? "0" : "16rem";
        });

        $(document).ready(function() {
            $('#dataTable').DataTable({
                responsive: true, 
                autoWidth: false,
            });

            $('#logoutButton').on('click', function () {
                $('#logoutModal').removeClass('hidden');
            });
            $('#closePopup, #cancelLogout').on('click', function () {
                $('#logoutModal').addClass('hidden');
            });
        });
    </script>
</body>
</html>