<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;

class Charge extends Model
{
    use HasFactory, HasUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'area',
        'role',
        'updated_at'
    ];

    /**
     * Get the employee for the charge.
     */
    public function employee()
    {
        return $this->hasOne(Employee::class);
    }
}