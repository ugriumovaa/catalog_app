# Catalog App

Test assignment built with Laravel + Vue.js.

The application is a product catalog with public and administrative sections.

Backend is implemented as a REST API using Laravel 13.
Frontend is built with Vue 3 + Inertia.js.

---

# Tech Stack

## Backend

* PHP 8+
* Laravel 13
* Laravel Sanctum
* PostgreSQL
* Spatie Laravel Data

## Frontend

* Vue.js 3
* Composition API
* Inertia.js
* Element Plus
* Tailwind CSS

---

# Database Structure

## Product

| Field       | Type      |
| ----------- | --------- |
| id          | bigint    |
| name        | string    |
| description | text      |
| price       | decimal   |
| category_id | foreignId |
| created_at  | timestamp |
| updated_at  | timestamp |

## Category

| Field       | Type      |
| ----------- | --------- |
| id          | bigint    |
| name        | string    |
| created_at  | timestamp |
| updated_at  | timestamp |

Relationships:

* Product belongsTo Category
* Category hasMany Products

---

# API Endpoints

## Authentication

| Method | Endpoint     | Description                   |
| ------ | ------------ | ----------------------------- |
| POST   | `/api/login` | Generate authentication token |

---

## Categories

| Method | Endpoint          | Description        |
| ------ | ----------------- | ------------------ |
| GET    | `/api/categories` | Get all categories |

---

## Products

| Method | Endpoint             | Description                 |
| ------ | -------------------- | --------------------------- |
| GET    | `/api/products`      | Get paginated products list |
| GET    | `/api/products/{id}` | Get single product          |
| POST   | `/api/products`      | Create product              |
| PATCH  | `/api/products/{id}` | Update product              |
| DELETE | `/api/products/{id}` | Delete product              |

---
# Backend Setup

Start docker:

```bash
docker compose up -d
```

Enter container:

```bash
docker compose exec app bash
```

Install dependencies:

```bash
composer install
```

Create `.env` file:

```bash
cp .env.example .env
```

Run migrations:

```bash
php artisan migrate --seed
```

# Frontend Setup

Enter frontend/container:

```bash
docker compose exec app bash
```

Install dependencies:

```bash
npm install
```

Start Vite:

```bash
npm run dev
```

---

## Note

For this test assignment an intentionally simplified authentication approach was used, with the token stored in `localStorage` and manually attached as a Bearer Token.

For production applications this approach is not considered optimal from a security perspective. In real-world projects it is preferable to use more secure authentication and session management mechanisms such as HttpOnly cookies, CSRF protection, and a proper session-based authentication architecture.


