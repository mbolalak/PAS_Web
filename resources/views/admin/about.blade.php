<x-admin.layout>
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
            {{ $title }}
        </h1>

        <div class="p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <p class="text-gray-700 dark:text-gray-300 text-lg mb-2">
                <strong>Nama:</strong> {{ $nama }}
            </p>
            <p class="text-gray-700 dark:text-gray-300 text-lg mb-2">
                <strong>Kelas:</strong> {{ $class }}
            </p>
            <p class="text-gray-700 dark:text-gray-300 text-lg">
                <strong>Repository:</strong>
                <a href="{{ $guthib }}" target="_blank" class="text-blue-600 hover:underline dark:text-blue-500">
                    Guthib
                </a>
            </p>
        </div>
    </div>
</x-admin.layout>
