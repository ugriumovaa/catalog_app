<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', fn () => Inertia::render('Index')
);

Route::get('/product/{id}', fn ($id) => Inertia::render('Show', ['id' => $id])
);

Route::prefix('admin')->group(function () {
    Route::get('/', fn () => Inertia::render('Admin/Index')
    );

    Route::get('/products', fn () => Inertia::render('Admin/Products/Index')
    );

    Route::get('/products/create', fn () => Inertia::render('Admin/Products/Create')
    );

    Route::get('/products/{id}/edit', fn ($id) => Inertia::render('Admin/Products/Edit', ['id' => $id])
    );
});
