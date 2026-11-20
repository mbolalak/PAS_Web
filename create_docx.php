<?php

class DocxGenerator
{
    private array $paragraphs = [];

    public function addTitle(string $text)
    {
        $this->paragraphs[] = [
            'type' => 'title',
            'text' => $text
        ];
    }

    public function addHeading1(string $text)
    {
        $this->paragraphs[] = [
            'type' => 'h1',
            'text' => $text
        ];
    }

    public function addHeading2(string $text)
    {
        $this->paragraphs[] = [
            'type' => 'h2',
            'text' => $text
        ];
    }

    public function addHeading3(string $text)
    {
        $this->paragraphs[] = [
            'type' => 'h3',
            'text' => $text
        ];
    }

    public function addParagraph(string $text)
    {
        $this->paragraphs[] = [
            'type' => 'p',
            'text' => $text
        ];
    }

    public function addBullet(string $text)
    {
        $this->paragraphs[] = [
            'type' => 'bullet',
            'text' => $text
        ];
    }

    public function addCodeBlock(string $code)
    {
        $this->paragraphs[] = [
            'type' => 'code',
            'text' => $code
        ];
    }

    public function addCallout(string $title, string $text)
    {
        $this->paragraphs[] = [
            'type' => 'callout',
            'title' => $title,
            'text' => $text
        ];
    }

    private function escape(string $text): string
    {
        return htmlspecialchars($text, ENT_XML1, 'UTF-8');
    }

