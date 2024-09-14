<?php

namespace App\Filament\Resources\ProductTypeResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ViewProduct extends ListRecords
{
    protected static string $resource = ProductResource::class;

}
