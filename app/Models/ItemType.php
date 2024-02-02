<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemType extends Model
{
    use HasFactory;

    protected $table = 'item_type';

    protected $fillable = [
        'name_item_type',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
