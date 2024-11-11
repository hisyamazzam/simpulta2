<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LaporanMagangResource\Pages;
use App\Filament\Resources\LaporanMagangResource\RelationManagers;
use App\Models\LaporanMagang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LaporanMagangResource extends Resource
{
    protected static ?string $model = LaporanMagang::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nim')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('nama')
                    ->required(),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required(),
                Forms\Components\TextInput::make('wa')
                    ->numeric()
                    ->required(),
                Forms\Components\Select::make('jurusan')
                    ->options([
                        'pendidikanekonomi' => 'Pendidikan Ekonomi',
                        'pendidikanakuntansi' => 'Pendidikan Akuntansi',
                        'pendidikanadministrasiperkantoran' => 'Pendidikan Administasi Perkantoran',
                        'manajemen' => 'Manajemen',
                        'akuntansi' => 'Akuntansi',
                    ])
                    ->required(),
                    Forms\Components\FileUpload::make('laporanmagang')
                    ->directory(fn ($get) => 'laporanmagang/' . $get('nim') . '_' . $get('nama')) // Ambil nilai langsung dari input
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nim')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('wa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jurusan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('laporanmagang')
                    ->label('Laporan Magang')
                    ->boolean()
                    ->trueIcon('heroicon-o-document-text')
                    ->falseIcon('heroicon-o-x-circle')
                    ->tooltip(fn ($record) => $record->laporanmagang ? 'Download Laporan Magang' : 'Tidak Ada File')
                    ->url(fn ($record) => $record->laporanmagang ? asset('storage/' . $record->laporanmagang) : null),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('jurusan')
                ->options([
                    'pendidikanekonomi' => 'Pendidikan Ekonomi',
                    'pendidikanakuntansi' => 'Pendidikan Akuntansi',
                    'pendidikanadministrasiperkantoran' => 'Pendidikan Administasi Perkantoran',
                    'manajemen' => 'Manajemen',
                    'akuntansi' => 'Akuntansi',
                ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLaporanMagangs::route('/'),
            'create' => Pages\CreateLaporanMagang::route('/create'),
            'edit' => Pages\EditLaporanMagang::route('/{record}/edit'),
        ];
    }
}
