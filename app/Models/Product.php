<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'product';
    public $timestamps = true;
    protected $fillable = [
        'name','product_type_id'
    ];
    public function product_type(): BelongsTo
    {
        return $this->belongsTo(ProductType::class);
    }
}
