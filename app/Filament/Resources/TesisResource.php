<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TesisResource\Pages;
use App\Filament\Resources\TesisResource\RelationManagers;
use App\Models\Tesis;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TesisResource extends Resource
{
    protected static ?string $model = Tesis::class;

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
                    'pendidikanekonomi' => 'S2 Pendidikan Ekonomi',
                    's2manajemen' => 'S2 Manajemen',
                    's2akuntansi' => 'S2 Akuntansi',
                    's3ekonomidanbisnis' => 'S3 Pendidikan Ekonomi dan Bisnis',
                ])
                ->required(),
            Forms\Components\FileUpload::make('abstrakindonesia')
                ->directory(fn ($get) => 'tesis/' . $get('nim') . '_' . $get('nama')) // Ambil nilai langsung dari input
                ->required(),
            Forms\Components\FileUpload::make('abstrakinggris')
                ->directory(fn ($get) => 'tesis/' . $get('nim') . '_' . $get('nama'))
                ->required(),
            Forms\Components\FileUpload::make('lembarpengesahan')
                ->directory(fn ($get) => 'tesis/' . $get('nim') . '_' . $get('nama'))
                ->required(),
            Forms\Components\FileUpload::make('jurnal')
                ->directory(fn ($get) => 'tesis/' . $get('nim') . '_' . $get('nama'))
                ->required(),
            Forms\Components\FileUpload::make('tesis')
                ->directory(fn ($get) => 'tesis/' . $get('nim') . '_' . $get('nama'))
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
                Tables\Columns\IconColumn::make('abstrakindonesia')
                    ->label('Abstrak Indonesia')
                    ->boolean() // Memeriksa apakah file ada
                    ->trueIcon('heroicon-o-document-text') // Ikon yang muncul jika ada file
                    ->falseIcon('heroicon-o-x-circle') // Ikon jika file tidak ada
                    ->tooltip(fn ($record) => $record->abstrakindonesia ? 'Download Abstrak Indonesia' : 'Tidak Ada File')
                    ->url(fn ($record) => $record->abstrakindonesia ? asset('storage/' . $record->abstrakindonesia) : null),
                Tables\Columns\IconColumn::make('abstrakinggris')
                    ->label('Abstrak Inggris')
                    ->boolean()
                    ->trueIcon('heroicon-o-document-text')
                    ->falseIcon('heroicon-o-x-circle')
                    ->tooltip(fn ($record) => $record->abstrakinggris ? 'Download Abstrak Inggris' : 'Tidak Ada File')
                    ->url(fn ($record) => $record->abstrakinggris ? asset('storage/' . $record->abstrakinggris) : null),
                Tables\Columns\IconColumn::make('lembarpengesahan')
                    ->label('Lembar Pengesahan')
                    ->boolean()
                    ->trueIcon('heroicon-o-document-text')
                    ->falseIcon('heroicon-o-x-circle')
                    ->tooltip(fn ($record) => $record->lembarpengesahan ? 'Download Lembar Pengesahan' : 'Tidak Ada File')
                    ->url(fn ($record) => $record->lembarpengesahan ? asset('storage/' . $record->lembarpengesahan) : null),
                Tables\Columns\IconColumn::make('jurnal')
                    ->label('Jurnal')
                    ->boolean()
                    ->trueIcon('heroicon-o-document-text')
                    ->falseIcon('heroicon-o-x-circle')
                    ->tooltip(fn ($record) => $record->jurnal ? 'Download Jurnal' : 'Tidak Ada File')
                    ->url(fn ($record) => $record->jurnal ? asset('storage/' . $record->jurnal) : null),
                Tables\Columns\IconColumn::make('tesis')
                    ->label('Tesis')
                    ->boolean()
                    ->trueIcon('heroicon-o-document-text')
                    ->falseIcon('heroicon-o-x-circle')
                    ->tooltip(fn ($record) => $record->tesis ? 'Download Tesis' : 'Tidak Ada File')
                    ->url(fn ($record) => $record->tesis ? asset('storage/' . $record->tesis) : null),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('jurusan')
                ->options([
                    'pendidikanekonomi' => 'S2 Pendidikan Ekonomi',
                    's2manajemen' => 'S2 Manajemen',
                    's2akuntansi' => 'S2 Akuntansi',
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
            'index' => Pages\ListTeses::route('/'),
            'create' => Pages\CreateTesis::route('/create'),
            'edit' => Pages\EditTesis::route('/{record}/edit'),
        ];
    }
}