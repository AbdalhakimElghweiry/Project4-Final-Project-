<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
     protected $fillable = [
        'stNo',
        'name',
        'email',
        'password',
        'avg',
        'status'
    ];

    /**
     * Get the display name for the status
     */
    public function getStatusDisplayAttribute()
    {
        return match($this->status) {
            'active' => 'Active',
            'notActive' => 'Not Active',
            'dismissed' => 'Dismissed',
            default => 'Unknown'
        };
    }
}
