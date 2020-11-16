<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'customer',
        'code',
        'status',
        'view',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];
}
