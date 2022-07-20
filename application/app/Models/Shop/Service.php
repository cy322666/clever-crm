<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'shop_services';

    protected $fillable = [
        'shop_id',
        'service_id',
        'name',
        'price',
    ];
}
