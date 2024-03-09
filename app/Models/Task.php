<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = 'task';
    
    protected $primaryKey = 'id';

    protected $attributes = [
        // 'middlename' => null,
    ];

    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'id_owner' => 'integer',
        'id_responsible' => 'integer',
        'id_status' => 'integer',
    ];
}
