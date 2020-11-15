<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonVi extends Model
{
    protected $table = 'units';

    protected $fillable = [
        'name', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'
    ];

    

    

}
