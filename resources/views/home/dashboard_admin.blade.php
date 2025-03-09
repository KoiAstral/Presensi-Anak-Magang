<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="relative h-screen overflow-hidden">
        <!-- Sidebar -->
        <div id="sidebar"
            class="bg-black text-white w-64 h-full fixed top-0 left-0 -translate-x-full transition-transform z-40 flex flex-col justify-between">
            <div>
                <div class="px-4 pt-3 pb-2 flex items-center border-b border-gray-300">
                    <img src="/images/username.png" alt="User Icon" class="h-10 w-10 mr-4">
                    <span class="text-lg font-semibold">{{ $user->nama }}</span>
                </div>
                <div class="mt-4">
                    <a href="/dashboard" class="flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700">
                        <img src="/svg/home.svg" alt="Home Icon" class="h-6 w-6 mr-4">
                        <span>Home</span>
                    </a>
                    <a href="/data-siswa" class="flex items-center px-4 py-2 hover:bg-gray-700">
                        <img src="/svg/form.svg" alt="Data Siswa Icon" class="h-6 w-6 mr-4">
                        <span>Data Siswa/i Magang</span>
                    </a>
                    <a href="/riwayat-presensi" class="flex items-center px-4 py-2 hover:bg-gray-700">
                        <img src="/svg/time.svg" alt="Riwayat Absensi Icon" class="h-6 w-6 mr-4">
                        <span>Riwayat presensi</span>
                    </a>
                    <a href="/konfirmasi-pengajuan" class="flex items-center px-4 py-2 hover:bg-gray-700">
                        <img src="/svg/data_pengajuan.svg" alt="Konfirmasi Izin Icon" class="h-6 w-6 mr-4">
                        <span>Konfirmasi Pengajuan Izin</span>
                    </a>
                </div>
            </div>

            <div class="p-4">
                <button id="logoutButton" class="flex items-center">
                    <img src="/images/logout.png" alt="Logout Icon" class="h-6 w-6 mr-4">
                    <span>Logout</span>
                </button>
            </div>
        </div>

        <!-- Main Content -->
        <div id="mainContent" class="flex flex-col transform transition-transform duration-300">
            <header class="bg-white border-b-2 border-[#396E66] p-4 flex items-center z-50 relative">
                <button id="sidebarToggle" aria-label="Toggle Sidebar" class="mr-4 text-[#396E66] focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <h1 class="text-lg font-semibold">Presensi Magang Sekretariat DPRD Kab. Banjar</h1>
            </header>
            <main class="p-6">
                <h2 class="text-xl font-semibold">Selamat datang di Dashboard!</h2>
            
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <!-- Total Users (Data Siswa) -->
                    <a href="{{ route('data.siswa') }}"
                        class="bg-white shadow-md rounded-lg p-4 flex items-center hover:bg-gray-100 transition">
                        <img src="/svg/Account.svg" alt="User Icon" class="h-10 w-10 mr-4">
                        <div>
                            <h3 class="text-lg font-semibold">Total Users</h3>
                            <p class="text-gray-600 text-xl font-bold">{{ $totalUsers }}</p>
                        </div>
                    </a>
            
                    <!-- Siswa Hadir -->
                    <a href="{{ route('presensi.index') }}"
                        class="bg-white shadow-md rounded-lg p-4 flex items-center hover:bg-gray-100 transition">
                        <img src="/svg/checked_checkbox.svg" alt="Check Icon" class="h-10 w-10 mr-4">
                        <div>
                            <h3 class="text-lg font-semibold">Siswa Hadir</h3>
                            <p class="text-green-600 text-xl font-bold">{{ $totalHadir }}</p>
                        </div>
                    </a>
            
                    <!-- Siswa Absensi (Konfirmasi Pengajuan) -->
                    <a href="{{ route('konfirmasi-pengajuan') }}"
                        class="bg-white shadow-md rounded-lg p-4 flex items-center hover:bg-gray-100 transition">
                        <img src="/svg/Denied.svg" alt="Cross Icon" class="h-10 w-10 mr-4">
                        <div>
                            <h3 class="text-lg font-semibold">Siswa Absensi</h3>
                            <p class="text-red-600 text-xl font-bold">{{ $totalAbsensi }}</p>
                        </div>
                    </a>
                </div>
            </main>            
        <div id="logoutModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-md py-6 px-12 relative">
                <p class="text-center text-lg font-semibold mb-8 mt-4">Apakah anda yakin ingin Logout?</p>
                <img id="closePopup" src="/svg/Close.svg" alt="Close pop up"
                    class="absolute top-2 right-2 h-6 w-6 cursor-pointer">
                <div class="flex space-x-4 mt-4">
                    <button id="cancelLogout" class="bg-[#ECB131] text-white font-bold flex-1 py-2 rounded-md shadow">
                        Batal
                    </button>
                    <a href="{{ route('logout') }}"
                        class="bg-[#396E66] text-white font-bold flex-1 py-2 rounded-md shadow text-center inline-block">
                        Ya
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const logoutButton = document.getElementById('logoutButton');
        const logoutModal = document.getElementById('logoutModal');
        const cancelLogout = document.getElementById('cancelLogout');
        const closePopup = document.getElementById('closePopup');

        // Toggle sidebar
        sidebarToggle.addEventListener('click', () => {
            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
                sidebar.classList.add('translate-x-0');
                mainContent.classList.add('translate-x-64');
            } else {
                sidebar.classList.add('-translate-x-full');
                sidebar.classList.remove('translate-x-0');
                mainContent.classList.remove('translate-x-64');
            }
        });

        // Show logout modal
        logoutButton.addEventListener('click', () => {
            logoutModal.classList.remove('hidden');
        });

        // Hide logout modal
        cancelLogout.addEventListener('click', () => {
            logoutModal.classList.add('hidden');
        });

        // Close modal when clicking the close button
        closePopup.addEventListener('click', () => {
            logoutModal.classList.add('hidden');
        });
    </script>
</body>
</html>
