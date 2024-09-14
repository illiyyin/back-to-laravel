<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductSKUResource\Pages;
use App\Filament\Resources\ProductSKUResource\RelationManagers;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductSKU;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductSKUResource extends Resource
{
    protected static ?string $model = ProductSKU::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Product SKU';
    protected ?string $subheading = 'Product SKU';
    protected static ?string $slug = 'product-sku';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('product_id')
                    ->label('Product')
                    ->options(Product::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                Forms\Components\Select::make('brand_id')
                    ->label('Brand')
                    ->options(Brand::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('product.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('brand.name')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateHeading('No Product SKU yet');;
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
            'index' => Pages\ListProductSKUS::route('/'),
            'create' => Pages\CreateProductSKU::route('/create'),
            'view' => Pages\ViewProductSKU::route('/{record}'),
            'edit' => Pages\EditProductSKU::route('/{record}/edit'),
        ];
    }
}
