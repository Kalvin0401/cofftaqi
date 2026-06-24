<?php

use App\Livewire\Admin\Dashboard;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Admin\Kopi\Index as KopiIndex;
use App\Livewire\Gudang\StokMasuk\Index as StokMasukIndex;
use App\Livewire\Gudang\StokKeluar\Index as StokKeluarIndex;
use App\Livewire\Gudang\Dashboard as GudangDashboard;
use App\Livewire\Admin\Laporan\Index as LaporanIndex;
use App\Livewire\Gudang\RiwayatTransaksi;
use App\Livewire\Admin\Supplier\Form as SupplierForm;
use App\Livewire\Admin\Kopi\Form as KopiForm;
use App\Livewire\Admin\UserManagement\Form as UserForm;
use App\Livewire\Gudang\StokKeluar\Form as StokKeluarForm;
use App\Livewire\Gudang\StokMasuk\Form as StokMasukForm;

/* HOME */
Route::get('/', function () {
    return redirect()->route('login');
})->name('home');

/* DASHBOARD */
Route::get('/dashboard', function () {
    if (! Auth::check()) {
        return redirect()->route('login');
    }

    return Auth::user()->role === 'admin'
        ? redirect()->route('admin.dashboard')
        : redirect()->route('gudang.dashboard');
})->middleware('auth')->name('dashboard');


/* ===================== LAPORAN (ADMIN + GUDANG) ===================== */
Route::middleware(['auth', 'role:admin,staf_gudang'])
    ->prefix('laporan')
    ->name('laporan.')
    ->group(function () {

        Route::get('/', LaporanIndex::class)
            ->name('index');
    });

/* ===================== ADMIN ROUTES ===================== */
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard admin
    Route::get('/dashboard', Dashboard::class)
        ->name('dashboard');

    // Master Kopi
    Route::get('/kopi', KopiIndex::class)
        ->name('kopi.index');
    Route::get('/kopi/create', KopiForm::class)->name('kopi.create');
    Route::get('/kopi/{id}/edit', KopiForm::class)->name('kopi.edit');
    
    // User Management
    Route::get('/user', \App\Livewire\Admin\UserManagement\Index::class)
        ->name('user.index');
        Route::get('/user/create', UserForm::class)->name('user.create');
        Route::get('/user/{id}/edit', UserForm::class)->name('user.edit');

    // Supplier
    Route::get('/supplier', \App\Livewire\Admin\Supplier\Index::class)
        ->name('supplier.index');

    Route::get('/supplier/create', SupplierForm::class)
        ->name('supplier.create');

    Route::get('/supplier/{id}/edit', SupplierForm::class)
        ->name('supplier.edit');

});

/* ===================== STAF GUDANG ROUTES ===================== */
Route::middleware(['auth', 'role:staf_gudang'])->prefix('gudang')->name('gudang.')->group(function () {

    // Dashboard gudang
        Route::get('/dashboard', GudangDashboard::class)
            ->name('dashboard');

    // Stok Masuk
    Route::get('/stok-masuk', StokMasukIndex::class)
        ->name('stok-masuk.index');

    Route::get('/stok-masuk/create', StokMasukForm::class)
    ->name('stok-masuk.create');

    Route::get('/stok-masuk/{id}/edit', StokMasukForm::class)
    ->name('stok-masuk.edit');

    // Stok Keluar
    Route::get('/stok-keluar', StokKeluarIndex::class)
        ->name('stok-keluar.index');
    Route::get('/stok-keluar/create', StokKeluarForm::class)
    ->name('stok-keluar.create');

    Route::get('/stok-keluar/{id}/edit', StokKeluarForm::class)
    ->name('stok-keluar.edit');
    // Riwayat
        Route::get('/riwayat-transaksi', RiwayatTransaksi::class)
            ->name('riwayat-transaksi');
});

require __DIR__.'/settings.php';
