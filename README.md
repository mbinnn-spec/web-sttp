<div align="center">

# PKL

### *Research & Community Service Management System*

<img src="https://readme-typing-svg.demolab.com?font=Poppins&weight=600&size=24&duration=3500&pause=1000&color=4F8EF7&center=true&vCenter=true&width=700&lines=Laravel+13+REST+API;Vue+3+%2B+Vite;Sanctum+Authentication;Role-Based+Access+Control;Research+Management+System" />

![License](https://img.shields.io/badge/license-Educational-blue?style=for-the-badge)
![Laravel](https://img.shields.io/badge/Laravel-13-red?style=for-the-badge\&logo=laravel)
![Vue](https://img.shields.io/badge/Vue-3-42b883?style=for-the-badge\&logo=vuedotjs)
![PHP](https://img.shields.io/badge/PHP-8.3-777BB4?style=for-the-badge\&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?style=for-the-badge\&logo=mysql)

---

*A modern web application for managing research proposals, budgets, reviews, and research reports at STT Pati.*

</div>

---

# ✨ Overview

Managing research proposals manually can be slow, difficult to monitor, and prone to data inconsistency.

**STTP PKL Web** digitizes the complete workflow into one integrated platform.

Users can:

* 🔐 Login securely
* 👥 Manage users
* 📑 Submit research proposals
* 💰 Manage research budgets (RAB)
* 📎 Upload proposal documents
* 👨‍🏫 Review submissions
* 📄 Submit research reports
* 📊 Track proposal status

---

# 🖼 Preview

> Replace these images after your frontend is complete.

```
📁 docs/
├── login.png
├── dashboard.png
├── proposal.png
├── review.png
└── report.png
```

---

# ⚙ Tech Stack

## Backend

<p>
<img src="https://skillicons.dev/icons?i=laravel,php,mysql"/>
</p>

* Laravel 13
* Laravel Sanctum
* REST API
* Eloquent ORM
* MySQL

---

## Frontend

<p>
<img src="https://skillicons.dev/icons?i=vue,vite,bootstrap,ts"/>
</p>

* Vue 3
* Vue Router
* Pinia
* Axios
* Bootstrap 5

---

## Development Tools

<p>
<img src="https://skillicons.dev/icons?i=git,github,vscode,postman,npm"/>
</p>

---

# 🚀 Features

## Authentication

* Secure Login
* Sanctum Authentication
* Role Middleware
* Change Password

---

## User Management

* Create User
* Edit User
* Delete User
* Reset Password

---

## Proposal

* Submit Proposal
* Draft Proposal
* Update Proposal
* Delete Proposal
* Proposal Detail

---

## Proposal Members

* Add Members
* Update Members
* Remove Members

---

## Proposal Budget (RAB)

* Add Budget Items
* Update Budget
* Delete Budget
* Automatic Total Calculation

---

## Proposal Files

* Upload Files
* Replace Files
* Delete Files
* Download Files

---

## Review

* Reviewer Dashboard
* Proposal Review
* Review History
* Status Update

---

## Research Reports

* Upload Final Report
* Edit Report
* Download Report

---

# 📂 Project Structure

```text
backend/
│
├── app/
├── database/
├── routes/
├── storage/
├── config/
└── ...

frontend/
│
├── src/
│   ├── assets/
│   ├── components/
│   ├── layouts/
│   ├── router/
│   ├── services/
│   ├── stores/
│   ├── views/
│   └── utils/
└── ...
```

---

# ⚡ Installation

## Clone Repository

```bash
git clone https://github.com/USERNAME/sttp-pkl-web.git
```

---

## Backend

```bash
cd backend

composer install

cp .env.example .env

php artisan key:generate

php artisan migrate --seed

php artisan storage:link

php artisan serve
```

---

## Frontend

```bash
cd frontend

npm install

npm run dev
```

---

# 📡 REST API Modules

| Module           | Status |
| ---------------- | ------ |
| Authentication   | ✅      |
| Dashboard        | ✅      |
| User Management  | ✅      |
| Proposal         | ✅      |
| Proposal Members | ✅      |
| Proposal Budget  | ✅      |
| Proposal Files   | ✅      |
| Research Reports | ✅      |
| Reviews          | ✅      |
| Profile          | ✅      |

---

# 🎯 Roadmap

* [x] Laravel REST API
* [x] Sanctum Authentication
* [x] User Management
* [x] Proposal CRUD
* [x] Proposal Member CRUD
* [x] Proposal Budget CRUD
* [x] Proposal File CRUD
* [x] Review CRUD
* [x] Research Report CRUD
* [ ] Vue Dashboard
* [ ] Responsive UI
* [ ] Notifications
* [ ] Export PDF
* [ ] Email Notifications

---

# 📈 Project Architecture

```text
                 Browser
                    │
                    ▼
            Vue 3 + Bootstrap
                    │
          Axios REST API Request
                    │
                    ▼
        Laravel 13 REST API Server
                    │
         Sanctum Authentication
                    │
                    ▼
                MySQL Database
```

---

# 👨‍💻 Developed By

**Bintang Anggara Kusuma**

Student of SMK Tunas Harapan Pati

Backend Developer • Laravel Enthusiast • Vue Learner

---

<div align="center">

### ⭐ If you like this project, don't forget to leave a star!

*"Code. Learn. Build. Improve."*

</div>
