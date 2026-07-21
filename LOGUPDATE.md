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

 # LOG UPDATE

## Tanggal
20 Juli 2026

## Ringkasan
Melakukan pengembangan backend sistem manajemen proposal penelitian STTP dengan fokus pada penyempurnaan arsitektur proyek, implementasi CRUD proposal, serta refactoring struktur controller dan request agar lebih modular.

---

## Penambahan (Added)

### Authentication
- Implementasi autentikasi menggunakan Laravel Sanctum.
- Penambahan endpoint Login API.
- Penerapan middleware autentikasi (`auth:sanctum`).

### Dashboard & Profile
- Implementasi Dashboard API.
- Implementasi endpoint Profile.
- Implementasi fitur Update Profile.
- Implementasi fitur Change Password.

### User Management
- Implementasi CRUD Kelola Akun (Admin).
- Penambahan endpoint Reset Password pengguna.
- Penerapan middleware Role Admin.

### Proposal Management
- Implementasi CRUD Proposal Penelitian.
- Implementasi CRUD Proposal Member.
- Penyesuaian relasi antar model Proposal.

---

## Perubahan (Changed)

### Struktur Project
- Melakukan refactoring struktur Controller menjadi berbasis modul.
- Memisahkan Controller Admin dan Proposal ke dalam folder masing-masing.
- Menyesuaikan namespace dan import setelah proses refactoring.
- Menyesuaikan struktur API Route agar lebih terorganisir.

### Database
- Penyempurnaan struktur database sesuai ERD.
- Penyempurnaan relasi antar tabel menggunakan Eloquent Relationship.

### Request Validation
- Mulai memisahkan proses validasi dari Controller menggunakan Laravel Form Request.
- Membuat struktur folder Request berdasarkan modul.
- Menambahkan:
  - StoreProposalRequest
  - UpdateProposalRequest

---

## Perbaikan (Fixed)

- Memperbaiki error pada ProfileController akibat method `index()` yang belum tersedia.
- Menyesuaikan route setelah proses refactoring controller.
- Menyesuaikan namespace Request setelah pemindahan folder.

---

## Progress Saat Ini

| Modul | Status |
|--------|--------|
| Authentication | ✅ Selesai |
| Dashboard | ✅ Selesai |
| Profile | ✅ Selesai |
| Kelola Akun | ✅ Selesai |
| Proposal | ✅ Selesai |
| Proposal Member | ✅ Selesai |
| Proposal RAB | ⏳ Belum |
| Proposal File | ⏳ Belum |
| Research Report | ⏳ Belum |
| Review | ⏳ Belum |
| Frontend Vue | ⏳ Belum |

---

## Rencana Pengembangan Selanjutnya

1. Implementasi Form Request untuk seluruh modul.
2. Implementasi Proposal RAB CRUD.
3. Implementasi Proposal File CRUD.
4. Implementasi Research Report CRUD.
5. Implementasi Review CRUD.
6. Pengujian endpoint menggunakan Postman.
7. Integrasi Backend dengan Frontend Vue 3.

## 2026-07-21

### Backend
- Completed Proposal File CRUD module.
- Added file upload, update, and delete functionality.
- Implemented automatic file storage using Laravel Storage.
- Completed Research Report CRUD module.
- Added report file upload and storage management.
- Implemented Review CRUD module.
- Added proposal-review relationship.
- Added reviewer relationship.
- Added validation for review status and notes.
- Tested CRUD endpoints for Proposal File, Research Report, and Review using Postman.
- Prepared backend for final refactoring before Vue frontend integration.

### Notes
- Logout endpoint will be implemented later.
- Planned improvement:
  - Set `reviewer_id` automatically from authenticated user (`Auth::id()`).
  - Review API responses and middleware consistency before frontend development.

## status
✅ Authentication
✅ Dashboard
✅ Profile
✅ Change Password
✅ Admin User Management
✅ Proposal
✅ Proposal Member
✅ Proposal RAB
✅ Proposal File
✅ Research Report
✅ Review
⬜ Final Backend Refactor
⬜ Logout
⬜ Vue Frontend