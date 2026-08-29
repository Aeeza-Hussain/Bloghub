# 🪶 BlogHub — Modern Dynamic Blogging Platform

<p align="center">
  <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=1200&auto=format&fit=crop&q=80" alt="BlogHub Banner" width="100%" style="border-radius: 12px;">
</p>

<p align="center">
  <a href="#"><img src="https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel 11"></a>
  <a href="#"><img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP 8.2+"></a>
  <a href="#"><img src="https://img.shields.io/badge/MySQL-XAMPP-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL"></a>
  <a href="#"><img src="https://img.shields.io/badge/CSS3-Vanilla_Design_System-1572B6?style=for-the-badge&logo=css3&logoColor=white" alt="Vanilla CSS"></a>
  <a href="#"><img src="https://img.shields.io/badge/Status-Active_Development-success?style=for-the-badge" alt="Status"></a>
</p>

---

## 📖 Overview

**BlogHub** is a dynamic technical blogging and publishing web application built with **Laravel 11**, **Blade templates**, and **MySQL**. It provides a peer-reviewed editorial experience for developers and software engineers, featuring multi-category articles, interactive author profiles, live search, and community discussions.

---

## ✨ Key Features

- **🌓 True Light & Dark Mode:** Fluid theme switching with `localStorage` persistence and no theme flicker.
- **📰 Editorial Homepage:** Flagship spotlight articles, trending rank ticker (`01`–`04`), curated categories, and subscriber newsletters.
- **📚 Multi-Category Blog Listing:**
  - Dynamic keyword search and scrollable category filter pills.
  - Sorting by *Newest First*, *Most Popular*, and *Oldest First*.
  - **Grid vs. List View Toggle** with layout persistence.
  - Dynamic Laravel pagination.
- **📝 Single Article Post Experience:**
  - Rich typography with formatted code snippets, blockquotes, and keyword tags.
  - Working **Copy Link** button with floating toast notification.
  - Interactive **Like Button** with heart micro-animation.
  - Threaded **Comments Section** with real-time validated submissions.
  - Related articles recommendation grid.
- **🗂️ Categories Directory:** 10+ knowledge tracks with article counters and direct filtered browsing.
- **👥 Authors & Contributors:**
  - Comprehensive author directory with search and sorting by published count / followers.
  - Detailed **Author Profiles** with panoramic banners, stats bars, bios, and author article collections.
- **🔍 Dedicated Search Page:** Query echo, match counters, and fallback suggestions for zero-result searches.
- **✉️ Editorial Contact Desk:** Two-column contact layout with server-side validation and MySQL database persistence.

---

## 🛠️ Tech Stack

- **Backend:** Laravel 11 (PHP 8.2+)
- **Architecture:** MVC (Models, Views, Controllers, Migrations, Seeders)
- **Database:** MySQL (`Bloghubb_db` via XAMPP)
- **Frontend / Templating:** Blade Views, Semantic HTML5, Vanilla JavaScript
- **Styling:** Custom Vanilla CSS Design System with CSS Custom Properties (Tokens)
- **Icons:** Bootstrap Icons 1.11+

---

## 🚀 Getting Started (Local Setup)

### 1. Prerequisites
- [PHP >= 8.2](https://www.php.net/)
- [Composer](https://getcomposer.org/)
- [XAMPP / MySQL](https://www.apachefriends.org/)
- [Git](https://git-scm.com/)

### 2. Clone the Repository
```bash
git clone https://github.com/YOUR_USERNAME/BlogHub.git
cd BlogHub
```

### 3. Install Dependencies
```bash
composer install
```

### 4. Configure Environment
Copy `.env.example` to `.env`:
```bash
cp .env.example .env
```

Set up your MySQL database in `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=Bloghubb_db
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=file
```

### 5. Generate Application Key
```bash
php artisan key:generate
```

### 6. Run Migrations & Seeders
Make sure MySQL is running in your **XAMPP Control Panel**, then run:
```bash
php artisan migrate:fresh --seed
```

### 7. Start Local Development Server
```bash
php artisan serve
```
Open your browser and navigate to: **`http://localhost:8000`**

---

## 📂 Project Structure

```
BlogHub/
├── app/
│   ├── Http/Controllers/   # HomeController, BlogController, AuthorController, etc.
│   └── Models/             # Article, Author, Category, Comment, Contact
├── database/
│   ├── migrations/         # Database table definitions
│   └── seeders/            # DatabaseSeeder with dummy technical data
├── public/
│   └── css/                # Compiled production CSS
├── resources/
│   ├── css/                # Design System tokens & components
│   └── views/              # Blade layouts, partials, and content pages
│       ├── layouts/        # Base HTML shell with theme switcher
│       ├── partials/       # Navbar and Footer components
│       ├── home/           # Homepage
│       ├── blogs/          # Blog listing and single post
│       ├── authors/        # Authors directory and profile
│       ├── categories/     # Categories grid
│       ├── search/         # Search results
│       ├── about/          # About publication
│       └── contact/        # Contact desk & FAQs
└── routes/
    └── web.php             # Application web routes
```

---

## 👥 Contributors

- **Aleeza Fatima** — Founder & Staff Infrastructure Architect
- **Sania Fida** — Principal Backend Architect
- **Sana Akbar** — Design Systems Lead
- **Amna Kiran** — Senior Frontend Engineer
- **Tariq Hussain** — Principal Security Researcher
- **Kubra Batool** — Engineering Director
- **Munazza Batool** — Lead QA Architect
- **Ikhlas Hussain** — Principal Database Engineer

---

## 📄 License

This project is open-source and available under the [MIT License](LICENSE).
