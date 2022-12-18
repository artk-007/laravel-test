<?php

namespace App\Models;

use App\Models\User;
use App\Models\SimModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContractModel extends Model
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
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function sims()
    {
        return $this->hasMany(SimModel::class, 'contract_id', 'id');
    }
}
