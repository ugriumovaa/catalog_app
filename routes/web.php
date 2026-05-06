<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', fn() => Inertia::render('Index')
);

Route::get('/product/{id}', fn($id) => Inertia::render('Show', ['id' => $id])
);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/admin/products', fn() => Inertia::render('Admin/Products/Index')
    );

    Route::get('/admin/products/create', fn() => Inertia::render('Admin/Products/Create')
    );

    Route::get('/admin/products/{id}/edit', fn($id) => Inertia::render('Admin/Products/Edit', ['id' => $id])
    );
});


