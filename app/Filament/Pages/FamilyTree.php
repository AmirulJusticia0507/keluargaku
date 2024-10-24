<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class FamilyTree extends Page
{
    // Menentukan ikon untuk navigasi di sidebar Filament
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    // Menentukan label navigasi di menu sidebar
    protected static ?string $navigationLabel = 'Silsilah Keluarga';

    // Menentukan urutan di navigasi sidebar (semakin kecil angkanya, semakin atas)
    protected static ?int $navigationSort = 3; // Misalnya, untuk menampilkan setelah "Anggota Keluarga"

    // View yang akan dirender untuk halaman ini
    protected static string $view = 'filament.pages.family-tree';

    // Kelompok menu dalam navigasi
    protected static ?string $navigationGroup = 'Keluarga';
}
