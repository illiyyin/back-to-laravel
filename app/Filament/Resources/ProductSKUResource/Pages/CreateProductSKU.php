<?php

namespace App\Filament\Resources\ProductSKUResource\Pages;

use App\Filament\Resources\ProductSKUResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProductSKU extends CreateRecord
{
    protected static string $resource = ProductSKUResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
