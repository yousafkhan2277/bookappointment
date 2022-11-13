<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Day extends Model
{
    use HasFactory;
    public $table = 'days';

    protected $dates = [
        'day',
        'comment',
        'workingDayStatus',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'employee_id',
        'day',
        'comment',
        'workingDayStatus',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function employee()
    {
        return $this->belongsTo(Employess::class, 'employee_id');
    }
}
