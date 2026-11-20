

<!-- Modal Create Student (Flowbite) -->
<div id="createStudentModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full justify-center items-center bg-gray-900/50 dark:bg-gray-900/80 backdrop-blur-xs" onclick="if(event.target === this) closeModal('createStudentModal')">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                    <svg class="w-5 h-5 mr-2 text-blue-600 dark:text-blue-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                    </svg>
                    Tambah Siswa Baru
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="createStudentModal" data-modal-hide="createStudentModal" onclick="closeModal('createStudentModal')">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Tutup modal</span>
                </button>
            </div>

            <!-- Modal body: FORM SUBMIT -->
            <form action="{{ route('student.store') }}" method="POST" class="p-4 md:p-5">
                {{-- Token Keamanan CSRF --}}
                @csrf

                <div class="grid gap-4 mb-4 grid-cols-1">
                    {{-- Input NIS --}}
                    <div>
                        <label for="create_nis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIS</label>
                        <input type="text" name="nis" id="create_nis" value="{{ old('nis') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan NIS siswa" required>
                        @if(isset($errors) && $errors->has('nis'))
                            <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $errors->first('nis') }}</p>
                        @endif
                    </div>

                    {{-- Input Nama Siswa --}}
                    <div>
                        <label for="create_nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <input type="text" name="nama" id="create_nama" value="{{ old('nama') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan nama lengkap siswa" required>
                        @if(isset($errors) && $errors->has('nama'))
                            <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $errors->first('nama') }}</p>
                        @endif
                    </div>

                    {{-- Dropdown Pilihan Kelas (Relasi Foreign Key classroom_id) --}}
                    <div>
                        <label for="create_classroom_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                        <select name="classroom_id" id="create_classroom_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <option value="" disabled selected>-- Pilih Kelas --</option>
                            @foreach ($classrooms as $classroom)
                                <option value="{{ $classroom->id }}" {{ old('classroom_id') == $classroom->id ? 'selected' : '' }}>
                                    {{ $classroom->name }} ({{ $classroom->major }})
                                </option>
                            @endforeach
                        </select>
                        @if(isset($errors) && $errors->has('classroom_id'))
                            <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $errors->first('classroom_id') }}</p>
                        @endif
                    </div>

                    {{-- Input Alamat Siswa --}}
                    <div>
                        <label for="create_address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                        <textarea name="address" id="create_address" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan alamat lengkap siswa" required>{{ old('address') }}</textarea>
                        @if(isset($errors) && $errors->has('address'))
                            <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $errors->first('address') }}</p>
                        @endif
                    </div>
                </div>

                {{-- Tombol Aksi (Batal & Simpan) --}}
                <div class="flex items-center justify-end space-x-2 pt-2 border-t border-gray-200 dark:border-gray-600">
                    <button type="button" data-modal-toggle="createStudentModal" data-modal-hide="createStudentModal" onclick="closeModal('createStudentModal')" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        Batal
                    </button>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                        Simpan Siswa
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
