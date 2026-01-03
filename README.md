# TTG Developer Test

Deskripsi singkat:
Proyek ini berisi contoh frontend statis dan backend Node/Express dengan MySQL, serta dua skrip solusi masalah (PHP).

Struktur proyek:

- Frontend
  - [1-frontend/index.html](1-frontend/index.html)
- Backend (Node/Express + MySQL)
  - Server entry: [2-backend/app.js](2-backend/app.js) — menggunakan variabel [`userRoutes`](2-backend/app.js)
  - Routes pengguna: [2-backend/routes/users.js](2-backend/routes/users.js) — eksport [`router`](2-backend/routes/users.js)
  - Koneksi DB: [2-backend/config/db.js](2-backend/config/db.js) — eksport [`db`](2-backend/config/db.js)
  - Metadata/paket: [2-backend/package.json](2-backend/package.json)
- Problem solving (PHP)
  - Cari angka hilang: [3-ProblemSolving-Cari Angka/cariAngka.php](3-ProblemSolving-Cari Angka/cariAngka.php) — fungsi [`findMissingNumber`](3-ProblemSolving-Cari Angka/cariAngka.php)
  - Formula perhitungan: [4-ProblemSolving-Formula Perhitungan/formulaPerhitungan.php](4-ProblemSolving-Formula Perhitungan/formulaPerhitungan.php) — fungsi [`findExpression`](4-ProblemSolving-Formula Perhitungan/formulaPerhitungan.php), [`dfsExpression`](4-ProblemSolving-Formula Perhitungan/formulaPerhitungan.php), [`permute`](4-ProblemSolving-Formula Perhitungan/formulaPerhitungan.php)

Cara menjalankan

1. Backend (Node/Express)

   - Masuk ke folder backend:
     ```sh
     cd 2-backend
     ```
   - Install dependensi:
     ```sh
     npm install
     ```
   - Pastikan MySQL tersedia dan konfigurasi di [db.js](http://_vscodecontentref_/0) sesuai (database: `user_api`, user: `root`, password: `""`).
   - Atau bisa running Script SQL berikut (optional) :

   ```sh
       CREATE DATABASE user_api;

       USE user_api;

       CREATE TABLE users (
           id INT AUTO_INCREMENT PRIMARY KEY,
           name VARCHAR(100) NOT NULL,
           email VARCHAR(100) NOT NULL UNIQUE,
           created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
       );
   ```

   - Jalankan server:
     ```sh
     node app.js
     ```
   - API utama:

     - GET /users — ambil semua user (diimplementasikan di [router](http://_vscodecontentref_/1))
     - GET /users/:id — ambil user berdasarkan id
     - POST /users — tambah user (body JSON { "name", "email" })
     - DELETE /users/:id — hapus user

   - Contoh request:

     ```sh
     curl -X POST http://localhost:3000/users \
       -H "Content-Type: application/json" \
       -d '{"name":"Budi","email":"budi@contoh.com"}'
     ```

   - Dokumentasi Api

   ```sh
        https://documenter.getpostman.com/view/11245291/2sBXVcksFW
   ```

2. Frontend

   - Buka [index.html](http://_vscodecontentref_/2) di browser (file statis).
   - Form melakukan validasi sisi-klien; belum otomatis mengirim ke backend (bisa ditambahkan).

3. Skrip PHP (Problem Solving)
   - Jalankan dengan PHP CLI:
     ```sh
     php "3-ProblemSolving-Cari Angka/cariAngka.php"
     php "4-ProblemSolving-Formula Perhitungan/formulaPerhitungan.php"
     ```
   - Fungsi utama:
     - [`findMissingNumber`](3-ProblemSolving-Cari Angka/cariAngka.php)
     - [`findExpression`](4-ProblemSolving-Formula Perhitungan/formulaPerhitungan.php)

Lisensi

- Tidak ditentukan (lihat [package.json](http://_vscodecontentref_/5) untuk dependensi).
