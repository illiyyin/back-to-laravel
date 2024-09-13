<?php

namespace App\Models\api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductSKU extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'product_sku';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'brand_id',
        'product_id'
    ];
}
