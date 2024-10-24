<?php

namespace App\Providers;

use App\Filament\Pages\FamilyTree;
use Filament\Forms;
use Filament\Tables;
use Filament\Pages\Dashboard;
use Illuminate\Support\ServiceProvider;
use Filament\Filament;

class FilamentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Daftarkan halaman di sini
        Filament::registerPages([
            Dashboard::class,
            FamilyTree::class, // Pastikan ini ditambahkan
        ]);
    }
}
