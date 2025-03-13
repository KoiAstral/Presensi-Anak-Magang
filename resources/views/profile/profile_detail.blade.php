<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Saya</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="h-screen flex flex-col">
        <header class="bg-white border-b-2 border-[#396E66] p-2 flex items-center space-x-2">
            <button onclick="window.history.back()" class="p-2">
                <img src="/svg/Back_green.svg" alt="Back" class="h-10 w-10">
            </button>
            <h1 class="text-lg font-semibold">Profile Saya</h1>
        </header>
        <main class="flex-1 flex items-start justify-center mt-10">
            <div class="w-full max-w-lg">
                <div class="bg-[#EAEAEA] p-4 mb-4 rounded-md border-t-4 border-[#396E66] shadow-md text-center">
                    <h2 class="text-lg font-bold text-black">Detail Profile</h2>
                </div>
                <div class="mb-8 flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-transparent">
                    <img src="/svg/Name.svg" alt="Nama Lengkap Logo" class="h-6 w-6 mr-2">
                    <p class="w-full text-gray-700">{{ auth()->user()->nama }}</p>
                </div>

                <div class="mb-8 flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-transparent">
                    <img src="/svg/Email.svg" alt="Email Logo" class="h-6 w-6 mr-2">
                    <p class="w-full text-gray-700">{{ auth()->user()->email }}</p>
                </div>
                
                <div class="mb-8 flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-transparent">
                    <img src="/svg/nomor_induk.svg" alt="NISN Logo" class="h-6 w-6 mr-2">
                    <p class="w-full text-gray-700">{{ auth()->user()->nomor_induk }}</p>
                </div>

                <div class="mb-8 flex items-center border-2 border-[#396E66] rounded-lg px-4 py-3 bg-transparent">
                    <img src="/svg/school.svg" alt="Sekolah/Universitas Logo" class="h-6 w-6 mr-2">
                    <p class="w-full text-gray-700">{{ auth()->user()->sekolah }}</p>
                </div>
            </div>
        </main>
    </div>
</body>
</html>