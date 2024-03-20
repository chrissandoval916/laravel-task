<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entry extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = [
        'birthdate', 'marriage_date'
    ];

    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'city',
        'country',
        'birthdate',
        'is_married',
        'marriage_date',
        'marriage_country',
        'is_widowed',
        'is_separated',
    ];
}
