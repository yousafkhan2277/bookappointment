<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class Employess extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'employesses';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function employeeWorkinghours()
    {
        return $this->hasMany(Workinghour::class, 'employee_id', 'id');
    }

    public function employeeAppointments()
    {
        return $this->hasMany(Appointment::class, 'employee_id', 'id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
