<?php

namespace App\Filament\Resources\ProductSKUResource\Pages;

use App\Filament\Resources\ProductSKUResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProductSKUS extends ListRecords
{
    protected static string $resource = ProductSKUResource::class;
    
    public function getTitle(): string
    {
        return 'Product SKU';
    }

    public function getHeading(): string
    {
        return 'List Product SKU';
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Create SKU'),
        ];
    }
}
