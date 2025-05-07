<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StokResource\Pages;
use App\Models\Stok;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class StokResource extends Resource
{
    protected static ?string $model = Stok::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Stok Produk';
    protected static ?string $pluralModelLabel = 'Stok Produk';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kode_barcode')
                    ->label('Kode Barcode')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('nama_barang')
                    ->label('Nama Barang')
                    ->required()
                    ->maxLength(255),

                Forms\Components\FileUpload::make('gambar_barang')
                    ->label('Gambar Barang')
                    ->image()
                    ->disk('public')
                    ->directory('barang') // Disimpan di storage/app/public/barang
                    ->imagePreviewHeight('150')
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('stok')
                    ->numeric()
                    ->required()
                    ->minValue(0),

                Forms\Components\TextInput::make('harga')
                    ->numeric()
                    ->required()
                    ->prefix('Rp ')
                    ->minValue(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode_barcode')
                    ->label('Kode')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('nama_barang')
                    ->label('Nama Produk')
                    ->searchable(),

                Tables\Columns\ImageColumn::make('gambar_barang')
                    ->label('Gambar')
                    ->disk('public')
                    ->size(100),

                Tables\Columns\TextColumn::make('stok')
                    ->label('Stok')
                    ->sortable(),

                Tables\Columns\TextColumn::make('harga')
                    ->label('Harga')
                    ->money('IDR'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStoks::route('/'),
            'create' => Pages\CreateStok::route('/create'),
            'edit' => Pages\EditStok::route('/{record}/edit'),
        ];
    }
}
