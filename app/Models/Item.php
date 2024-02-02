<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';

    protected $fillable = [
        'item_name',
        'item_type_id',
        'item_price',
        'stocks'
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
