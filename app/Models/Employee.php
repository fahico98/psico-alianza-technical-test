<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;

class Employee extends Model
{
    use HasFactory, HasUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id',
        'name',
        'lastname',
        'updated_at',
        'address',
        'phone_number',
        'birthplace',
        'charge_id',
        'boss_id'
    ];

    /**
     * Scope a query to include the employee's charge.
     */
    public function scopeWithCharge($query)
    {
        return $query->with('charge');
    }

    /**
     * Scope a query to include the employee's boss.
     */
    public function scopeWithBoss($query)
    {
        return $query->with('boss');
    }

    /**
     * Get the charge that owns the employee.
     */
    public function charge()
    {
        return $this->belongsTo(Charge::class);
    }

    /**
     * Get the boss that owns the employee.
     */
    public function boss()
    {
        return $this->belongsTo(Employee::class,'boss_id','id');
    }
}