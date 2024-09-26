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
        'area_id',
        'charge_id',
        'role_id',
        'boss_id'
    ];

    /**
     * Scope a query to include the employee's area.
     */
    public function scopeWithArea($query)
    {
        return $query->with('area');
    }

    /**
     * Scope a query to include the employee's role.
     */
    public function scopeWithRole($query)
    {
        return $query->with('role');
    }

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
     * Get the work area that owns the employee.
     */
    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    /**
     * Get the role that owns the employee.
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
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