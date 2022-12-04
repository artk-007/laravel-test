<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SimModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dateFormat = 'U';
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable = [
        'id',
        'id_contract',
        'number',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
