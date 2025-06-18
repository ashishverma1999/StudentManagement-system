# 🎓 Student Management System – Laravel + MySQL + Bootstrap

A robust and responsive **Student Management System** built with Laravel, MySQL, and Bootstrap. This project demonstrates user authentication, role-based access control, and modern AJAX CRUD functionality using DataTables. Ideal for schools, institutions, or as a portfolio piece to showcase Laravel skills.

---

## 📌 Features

- 🔐 **User Authentication**
  - Login and registration using Laravel Breeze

- 👥 **Role-Based Access Control**
  - Integrated with `spatie/laravel-permission`
  - **Admin**: Full access (add/edit/delete students, manage roles/users)
  - **Teacher**: View-only access to student list
  - **Staff**: Add/edit students, but cannot delete

- 🧑‍🎓 **Student Management**
  - Create, update, delete student records
  - Toggle active/inactive status
  - Modal-based forms and AJAX validation

- 📊 **DataTables Integration**
  - Server-side search, pagination, and sorting
  - Dynamic UI updates without page reloads

- 🧠 **Clean and Scalable Codebase**
  - Separation of concerns (Controllers, Models, Views)
  - Reusable AJAX form logic and permission-based UI rendering

---

## 💻 Tech Stack

| Technology | Usage |
|------------|--------|
| Laravel 12 | Backend framework |
| MySQL      | Database |
| Bootstrap 5 | Frontend styling |
| jQuery + AJAX | Client-side interactivity |
| DataTables | Enhanced table UI |
| Spatie Laravel Permission | Role & permission management |
| Laravel Breeze | Auth scaffolding |

![Screenshot 2025-06-18 132907](https://github.com/user-attachments/assets/c3757a0d-cf98-4d75-b213-190b20333c12)
---

## 🚀 Installation

1. **Clone the repo**

```bash
git clone https://github.com/your-username/student-management-system.git
cd student-management-system
```
2. Install dependencies
```bash
composer install
npm install && npm run dev
```
3.setup environment
```bash
cp .env.example .env
php artisan key:generate
```

4. Configure .env with your database credentials

5. Run migrations and seeders
```bash
   php artisan migrate --seed
```

6.start the server
```bash
php artisan serve
```

🔑 Default Roles & Permissions
After seeding, the following roles are created:

Admin: Full access

Teacher: Only view students

Staff: Can view, add, and edit students

You can assign roles using:
```bash

php artisan tinker

$user = \App\Models\User::find(1);
$user->assignRole('Admin');

```
