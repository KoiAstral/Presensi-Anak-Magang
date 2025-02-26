<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Magang</title>
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

        #dataTable th,
        #dataTable td {
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
                    <span class="text-sm font-semibold">Admin User</span>
                </div>
                <div class="border-1"></div>
                <div class="mt-4">
                    <a href="/dashboard" class="flex items-center px-4 py-2 hover:bg-gray-700">
                        <img src="/svg/home.svg" alt="Home Icon" class="h-6 w-6 mr-4">
                        <span>Home</span>
                    </a>
                    <a href="/data-siswa" class="flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700">
                        <img src="/images/data.png" alt="Riwayat Absensi Icon" class="h-6 w-6 mr-4">
                        <span>Data Anak Magang</span>
                    </a>
                    <a href="/riwayat-presensi" class="flex items-center px-4 py-2 hover:bg-gray-700">
                        <img src="/images/riwayat.png" alt="Riwayat Absensi Icon" class="h-6 w-6 mr-4">
                        <span>Riwayat Presensi</span>
                    </a>
                    <a href="/konfirmasi-pengajuan" class="flex items-center px-4 py-2 hover:bg-gray-700">
                        <img src="/svg/data_pengajuan.svg" alt="Konfirmasi Izin Icon" class="h-6 w-6 mr-4">
                        <span>Konfirmasi Pengajuan Izin</span>
                    </a>
                </div>
            </div>
            <div class="p-4 flex items-center cursor-pointer" id="btnLogout">
                <a class="flex items-center">
                    <img src="/images/logout.png" alt="Logout Icon" class="h-6 w-6 mr-4">
                    <span>Logout</span>
                </a>
            </div>
        </div>

        <div id="mainContent" class="flex flex-col transition-transform duration-300 w-full pl-0">
            <header class="bg-white border-b-2 border-[#396E66] p-4 flex items-center z-50 relative">
                <button id="sidebarToggle" class="mr-4 text-[#396E66] focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <h1 class="text-lg font-semibold">Presensi Magang Sekretariat DPRD Kab. Banjar</h1>
            </header>
            <main id="content" class="p-6 flex flex-col items-center mx-auto">
                <div
                    class="bg-[#EAEAEA] p-4 mb-6 rounded-md border-t-4 border-[#396E66] shadow-md text-center w-full max-w-md">
                    <h2 class="text-lg font-bold text-black">Konfirmasi pengajuan Izin</h2>
                </div>
                <div class="w-full mx-auto">
                    <table id="dataTable" class="display w-full">
                        <thead class="bg-[#EAEAEA]">
                            <tr>
                                <th class="border border-gray-300 px-6 py-4">No</th>
                                <th class="border border-gray-300 px-6 py-4">Nomor Induk</th>
                                <th class="border border-gray-300 px-6 py-4">Nama</th>
                                <th class="border border-gray-300 px-6 py-4">Waktu Absensi</th>
                                <th class="border border-gray-300 px-6 py-4">Jenis Absensi</th>
                                <th class="border border-gray-300 px-6 py-4">Keterangan</th>
                                <th class="border border-gray-300 px-6 py-4">Tanggal Mulai</th>
                                <th class="border border-gray-300 px-6 py-4">Tanggal Akhir</th>
                                <th class="border border-gray-300 px-6 py-4">Status</th>
                                <th class="border border-gray-300 px-6 py-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($absensi as $data)
                                <tr>
                                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4">{{ $data->user->nomor_induk }}</td>
                                    <td class="px-6 py-4">{{ $data->user->nama }}</td>
                                    <td class="px-6 py-4">{{ $data->waktu_absensi }}</td>
                                    <td class="px-6 py-4">{{ $data->jenis_absensi }}</td>
                                    <td class="px-6 py-4">{{ $data->keterangan }}</td>
                                    <td class="px-6 py-4">{{ $data->tanggal_mulai }}</td>
                                    <td class="px-6 py-4">{{ $data->tanggal_akhir }}</td>
                                    <td class="px-6 py-4">{{ $data->status }}</td>
                                    <td class="px-6 py-4 flex items-center justify-start space-x-2">
                                        <form action="{{ route('absensi.updatestatus', $data->id) }}" method="POST">
                                            @csrf
                                            <input type="text" hidden value="approved" name="status">
                                            <button type="button" data-approve
                                                class="flex items-center hover:opacity-75">
                                                <img src="/svg/Done.svg" alt="Approve Icon" class="h-6 w-6">
                                            </button>
                                        </form>
                                        <form
                                        action="{{ route('absensi.updatestatus', ['id' => $data->id, 'status' => 'rejected']) }}"
                                        method="POST">
                                        @csrf
                                            <button type="button" data-reject
                                                class="flex items-center hover:opacity-75">
                                                <img src="/svg/Denied.svg" alt="Reject Icon" class="h-6 w-6">
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
            <div id="popupRejected"
                class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white rounded-md py-6 px-8 relative">
                    <p class="text-center text-lg font-semibold mb-6 mt-4">Anda yakin ingin menolak data ini?</p>
                    <div class="flex justify-around space-x-4">
                        <button id="btnBatalReject"
                            class="bg-[#ECB131] text-white font-bold px-24 py-2 rounded-md">Batal</button>
                        <button id="btnYakinReject"
                            class="bg-[#396E66] text-white font-bold px-24 py-2 rounded-md">Yakin</button>
                    </div>
                </div>
            </div>
            <div id="popupRejectedConfirm"
                class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-start justify-center z-50 pt-16">
                <div class="bg-white rounded-md p-4 relative animate-slide-down w-80">
                    <div class="flex items-center">
                        <p class="text-lg font-semibold ml-4 mr-2">Data berhasil ditolak!</p>
                        <img src="/svg/Success.svg" alt="Reject Berhasil" class="h-8 w-8">
                    </div>
                </div>
            </div>
            <div id="popupApproved"
                class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white rounded-md py-6 px-8 relative">
                    <p class="text-center text-lg font-semibold mb-6 mt-4">Anda yakin ingin menyetujui data ini?</p>
                    <div class="flex justify-around space-x-4">
                        <button id="btnBatalApprove"
                            class="bg-[#ECB131] text-white font-bold px-24 py-2 rounded-md">Batal</button>
                        <button id="btnYakinApprove"
                            class="bg-[#396E66] text-white font-bold px-24 py-2 rounded-md">Yakin</button>
                    </div>
                </div>
            </div>
            <div id="popupApprovedConfirm"
                class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-start justify-center z-50 pt-16">
                <div class="bg-white rounded-md p-4 relative animate-slide-down w-80">
                    <div class="flex items-center">
                        <p class="text-lg font-semibold ml-4 mr-2">Data berhasil disetujui!</p>
                        <img src="/svg/Success.svg" alt="Approve Berhasil" class="h-8 w-8">
                    </div>
                </div>
            </div>

            <div id="logoutModal"
                class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white p-6 rounded-md shadow-md w-80">
                    <h2 class="text-lg font-semibold mb-4">Confirm Logout</h2>
                    <p class="mb-4">Are you sure you want to logout?</p>
                    <div class="flex justify-end">
                        <button id="cancelLogout" class="mr-2 px-4 py-2 bg-gray-200 rounded">Cancel</button>
                        <a href="/logout" class="px-4 py-2 bg-red-500 text-white rounded">Logout</a>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Sidebar Toggle
                const sidebarToggle = document.getElementById("sidebarToggle");
                const sidebar = document.getElementById("sidebar");
                const mainContent = document.getElementById("mainContent");

                sidebarToggle.addEventListener("click", () => {
                    sidebar.classList.toggle("-translate-x-full");
                    sidebar.classList.toggle("translate-x-0");
                    mainContent.style.paddingLeft = sidebar.classList.contains("-translate-x-full") ? "0" : "16rem";
                });

                // Logout Modal
                const btnLogout = document.getElementById("btnLogout");
                const logoutModal = document.getElementById("logoutModal");
                const cancelLogout = document.getElementById("cancelLogout");

                btnLogout.addEventListener("click", () => {
                    logoutModal.classList.remove("hidden");
                });

                cancelLogout.addEventListener("click", () => {
                    logoutModal.classList.add("hidden");
                });

                // DataTables Initialization
                if ($("#dataTable").length) {
                    $("#dataTable").DataTable({
                        responsive: true,
                        autoWidth: false,
                        scrollX: true
                    });
                }

                // Approval & Rejection Popups
                const popupApproved = document.getElementById("popupApproved");
    const popupRejected = document.getElementById("popupRejected");
    const popupApprovedConfirm = document.getElementById("popupApprovedConfirm");
    const popupRejectedConfirm = document.getElementById("popupRejectedConfirm");

    let approveForm, rejectForm;

    document.addEventListener("click", function (event) {
        if (event.target.closest("button[data-approve]")) {
            popupApproved.classList.remove("hidden");
            approveForm = event.target.closest("form");
        } else if (event.target.closest("button[data-reject]")) {
            popupRejected.classList.remove("hidden");
            rejectForm = event.target.closest("form");
        }
    });

    document.getElementById("btnYakinApprove").addEventListener("click", function () {
        if (approveForm) {
            submitForm(approveForm, popupApproved, popupApprovedConfirm);
        }
    });

    document.getElementById("btnYakinReject").addEventListener("click", function () {
        if (rejectForm) {
            submitForm(rejectForm, popupRejected, popupRejectedConfirm);
        }
    });

    document.getElementById("btnBatalApprove").addEventListener("click", function () {
        popupApproved.classList.add("hidden");
    });

    document.getElementById("btnBatalReject").addEventListener("click", function () {
        popupRejected.classList.add("hidden");
    });

    function submitForm(form, confirmPopup, successPopup) {
        const formData = new FormData(form);
        fetch(form.action, {
            method: form.method,
            body: formData,
            headers: {
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": document.querySelector("input[name='_token']").value,
            },
        })
        .then(response => {
            if (response.ok) {
                confirmPopup.classList.add("hidden");
                successPopup.classList.remove("hidden");

                setTimeout(() => {
                    successPopup.classList.add("hidden");
                    location.reload();
                }, 2000);
            } else {
                console.error("Gagal memperbarui data");
            }
        })
        .catch(error => console.error("Terjadi kesalahan:", error));
    }
});
        </script>
</body>

</html>
