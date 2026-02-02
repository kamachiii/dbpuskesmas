# DB Puskesmas - Sistem Manajemen Puskesmas

Sistem informasi manajemen puskesmas berbasis web menggunakan PHP dan MySQL untuk mengelola data pasien, paramedik, dan pemeriksaan kesehatan.

## 📋 Deskripsi

Project ini merupakan aplikasi web sederhana untuk mengelola data puskesmas yang mencakup:
- Manajemen data pasien
- Manajemen data paramedik (Dokter Umum, Dokter Gigi, Dokter Ibu & Anak)
- Pencatatan data pemeriksaan
- Data kelurahan untuk alamat pasien

## 🚀 Fitur

- **Manajemen Pasien**: Tambah, edit, hapus, dan lihat data pasien
- **Manajemen Paramedik**: Mengelola data dokter dan tenaga medis
- **Data Pemeriksaan**: Mencatat hasil pemeriksaan pasien
- **Database Kelurahan**: Integrasi data alamat berdasarkan kelurahan

## 🛠️ Teknologi yang Digunakan

- **Backend**: PHP
- **Database**: MySQL/MariaDB
- **Frontend**: HTML, CSS
- **Server**: XAMPP/WAMP (untuk development)

## 📦 Struktur Project

```
dbpuskesmas/
├── index.php           # Halaman utama aplikasi
├── dbkoneksi.php       # Konfigurasi koneksi database
├── dbpuskesmas.sql     # File database SQL
├── pasien/             # Modul manajemen pasien
├── paramedik/          # Modul manajemen paramedik
└── periksa/            # Modul manajemen pemeriksaan
```

## 🔧 Instalasi

### Prerequisites
- PHP 7.4 atau lebih tinggi
- MySQL 5.7 atau MariaDB 10.4 atau lebih tinggi
- Web server (Apache/Nginx)
- XAMPP/WAMP (opsional untuk development lokal)

### Langkah Instalasi

1. **Clone repository**
   ```bash
   git clone https://github.com/kamachiii/dbpuskesmas.git
   cd dbpuskesmas
   ```

2. **Setup Database**
   - Buat database baru dengan nama `dbpuskesmas`
   - Import file `dbpuskesmas.sql` ke database:
     ```bash
     mysql -u root -p dbpuskesmas < dbpuskesmas.sql
     ```
   - Atau gunakan phpMyAdmin untuk import file SQL

3. **Konfigurasi Koneksi Database**
   - Buka file `dbkoneksi.php`
   - Sesuaikan konfigurasi database:
     ```php
     $host = "localhost";
     $user = "root";
     $password = "";
     $database = "dbpuskesmas";
     ```

4. **Jalankan Aplikasi**
   - Pindahkan folder project ke direktori web server (htdocs untuk XAMPP)
   - Akses melalui browser: `http://localhost/dbpuskesmas`

## 📊 Struktur Database

### Tabel Utama:

- **kelurahan**: Data kelurahan untuk alamat
- **paramedik**: Data dokter dan tenaga medis
  - Kategori: Dokter Umum, Dokter Gigi, Dokter Ibu & Anak
- **pasien**: Data pasien puskesmas
- **periksa**: Data pemeriksaan kesehatan (jika ada)

## 💻 Penggunaan

1. Akses aplikasi melalui browser
2. Kelola data pasien melalui menu Pasien
3. Kelola data paramedik melalui menu Paramedik
4. Catat pemeriksaan melalui menu Periksa

## 🤝 Kontribusi

Kontribusi selalu diterima! Silakan:
1. Fork repository ini
2. Buat branch fitur baru (`git checkout -b fitur-baru`)
3. Commit perubahan (`git commit -m 'Menambahkan fitur baru'`)
4. Push ke branch (`git push origin fitur-baru`)
5. Buat Pull Request

## 📝 Lisensi

Project ini bersifat open source dan bebas digunakan untuk keperluan pembelajaran.

## 👨‍💻 Author

**kamachiii**
- GitHub: [@kamachiii](https://github.com/kamachiii)

## 📞 Kontak

Jika ada pertanyaan atau saran, silakan buat issue di repository ini.

---

⭐ Jangan lupa berikan star jika project ini bermanfaat!
```
