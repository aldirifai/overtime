<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Cara Install

### Ekstrak File dan Buka Terminal di dalam Forder Project

Download file project, ekstrak terlebih dahulu kemudian masuk ke dalam folder project dan buka terminal, cmd, git ataupun software sejenis. Pastikan terminal sudah mengarah ke folder project.

### Install Semua Dependensi yang Dibutuhkan

```bash
composer install
```

### Buat Database Baru

Buat database sebagai tempat penyimpanan sistem ini

### Copy .env.example to .env

Copy file .env.example ke .env

```bash
cp .env.example .env
```

### Setting Database di File .env

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=username
DB_PASSWORD=password
```

### Migrasi Database

Migrasi semua table dan data yang sudah disediakan

```bash
php artisan migrate --seed
```

### Generate Key Aplikasi

```bash
php artisan key:generate
```

### Generate Swagger Documentation

```bash
php artisan l5-swagger:generate
```

### Jalankan Aplikasi

```bash
php artisan serve
```

## Dokumentasi API dan Testing

### Mengakses Dokumentasi API

Untuk melihat dokumentasi API pastikan aplikasi sudah berjalan atau jika belum maka jalankan aplikasi terlebih dahulu menggunakan perintah dibawah

```bash
php artisan serve
```

Untuk mengkses dokumentasi silakan salin URL berikut ke browser anda

```bash
http://127.0.0.1:8000/api/documentation
```

### Menjalankan Testing

Testing pada project ini menggunakan PHP Unit, untuk menjalankan tenting salin perintah berikut ke terminal anda

```bash
php artisan test
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
