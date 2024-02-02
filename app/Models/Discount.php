<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountController extends Model
{
    use HasFactory;
    protected $table = 'discount';

    protected $fillable = [
        'shipping_total',
        'item_discount',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

}