    public function build(string $outputPath): bool
    {
        $xmlContent = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' . "\n";
        $xmlContent .= '<w:document xmlns:w="http://schemas.openxmlformats.org/wordprocessingml/2006/main">' . "\n";
        $xmlContent .= '<w:body>' . "\n";

        foreach ($this->paragraphs as $item) {
            $t = $this->escape($item['text']);
            switch ($item['type']) {
                case 'title':
                    $xmlContent .= '<w:p><w:pPr><w:jc w:val="center"/><w:spacing w:before="240" w:after="240"/></w:pPr><w:r><w:rPr><w:b/><w:sz w:val="48"/><w:color w:val="1E40AF"/><w:rFonts w:ascii="Segoe UI" w:hAnsi="Segoe UI"/></w:rPr><w:t>' . $t . '</w:t></w:r></w:p>' . "\n";
                    break;
                case 'h1':
                    $xmlContent .= '<w:p><w:pPr><w:spacing w:before="360" w:after="120"/><w:pBdr><w:bottom w:val="single" w:sz="12" w:space="4" w:color="2563EB"/></w:pBdr></w:pPr><w:r><w:rPr><w:b/><w:sz w:val="32"/><w:color w:val="1E3A8A"/><w:rFonts w:ascii="Segoe UI" w:hAnsi="Segoe UI"/></w:rPr><w:t>' . $t . '</w:t></w:r></w:p>' . "\n";
                    break;
                case 'h2':
                    $xmlContent .= '<w:p><w:pPr><w:spacing w:before="240" w:after="80"/></w:pPr><w:r><w:rPr><w:b/><w:sz w:val="26"/><w:color w:val="2563EB"/><w:rFonts w:ascii="Segoe UI" w:hAnsi="Segoe UI"/></w:rPr><w:t>' . $t . '</w:t></w:r></w:p>' . "\n";
                    break;
                case 'h3':
                    $xmlContent .= '<w:p><w:pPr><w:spacing w:before="180" w:after="60"/></w:pPr><w:r><w:rPr><w:b/><w:sz w:val="22"/><w:color w:val="1F2937"/><w:rFonts w:ascii="Segoe UI" w:hAnsi="Segoe UI"/></w:rPr><w:t>' . $t . '</w:t></w:r></w:p>' . "\n";
                    break;
                case 'p':
                    $xmlContent .= '<w:p><w:pPr><w:spacing w:after="120"/><w:jc w:val="both"/></w:pPr><w:r><w:rPr><w:sz w:val="21"/><w:rFonts w:ascii="Segoe UI" w:hAnsi="Segoe UI"/><w:color w:val="374151"/></w:rPr><w:t xml:space="preserve">' . $t . '</w:t></w:r></w:p>' . "\n";
                    break;
                case 'bullet':
                    $xmlContent .= '<w:p><w:pPr><w:ind w:left="360"/><w:spacing w:after="60"/></w:pPr><w:r><w:rPr><w:b/><w:color w:val="2563EB"/><w:sz w:val="21"/></w:rPr><w:t xml:space="preserve">▪  </w:t></w:r><w:r><w:rPr><w:sz w:val="21"/><w:rFonts w:ascii="Segoe UI" w:hAnsi="Segoe UI"/><w:color w:val="1F2937"/></w:rPr><w:t xml:space="preserve">' . $t . '</w:t></w:r></w:p>' . "\n";
                    break;
                case 'code':
                    $lines = explode("\n", $item['text']);
                    foreach ($lines as $line) {
                        $lineEsc = $this->escape($line);
                        $xmlContent .= '<w:p><w:pPr><w:spacing w:before="20" w:after="20"/><w:ind w:left="400" w:right="400"/><w:shd w:val="clear" w:color="auto" w:fill="F3F4F6"/></w:pPr><w:r><w:rPr><w:rFonts w:ascii="Consolas" w:hAnsi="Consolas"/><w:sz w:val="18"/><w:color w:val="111827"/></w:rPr><w:t xml:space="preserve">' . $lineEsc . '</w:t></w:r></w:p>' . "\n";
                    }
                    $xmlContent .= '<w:p><w:pPr><w:spacing w:after="100"/></w:pPr></w:p>' . "\n";
                    break;
                case 'callout':
                    $xmlContent .= '<w:p><w:pPr><w:spacing w:before="120" w:after="40"/><w:ind w:left="360" w:right="360"/><w:pBdr><w:left w:val="single" w:sz="24" w:space="8" w:color="2563EB"/></w:pBdr><w:shd w:val="clear" w:color="auto" w:fill="EFF6FF"/></w:pPr><w:r><w:rPr><w:b/><w:sz w:val="21"/><w:color w:val="1E40AF"/><w:rFonts w:ascii="Segoe UI" w:hAnsi="Segoe UI"/></w:rPr><w:t xml:space="preserve">💡 ' . $this->escape($item['title']) . '</w:t></w:r></w:p>' . "\n";
                    $xmlContent .= '<w:p><w:pPr><w:spacing w:after="120"/><w:ind w:left="360" w:right="360"/><w:pBdr><w:left w:val="single" w:sz="24" w:space="8" w:color="2563EB"/></w:pBdr><w:shd w:val="clear" w:color="auto" w:fill="EFF6FF"/></w:pPr><w:r><w:rPr><w:sz w:val="20"/><w:color w:val="1E3A8A"/><w:rFonts w:ascii="Segoe UI" w:hAnsi="Segoe UI"/></w:rPr><w:t xml:space="preserve">' . $this->escape($item['text']) . '</w:t></w:r></w:p>' . "\n";
                    break;
            }
        }

        $xmlContent .= '<w:sectPr><w:pgSz w:w="11906" w:h="16838"/><w:pgMar w:top="1440" w:right="1440" w:bottom="1440" w:left="1440"/></w:sectPr>' . "\n";
        $xmlContent .= '</w:body>' . "\n";
        $xmlContent .= '</w:document>' . "\n";

        $contentTypes = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<Types xmlns="http://schemas.openxmlformats.org/package/2006/content-types">
    <Default Extension="rels" ContentType="application/vnd.openxmlformats-package.relationships+xml"/>
    <Default Extension="xml" ContentType="application/xml"/>
    <Override PartName="/word/document.xml" ContentType="application/vnd.openxmlformats-officedocument.wordprocessingml.document.main+xml"/>
</Types>';

        $rels = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships">
    <Relationship Id="rId1" Type="http://schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument" Target="word/document.xml"/>
</Relationships>';

        $zip = new ZipArchive();
        if ($zip->open($outputPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
            return false;
        }

        $zip->addFromString('[Content_Types].xml', $contentTypes);
        $zip->addFromString('_rels/.rels', $rels);
        $zip->addFromString('word/document.xml', $xmlContent);
        $zip->close();

        return true;
    }
}

// Generate the docx
$doc = new DocxGenerator();
$doc->addTitle('PANDUAN LENGKAP & MATERI PRESENTASI');
$doc->addParagraph('Penilaian Akhir Semester (PAS) - Pemrograman Web 11 PPLG 2026');
$doc->addParagraph('Disusun untuk memahami arsitektur Laravel, alur data MVC, relasi database Eloquent, dan persiapan tanya jawab.');

$doc->addHeading1('BAB 1: KETENTUAN DAN STRUKTUR PROYEK PAS');
$doc->addParagraph('Dokumen ketentuan PAS Pemrograman Web 11 PPLG 2026 menetapkan 4 menu yang wajib dibuat:');
$doc->addBullet('Menu Student (Siswa): Mengelola data siswa yang terhubung ke kelas.');
$doc->addBullet('Menu Classroom (Kelas): Mengelola data kelas dan jurusan.');
$doc->addBullet('Menu Teacher (Guru): Mengelola data pendidik yang mengampu mata pelajaran.');
$doc->addBullet('Menu Subject (Mata Pelajaran): Mengelola daftar mata pelajaran.');
$doc->addParagraph('Syarat teknis wajib setiap menu:');
$doc->addBullet('Reuse Components: Setiap menu menggunakan satu template layout utama (<x-admin.layout>) sehingga tidak ada duplikasi kode navbar dan sidebar.');
$doc->addBullet('Routing: Terdaftar di routes/web.php untuk menampilkan data dan menyimpan data.');
$doc->addBullet('Controller: Memisahkan logika aplikasi (Resource Controller).');
$doc->addBullet('Model & Eloquent: Mewakili tabel database dan memuat relasi antar tabel.');
$doc->addBullet('View: Menampilkan antarmuka index (tabel data) dan create (form tambah data via Modal Flowbite).');
$doc->addBullet('Factory & Seeder: Pengisian data dummy otomatis untuk pengujian.');
$doc->addBullet('Fitur Tambah Data (Create): Input data baru langsung tersimpan ke database.');

$doc->addCallout('Bobot Penilaian PAS', 'Tanya Jawab: 50% | Presentasi: 40% | Desain & Layouting: 10%. Pemahaman alur kode jauh lebih penting daripada hanya sekedar tampilan!');

$doc->addHeading1('BAB 2: MEMAHAMI ALUR KERJA LARAVEL (MVC & REQUEST LIFECYCLE)');
$doc->addParagraph('Saat mempresentasikan di depan penguji, jelaskan siklus alur data ini:');
$doc->addBullet('1. BROWSER (User): Mengakses URL misal "http://localhost:8000/admin/students"');
$doc->addBullet('2. ROUTE (routes/web.php): Menerima URL dan mengarahkannya ke StudentController method index.');
$doc->addBullet('3. CONTROLLER (StudentController): Berkomunikasi dengan Model Student untuk mengambil data.');
$doc->addBullet('4. MODEL (Student & Classroom): Menjalankan query ke database dengan relasi eager loading Student::with("classroom")->get().');
$doc->addBullet('5. DATABASE: Mengembalikan record siswa beserta informasi kelasnya.');
$doc->addBullet('6. CONTROLLER: Mengirimkan data ke Blade View resources/views/admin/student/index.blade.php.');
$doc->addBullet('7. VIEW (Blade + Flowbite): Merender tabel data di dalam komponen <x-admin.layout> lalu dikirim kembali ke browser user.');

$doc->addHeading1('BAB 3: TUTORIAL DETAIL - STUDI KASUS PEMBUATAN MENU "STUDENT"');
$doc->addParagraph('Berikut adalah tahapan teknis pembuatan menu Student dari nol yang dapat Anda ceritakan saat presentasi:');

$doc->addHeading2('Langkah 1: Membuat Skema Tabel Database (Migration)');
$doc->addParagraph('Tabel students membutuhkan kolom nama, nis, alamat, dan foreign key classroom_id yang merujuk ke tabel classrooms. id. Karena tabel students bergantung pada classrooms, maka migration classrooms harus dibuat lebih dulu.');
$doc->addCodeBlock(
'Schema::create(\'students\', function (Blueprint $table) {
    $table->id();
    $table->string(\'nama\');
    $table->string(\'nis\');
    $table->foreignId(\'classroom_id\')->constrained(\'classrooms\', \'id\');
    $table->string(\'address\');
    $table->timestamps();
});'
);

$doc->addHeading2('Langkah 2: Menyiapkan Model dan Relasi Eloquent (Relationship)');
$doc->addParagraph('Di file app/Models/Student.php, tentukan kolom mana yang boleh diisi ($fillable) dan buat fungsi relasi belongsTo ke model Classroom:');
$doc->addCodeBlock(
'class Student extends Model
{
    use HasFactory;

    protected $with = [\'classroom\']; // Eager loading otomatis
    protected $fillable = [\'nama\', \'nis\', \'classroom_id\', \'address\'];

    // Relasi: Setiap siswa memiliki 1 kelas
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}'
);
$doc->addParagraph('Sedangkan pada model lawannya (app/Models/Classroom.php), ditambahkan relasi hasMany:');
$doc->addCodeBlock(
'// Relasi: Satu kelas memiliki banyak siswa
public function students()
{
    return $this->hasMany(Student::class);
}'
);

$doc->addHeading2('Langkah 3: Factory dan Seeder Data Dummy');
$doc->addParagraph('Untuk mengisi database secara otomatis saat pengujian tanpa input manual satu-persatu:');
$doc->addCodeBlock(
'// database/factories/StudentFactory.php
return [
    \'nama\' => fake()->name(),
    \'nis\'  => fake()->randomNumber(5, true),
    \'classroom_id\' => Classroom::factory(),
    \'address\' => fake()->address(),
];

// database/seeders/DatabaseSeeder.php
Classroom::factory(10)->hasStudents(5)->create();'
);
$doc->addParagraph('Kode seeder di atas otomatis membuat 10 kelas, dan setiap kelas langsung memiliki 5 siswa yang terhubung secara valid.');

$doc->addHeading2('Langkah 4: Pendaftaran Jalur URL (routes/web.php)');
$doc->addCodeBlock(
'Route::get(\'/admin/students\', [StudentController::class, \'index\'])->name(\'student.index\');
Route::post(\'/admin/students\', [StudentController::class, \'store\'])->name(\'student.store\');
Route::put(\'/admin/students/{id}\', [StudentController::class, \'update\'])->name(\'student.update\');
Route::delete(\'/admin/students/{id}\', [StudentController::class, \'destroy\'])->name(\'student.destroy\');'
);

$doc->addHeading2('Langkah 5: Logika Controller (app/Http/Controllers/StudentController.php)');
$doc->addParagraph('Controller menangani 2 proses utama yang diwajibkan PAS:');
$doc->addBullet('1. index(): Mengambil seluruh data siswa beserta relasi kelasnya dan daftar kelas untuk opsi dropdown di modal.');
$doc->addBullet('2. store(): Memvalidasi input pengguna, memastikan NIS unik, dan menyimpan data baru.');
$doc->addCodeBlock(
'public function index()
{
    $students = Student::with(\'classroom\')->latest()->get();
    $classrooms = Classroom::all();

    return view(\'admin.student.index\', compact(\'students\', \'classrooms\'));
}

public function store(Request $request)
{
    $validated = $request->validate([
        \'nis\' => \'required|string|max:50|unique:students,nis\',
        \'nama\' => \'required|string|max:255\',
        \'classroom_id\' => \'required|exists:classrooms,id\',
        \'address\' => \'required|string|max:500\',
    ]);

    Student::create($validated);

    return redirect()->route(\'student.index\')->with(\'success\', \'Data siswa berhasil ditambahkan!\');
}'
);

$doc->addHeading2('Langkah 6: Antarmuka Blade & Flowbite Reusable Component');
$doc->addParagraph('Setiap view menggunakan <x-admin.layout>. Di dalamnya memanggil form create melalui modal Flowbite:');
$doc->addCodeBlock(
'<x-admin.layout>
    <!-- Header dan Tombol Tambah Siswa yang membuka Modal Flowbite -->
    <button data-modal-target="createStudentModal" data-modal-toggle="createStudentModal">
        Tambah Siswa
    </button>

    <!-- Tabel Data Siswa -->
    @foreach ($students as $student)
        <tr>
            <td>{{ $student->nis }}</td>
            <td>{{ $student->nama }}</td>
            <td>{{ $student->classroom->name ?? \'-\' }}</td>
            <td>{{ $student->address }}</td>
        </tr>
    @endforeach

    <!-- Modal Form Create -->
    @include(\'admin.student.create\')
</x-admin.layout>'
);

$doc->addHeading1('BAB 4: PENJELASAN RELASI UNTUK 3 MENU LAINNYA');
$doc->addParagraph('1. Classroom (Kelas):');
$doc->addBullet('Satu kelas dapat memiliki banyak siswa (One to Many). Didefinisikan dengan $this->hasMany(Student::class).');
$doc->addParagraph('2. Subject (Mata Pelajaran):');
$doc->addBullet('Mata pelajaran diajarkan oleh 1 guru (One to One). Didefinisikan dengan $this->hasOne(Teacher::class).');
$doc->addParagraph('3. Teacher (Guru):');
$doc->addBullet('Tabel guru memiliki kolom subject_id yang unik berelasi ke tabel subjects. Didefinisikan dengan $this->belongsTo(Subject::class).');

$doc->addHeading1('BAB 5: BOCORAN PERTANYAAN TANYA JAWAB (BOBOT 50%)');
$doc->addParagraph('Gunakan jawaban-jawaban ini untuk menjawab pertanyaan guru saat sesi tanya jawab:');

$doc->addHeading2('Pertanyaan 1: "Apa fungsi dari perintah with(\'classroom\') di StudentController?"');
$doc->addParagraph('Jawaban: Perintah with() digunakan untuk Eager Loading. Ini berguna untuk mengambil data siswa sekaligus data relasi kelasnya dalam 1 atau 2 query database saja. Jika tidak menggunakan with(), Laravel akan menjalankan query baru setiap kali baris tabel merender $student->classroom->name, yang menyebabkan masalah performa yang disebut N+1 Query Problem.');

$doc->addHeading2('Pertanyaan 2: "Apa perbedaan hasMany dan belongsTo?"');
$doc->addParagraph('Jawaban: hasMany digunakan pada tabel induk (seperti Classroom) yang memiliki banyak data anak (Students). Sedangkan belongsTo digunakan pada tabel anak (Student) yang menyimpan kolom foreign key (classroom_id) yang merujuk kembali ke tabel induk.');

$doc->addHeading2('Pertanyaan 3: "Bagaimana cara kerja Reuse Components <x-admin.layout>?"');
$doc->addParagraph('Jawaban: Itu adalah fitur Blade Component Laravel. Komponen layout (layout.blade.php) menyediakan kerangka dasar HTML seperti tag head, load CSS Tailwind/Flowbite, navbar atas, dan sidebar navigasi. Bagian konten utama diisi dengan variabel {{ $slot }}. Ketika file halaman memanggil <x-admin.layout>, semua kode di dalam tag tersebut akan otomatis disuntikkan ke {{ $slot }}.');

$doc->addHeading2('Pertanyaan 4: "Apa fungsi @csrf pada form tambah data?"');
$doc->addParagraph('Jawaban: @csrf menghasilkan token keamanan Cross-Site Request Forgery. Token ini memastikan bahwa request POST yang masuk ke server benar-benar dikirimkan dari aplikasi web kita, bukan serangan palsu dari situs lain.');

$doc->addHeading2('Pertanyaan 5: "Apa fungsi $fillable pada Model Eloquent?"');
$doc->addParagraph('Jawaban: $fillable adalah daftar kolom yang diizinkan untuk diisi secara massal (Mass Assignment) saat kita memanggil Student::create($validated). Ini mencegah hacker menyuntikkan kolom terlarang (seperti role/is_admin) ke database.');

$doc->addHeading2('Pertanyaan 6: "Bagaimana alur ketika data gagal validasi di form?"');
$doc->addParagraph('Jawaban: Method $request->validate() akan memeriksa input. Jika ada input yang kosong atau tidak valid (misal NIS sudah pernah ada di database), Laravel otomatis membatalkan eksekusi, mengalihkan kembali ke halaman sebelumnya (redirect back), mengembalikan data input lama dengan old(), dan mengirimkan pesan kesalahan ke dalam variabel session $errors.');

$doc->addCallout('Tips Sukses Presentasi', '1. Mulai dengan memperlihatkan menu Dashboard dan jelaskan 4 menu utama.\n2. Tunjukkan tabel dan klik tombol Tambah Data untuk memperlihatkan Modal Flowbite.\n3. Masukkan data baru dan tunjukkan pesan sukses.\n4. Buka Visual Studio Code dan tunjukkan file Controller, Model Relasi, dan Routes.');

$outputPath = 'D:\laragon\www\PASLaravel\PANDUAN_PRESENTASI_PAS_11_PPLG.docx';
if ($doc->build($outputPath)) {
    echo "FILE_DOCX_SUCCESS: " . $outputPath . "\n";
} else {
    echo "FILE_DOCX_FAILED\n";
}
