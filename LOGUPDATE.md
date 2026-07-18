## Backend Update (Laravel) 18/7/2026

- Menambahkan Role Middleware untuk membatasi akses berdasarkan role pengguna.
- Mendaftarkan middleware `role` pada `bootstrap/app.php` (Laravel 13).
- Mengamankan endpoint admin menggunakan middleware `auth:sanctum` dan `role:admin`.
- Berhasil melakukan pengujian autentikasi menggunakan Bearer Token.
- Memastikan endpoint admin hanya dapat diakses oleh user dengan role `admin`.
- Melakukan pengujian:
  - Login berhasil menghasilkan Sanctum Token.
  - Endpoint tanpa token mengembalikan 401 Unauthorized.
  - Endpoint dengan role selain admin mengembalikan 403 Forbidden.
  - Endpoint dengan role admin dapat diakses dengan normal.