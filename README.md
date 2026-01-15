# Laravel URL Shortener

A simple URL shortener service built with Laravel.

## Features
- User authentication
- Create short URLs
- Redirect to original URL
- Click count tracking
- No roles (Admin / Member)
- Single system (no multi-company support)

---

## Tech Stack
- PHP 8+
- Laravel 10+
- MySQL
- Laravel Breeze (Auth)
- Tailwind CSS

---

## Setup Instructions (Local)

### 1. Clone the Repository
```bash
git clone https://github.com/jaygupta9584/url_shortner
cd laravel-url-shortener

# .env
cp .env.example .env

# CREATE DATABASE url_shortner;

# Command need to run 
php artisan migrate
php artisan serve


# Folder Structure 
app/Models/ShortUrl.php
app/Http/Controllers/ShortUrlController.php
routes/web.php
resources/views/short_urls/index.blade.php

