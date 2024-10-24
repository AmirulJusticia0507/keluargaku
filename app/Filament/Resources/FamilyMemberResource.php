<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FamilyMemberResource\Pages;
use App\Models\FamilyMember;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class FamilyMemberResource extends Resource
{
    protected static ?string $model = FamilyMember::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Anggota Keluarga';
    protected static ?int $navigationSort = 1; // Adjust navigation order if needed

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_lengkap')
                    ->required()
                    ->label('Nama Lengkap'),

                Forms\Components\Select::make('hubungan_keluarga')
                    ->options([
                        'Ayah' => 'Ayah',
                        'Ibu' => 'Ibu',
                        'Anak' => 'Anak',
                        'Saudara' => 'Saudara',
                        'Kakek/Nenek' => 'Kakek/Nenek',
                        'Cucu' => 'Cucu',
                        'Suami' => 'Suami',
                        'Istri' => 'Istri',
                    ])
                    ->required()
                    ->label('Hubungan Keluarga'),

                Forms\Components\Select::make('ayah_id')
                    ->label('Ayah')
                    ->relationship('ayah', 'nama_lengkap') // Relasi ke ayah
                    ->searchable()
                    ->nullable(),

                Forms\Components\Select::make('ibu_id')
                    ->label('Ibu')
                    ->relationship('ibu', 'nama_lengkap') // Relasi ke ibu
                    ->searchable()
                    ->nullable(),

                Forms\Components\Select::make('suami_id')
                    ->label('Suami')
                    ->relationship('suami', 'nama_lengkap')
                    ->searchable()
                    ->nullable(),

                Forms\Components\Select::make('istri_id')
                    ->label('Istri')
                    ->relationship('istri', 'nama_lengkap')
                    ->searchable()
                    ->nullable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_lengkap')
                    ->label('Nama Lengkap')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('hubungan_keluarga')
                    ->label('Hubungan Keluarga')
                    ->sortable(),

                Tables\Columns\TextColumn::make('ayah.nama_lengkap')
                    ->label('Ayah')
                    ->sortable(),

                Tables\Columns\TextColumn::make('ibu.nama_lengkap')
                    ->label('Ibu')
                    ->sortable(),

                Tables\Columns\TextColumn::make('suami.nama_lengkap')
                    ->label('Suami')
                    ->sortable(),

                Tables\Columns\TextColumn::make('istri.nama_lengkap')
                    ->label('Istri')
                    ->sortable(),
            ])
            ->filters([]) // Add filters if needed
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFamilyMembers::route('/'),
            'create' => Pages\CreateFamilyMember::route('/create'),
            'edit' => Pages\EditFamilyMember::route('/{record}/edit'),
        ];
    }
}
