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
    <div id="sidebar" class="bg-black text-white w-64 h-full fixed top-0 left-0 -translate-x-full transition-transform z-40 flex flex-col justify-between">
        <div>
            <div class="px-4 pt-3 pb-2 flex items-center border-b border-gray-300">
                <img src="/images/username.png" alt="User Icon" class="h-10 w-10 mr-4">
                <span class="text-lg font-semibold">Username</span>
            </div>
            <div class="border-1"></div>
            <div class="mt-4">
                <a href="/data_magang" class="flex items-center px-4 py-2 hover:bg-gray-700">
                    <img src="/images/data.png" alt="Riwayat Absensi Icon" class="h-6 w-6 mr-4">
                    <span>Data Anak Magang</span>
                </a>
                <a href="/riwayat_absensi" class="flex items-center px-4 py-2 hover:bg-gray-700">
                    <img src="/images/riwayat.png" alt="Riwayat Absensi Icon" class="h-6 w-6 mr-4">
                    <span>Riwayat Absensi</span>
                </a>
            </div>
        </div>

        <div class="p-4">
            <a href="/login" class="flex items-center">
                <img src="/images/logout.png" alt="Logout Icon" class="h-6 w-6 mr-4">
                <span>Logout</span>
            </a>
        </div>
    </div>

        <div id="mainContent" class="flex flex-col transform transition-transform duration-300">
            <header class="bg-white border-b-2 border-[#396E66] p-4 flex items-center z-50 relative">
                <button id="sidebarToggle" class="mr-4 text-[#396E66] focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <h1 class="text-lg font-semibold">Presensi Magang Sekretariat DPRD Kab. Banjar</h1>
            </header>
            <main class="p-6">
                <h2 class="text-xl font-semibold">Selamat datang di Dashboard!</h2>
            </main>
        </div>
    </div>

    <script>
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');

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
    </script>
</body>
</html>
