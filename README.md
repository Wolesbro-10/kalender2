# 📅 Events Calendar (Laravel)

Aplikasi kalender event berbasis Laravel yang memungkinkan:
- Menampilkan kalender bulanan
- Menambah event
- Edit & hapus event
- Download data event (CSV)

---

## 🚀 Tech Stack

- Laravel 12
- PHP 8.2
- MySQL
- Blade + JavaScript

---

## 📦 Fitur Utama

- 📆 Tampilan kalender bulanan
- ➕ Tambah event
- ✏️ Edit event
- ❌ Hapus event
- 📥 Export CSV

---

## ⚙️ Instalasi (Local)

1. Clone repository:
git clone https://github.com/USERNAME/REPO.git
cd REPO

2. Install dependency:
composer install

3. Copy env:
cp .env.example .env

4. Generate key:
php artisan key:generate

5. Setup database di `.env`:
DB_DATABASE=your_db
DB_USERNAME=your_user
DB_PASSWORD=your_password

6. Migrate database:
php artisan migrate

7. Jalankan:
php artisan serve

---

## 🌐 Deployment (Production - cPanel)

Aplikasi ini di-deploy pada subfolder:

https://mercure-solo.com/events-calendar

### Struktur folder:

~/laravel_app                 → source Laravel  
~/public_html/events-calendar → folder public  

### Langkah deployment:

1. Clone project ke server:
git clone https://github.com/USERNAME/REPO.git laravel_app

2. Install dependency:
composer install --no-dev --optimize-autoloader --no-scripts  
php artisan package:discover

3. Setup `.env`

4. Copy folder public:
cp -r public/* ~/public_html/events-calendar/  
cp public/.htaccess ~/public_html/events-calendar/

5. Edit `index.php`:
require __DIR__.'/../../laravel_app/vendor/autoload.php';  
$app = require_once __DIR__.'/../../laravel_app/bootstrap/app.php';

6. Permission:
chmod -R 775 storage bootstrap/cache

---

## ⚠️ Catatan Penting (Subfolder)

Aplikasi ini berjalan di subfolder, sehingga:

❌ Jangan gunakan hardcoded path seperti:
action="/event"  
href="/download"  

✔ Gunakan helper Laravel:
{{ url('event') }}  
{{ route('event.store') }}  

❌ JavaScript:
fetch('/event/delete/1')

✔ Harus:
fetch('/events-calendar/event/delete/1')

---

## 🔐 Security

Pastikan `.env` tidak ikut ke Git:

Tambahkan ke `.gitignore`:
.env

---

## 🛠 Troubleshooting

### ❌ 500 Error
tail -n 50 storage/logs/laravel.log

### ❌ SQLite error
DB_CONNECTION=mysql

### ❌ 404 setelah submit
Cek path masih hardcoded `/event`

---

## 📌 Notes

Project ini sudah disesuaikan untuk:
- Shared hosting (cPanel)
- Subfolder deployment
- Restriksi server (proc_open, shell_exec disabled)

---

## 👨‍💻 Author

- Original: Mahasiswa
- Deployment & Fix: Anda

---

## 📄 License

MIT License
