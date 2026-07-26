<?php
return [
    'settings_title' => 'Pengaturan VerseLinker',
    'language_label' => 'Pilih bahasa:',
    'version_label' => 'Pilih versi:',
    'version_description' => 'Jika Anda memilih versi yang hanya mencakup Perjanjian Lama atau Perjanjian Baru, referensi apa pun ke kitab yang tidak termasuk dalam versi yang dipilih akan diproses menggunakan versi default. 
    Misalnya, jika Anda memilih versi yang hanya mencakup Perjanjian Baru dan merujuk pada Kejadian 1:1 (dari Perjanjian Lama), sistem akan secara otomatis menggunakan versi default untuk mengambil teks. 
    Ini memastikan bahwa semua referensi ditautkan dengan tepat, bahkan ketika versi yang dipilih tidak mencakup kitab yang dirujuk.',
    'plugin_description' => 'Opsi pengaturan plugin VerseLinker menyediakan cara mudah untuk menyesuaikan bagaimana referensi Alkitab di situs web Anda secara otomatis diubah menjadi tautan interaktif. 
    Plugin ini mendeteksi kutipan Alkitab yang Anda posting (misalnya, Yohanes 3:16) dan mengubahnya menjadi tautan yang mengarah ke bagian yang sesuai di Bibliatodo.com. 
    Saat kursor diarahkan ke tautan, pop-up dengan teks ayat akan muncul, memungkinkan pengguna membaca Kitab Suci tanpa meninggalkan halaman Anda. 
    Jika pengguna mengklik tautan tersebut, mereka akan diarahkan ke bagian lengkap di Bibliatodo.com. 
    Dengan fitur ini, VerseLinker meningkatkan pengalaman penjelajahan dengan memudahkan akses langsung ke teks Alkitab, membantu pembaca Anda menjelajahi Firman Tuhan tanpa gangguan.',
    'save_changes' => 'Simpan perubahan',
    'error_loading_languages' => 'Kesalahan saat memuat daftar bahasa. Pastikan file <code>/json/idiomas.json</code> ada dan valid.',
    'complete_bible' => 'Alkitab Lengkap (TB)',
    'old_testament' => 'Hanya Perjanjian Lama (PL)',
    'new_testament' => 'Hanya Perjanjian Baru (PB)',
    'examples_title' => 'Coba Fungsi Plugin',
    'examples_description' => 'Arahkan kursor ke referensi Alkitab yang disorot di bawah ini untuk melihat cara kerja plugin.',
    'data_trueTooltip' => 'Aktifkan tooltip dalam referensi Alkitab.',
    'data_trueTooltip_description' => 'Di sini Anda dapat mengaktifkan tooltip yang muncul dalam referensi Alkitab. Meskipun tooltip menawarkan cara yang nyaman untuk melihat ayat tanpa meninggalkan halaman, jika dinonaktifkan, pratinjau ini tidak akan tersedia. Meskipun ini membuat antarmuka lebih bersih, itu juga akan mencegah pemuatan otomatis informasi ayat, yang berarti referensi Alkitab hanya akan diminta saat pengguna mengklik tautan. Pertimbangkan apakah Anda benar-benar perlu menonaktifkan fitur berguna ini. Hapus centang pada kotak di bawah ini hanya jika Anda yakin.',
    'data_trueCredit' => 'Tampilkan pesan "Powered by Bibliatodo.com".',
    'data_trueCredit_description' => 'Di sini Anda dapat mengaktifkan pesan "Powered by Bibliatodo.com", yang muncul di bagian bawah tooltip. Pesan ini membantu lebih banyak orang mengetahui alat berkat ini. Meskipun menonaktifkannya membuat antarmuka lebih bersih, membiarkannya tetap terlihat mendukung proyek dan memungkinkan lebih banyak pengguna mendapatkan manfaat dari sumber ini. Kami mendorong Anda untuk tetap mengaktifkannya untuk membantu menyebarkan alat ini. Biarkan kotak tidak dicentang hanya jika Anda yakin ingin menyembunyikannya.',
    'tb' => 'Alkitab Lengkap',
    'solo_at' => 'Hanya Perjanjian Lama',
    'solo_nt' => 'Hanya Perjanjian Baru',
    'example_references' => 'Cari berdasarkan ayat: Yohanes 3:16
        Cari berdasarkan bab: Mazmur 91
        Bab berturut-turut: Mazmur 91-93
        Bab yang berbeda: Mazmur 91,94
        Ayat di bawah ini: Pengkhotbah 11:1-7
        Ayat berdasarkan kelompok: Pengkhotbah 11:1-3,10,5
        Banyak buku dan kombinasi: Yohanes 1:1-4;Matius 2:2,6-7',
    'data_trueLinks' => 'Ganti URL referensi Alkitab yang sudah ada',
    'data_trueLinks_description' => 'Aktifkan opsi ini untuk secara otomatis mengganti URL referensi Alkitab yang sudah ada dengan format VerseLinker. Dengan melakukan ini, semua referensi di situs Anda akan mendapatkan manfaat dari fitur tooltip dan fungsi lainnya. Jika Anda menonaktifkan kotak centang ini, VerseLinker tidak akan mengonversi URL yang sudah ada, memungkinkan Anda mempertahankan tautan asli atau menggunakan sistem referensi yang berbeda. Hanya nonaktifkan kotak ini jika Anda benar-benar ingin mempertahankan URL Anda saat ini.',
];