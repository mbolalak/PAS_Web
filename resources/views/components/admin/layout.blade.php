{{-- 
=============================================================================
REUSABLE BLADE COMPONENT: Layout Admin Utama (<x-admin.layout>)
=============================================================================
FUNGSI:
Ini adalah template induk (Master Layout). Semua halaman menu (Student, Classroom, 
Subject, Teacher, Dashboard) cukup memanggil komponen ini: <x-admin.layout>.

ALUR KERJA:
1. Memuat seluruh tag standar HTML (<head>, <body>).
2. Memuat styling CSS Tailwind v4 dan Flowbite.
3. Memanggil komponen Navbar atas: <x-admin.navbar/>
4. Memanggil komponen Sidebar navigasi samping: <x-admin.sidebar/>
5. Menyediakan variabel {{ $slot }} sebagai tempat meletakkan isi/konten dinamis
   dari masing-masing halaman menu.
=============================================================================
--}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'PAS Web - 11 PPLG 2026' }}</title>

  <!-- Flowbite CDN (Cadangan untuk fleksibilitas online) -->
  <link href="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>

  <!-- Vite Asset Bundler (Tailwind v4 & Flowbite JS Lokal) -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-gray-50 dark:bg-gray-900">
  <div class="min-h-screen">
    <!-- Navbar Atas -->
    <x-admin.navbar/>

    <!-- Sidebar Menu Navigasi Samping -->
    <x-admin.sidebar/>

    <!-- Konten Utama Halaman -->
    <main class="p-4 md:ml-64 h-auto pt-20">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        {{ $slot }}
      </div>
    </main>
  </div>
</body>
</html>
