<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrideMan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fullname',
        'shortname',
        'father_name',
        'mother_name',
        'self_description',
        'image',
    ];
}
