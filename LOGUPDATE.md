# 📋 LOG UPDATE PROJECT WEB STTP

---

## 18 Juli 2026

### 👤 Developer
Bintang

### ✅ Yang dikerjakan
- Membuat project Laravel
- Membuat repository GitHub
- Menghubungkan project ke GitHub

### 📂 File yang diubah
- composer.json
- .env
- README.md

# 📜 LOG UPDATE - Backend Laravel

## 🚀 Project
**STTP Research Portal**
Sistem Informasi Penelitian & Pengabdian Masyarakat

---

# Update

## ✅ Authentication

- Login menggunakan Laravel Sanctum
- Logout
- Dashboard API
- Profile API
- Change Password API

---

## ✅ Middleware

- Authentication Middleware
- Role Middleware

---

## ✅ User Management (Admin)

- Menampilkan daftar user
- Menambahkan user
- Melihat detail user
- Mengubah data user
- Menghapus user
- Reset password user

---

## ✅ Proposal Module

- CRUD Proposal
- Validasi proposal
- Detail proposal

---

## ✅ Proposal Member

- CRUD Anggota Proposal

---

## ✅ Proposal RAB

- CRUD Rencana Anggaran Biaya (RAB)

---

## ✅ Proposal File

- Upload file proposal
- Update file proposal
- Hapus file proposal
- Download file

---

## ✅ Research Report

- CRUD Laporan Penelitian

---

## ✅ Review Module

- CRUD Review Proposal
- Reviewer otomatis menggunakan Auth::id()

---

## ✅ API Response

Semua endpoint telah menggunakan format response yang konsisten.

```json
{
    "success": true,
    "message": "Request berhasil",
    "data": {}
}
```

---

## ✅ Validation

- Request validation pada seluruh endpoint utama
- Error response JSON

---

## ✅ API Testing

Seluruh endpoint telah diuji menggunakan Postman.

- Login
- Logout
- Dashboard
- Profile
- Change Password
- User CRUD
- Proposal CRUD
- Proposal Member CRUD
- Proposal RAB CRUD
- Proposal File CRUD
- Research Report CRUD
- Review CRUD

---

## ✅ Security

- Laravel Sanctum Authentication
- Bearer Token
- Role Authorization
- Protected API Route

---

# Project Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Api/
│   │   │   ├── Admin/
│   │   │   ├── Proposal/
│   │   │   ├── AuthController.php
│   │   │   ├── DashboardController.php
│   │   │   └── ProfileController.php
│   │
│   ├── Middleware/
│   └── Requests/
```

---

# Status

## Backend Progress

██████████████████████░░░░░░

≈ 90%

---

# Next Step

- Frontend Vue Authentication
- Dashboard UI
- User Management UI
- Proposal UI
- Proposal Member UI
- Proposal RAB UI
- Proposal File UI
- Research Report UI
- Review UI

---

## Update
- 22 Juli 2026: Menyelesaikan backend Laravel dan mulai pengembangan frontend Vue.
