<?php

namespace App\Models;

use App\Models\ContractModel;
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
        'contract_id',
        'number',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    public function contract()
    {
        return $this->belongsTo(ContractModel::class, 'contract_id', 'id');
    }
}
