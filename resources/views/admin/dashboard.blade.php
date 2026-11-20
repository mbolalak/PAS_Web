<x-admin.layout>
    <div class="mb-6">
        <h1 class="text-3xl font-extrabold text-gray-900 dark:text-white">
            Dashboard Utama
        </h1>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
            Selamat datang di Sistem Informasi Manajemen Sekolah - PAS Pemrograman Web 11 PPLG 2026.
        </p>
    </div>

    <!-- Statistik Ringkasan Menu -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <!-- Card 1: Students -->
        <a href="{{ route('student.index') }}" class="block p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Siswa</p>
                    <h2 class="text-3xl font-bold text-blue-600 dark:text-blue-400 mt-1">{{ $studentCount ?? 0 }}</h2>
                </div>
                <div class="p-3 bg-blue-100 rounded-full dark:bg-blue-900">
                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-300" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
            <p class="text-xs text-blue-600 dark:text-blue-400 mt-3 font-medium">Buka Menu Siswa &rarr;</p>
        </a>

        <!-- Card 2: Classroom -->
        <a href="{{ route('classroom.index') }}" class="block p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Kelas</p>
                    <h2 class="text-3xl font-bold text-green-600 dark:text-green-400 mt-1">{{ $classroomCount ?? 0 }}</h2>
                </div>
                <div class="p-3 bg-green-100 rounded-full dark:bg-green-900">
                    <svg class="w-6 h-6 text-green-600 dark:text-green-300" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3.005 3.005 0 013.75-2.906z"></path>
                    </svg>
                </div>
            </div>
            <p class="text-xs text-green-600 dark:text-green-400 mt-3 font-medium">Buka Menu Kelas &rarr;</p>
        </a>

        <!-- Card 3: Subjects -->
        <a href="{{ route('subject.index') }}" class="block p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Mapel</p>
                    <h2 class="text-3xl font-bold text-purple-600 dark:text-purple-400 mt-1">{{ $subjectCount ?? 0 }}</h2>
                </div>
                <div class="p-3 bg-purple-100 rounded-full dark:bg-purple-900">
                    <svg class="w-6 h-6 text-purple-600 dark:text-purple-300" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
            <p class="text-xs text-purple-600 dark:text-purple-400 mt-3 font-medium">Buka Menu Mapel &rarr;</p>
        </a>

        <!-- Card 4: Teachers -->
        <a href="{{ route('teacher.index') }}" class="block p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-50 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 transition">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Guru</p>
                    <h2 class="text-3xl font-bold text-amber-600 dark:text-amber-400 mt-1">{{ $teacherCount ?? 0 }}</h2>
                </div>
                <div class="p-3 bg-amber-100 rounded-full dark:bg-amber-900">
                    <svg class="w-6 h-6 text-amber-600 dark:text-amber-300" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3.005 3.005 0 013.75-2.906z"></path>
                    </svg>
                </div>
            </div>
            <p class="text-xs text-amber-600 dark:text-amber-400 mt-3 font-medium">Buka Menu Guru &rarr;</p>
        </a>
    </div>

    <!-- Kotak Info Ketentuan PAS -->
    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">Status Implementasi Modul PAS</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
            <div class="flex items-center space-x-2 text-green-600 dark:text-green-400">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                <span>Reuse Component Layout Blade (<code class="font-mono text-xs bg-gray-100 dark:bg-gray-700 px-1 py-0.5 rounded">&lt;x-admin.layout&gt;</code>)</span>
            </div>
            <div class="flex items-center space-x-2 text-green-600 dark:text-green-400">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                <span>4 Menu Lengkap: Student, Classroom, Teacher, Subject</span>
            </div>
            <div class="flex items-center space-x-2 text-green-600 dark:text-green-400">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                <span>Eloquent Relationships (One-to-Many & One-to-One)</span>
            </div>
            <div class="flex items-center space-x-2 text-green-600 dark:text-green-400">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                <span>Fitur Tambah Data (Create) dengan Modal Flowbite</span>
            </div>
        </div>
    </div>
</x-admin.layout>
