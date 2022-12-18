<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class group_sim extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'group_sim';
    protected $dateFormat = 'U';
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $fillable = ['name'];
    public function sims()
    {
        return $this->belongsToMany(SimModel::class);
    }
}
