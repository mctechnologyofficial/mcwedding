<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'timezone',
        'religion',
        'maps_type',
        'contract_validation',
        'contract_name',
        'contract_date',
        'contract_time_start',
        'contract_time_end',
        'contract_address',
        'contract_url_address',
        'reception_validation',
        'reception_name',
        'reception_date',
        'reception_time_start',
        'reception_time_end',
        'reception_address',
        'reception_url_address',
    ];
}
