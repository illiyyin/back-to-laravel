<?php

namespace App\Models\api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductBrand extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'product_brand';
    public $timestamps = true;
    protected $fillable = [
        'name'
    ];
}
