<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Properties\PropertyController;
use App\Http\Controllers\Owners\OwnerController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Tenants\TenantController;
use App\Http\Controllers\Guarantors\GuarantorController;

Route::get('/ingresar', [AuthController::class, 'login'])->name('auth.login');

Route::prefix('propiedades')->group(function () {
    Route::get('/', [PropertyController::class, 'index'])->name('properties.index');
    Route::get('/nueva', [PropertyController::class, 'formNew'])->name('properties.formNew');
    Route::post('/nueva', [PropertyController::class, 'processNew'])->name('properties.processNew');
});

Route::prefix('propietarios')->group(function () {
    Route::get('/', [OwnerController::class, 'index'])->name('owners.index');
    Route::get('/nuevo', [OwnerController::class, 'formNew'])->name('owners.formNew');
    Route::post('/nuevo', [OwnerController::class, 'processNew'])->name('owners.processNew');
    Route::get('/editar/{owner_id}', [OwnerController::class, 'formUpdate'])->name('owners.formUpdate');
    Route::post('/editar/{owner_id}', [OwnerController::class, 'processUpdate'])->name('owners.processUpdate');
    Route::post('/eliminar', [OwnerController::class, 'processDelete'])->name('owners.processDelete');
});

Route::prefix('inquilinos')->group(function () {
    Route::get('/', [TenantController::class, 'index'])->name('tenants.index');
    Route::get('/nuevo', [TenantController::class, 'formNew'])->name('tenants.formNew');
    Route::post('/nuevo', [TenantController::class, 'processNew'])->name('tenants.processNew');
    Route::get('/editar/{tenant_id}', [TenantController::class, 'formUpdate'])->name('tenants.formUpdate');
    Route::post('/editar/{tenant_id}', [TenantController::class, 'processUpdate'])->name('tenants.processUpdate');
    Route::post('/eliminar', [TenantController::class, 'processDelete'])->name('tenants.processDelete');
});

Route::prefix('garantes')->group(function () {
    Route::get('/', [GuarantorController::class, 'index'])->name('guarantors.index');
    Route::get('/nuevo', [GuarantorController::class, 'formNew'])->name('guarantors.formNew');
    Route::post('/nuevo', [GuarantorController::class, 'processNew'])->name('guarantors.processNew');
    Route::get('/editar/{guarantor_id}', [GuarantorController::class, 'formUpdate'])->name('guarantors.formUpdate');
    Route::post('/editar/{guarantor_id}', [GuarantorController::class, 'processUpdate'])->name('guarantors.processUpdate');
    Route::post('/eliminar', [GuarantorController::class, 'processDelete'])->name('guarantors.processDelete');
});
