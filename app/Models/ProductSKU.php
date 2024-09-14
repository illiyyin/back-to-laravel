<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
