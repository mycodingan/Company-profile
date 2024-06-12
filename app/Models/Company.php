<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'logo',
        'favicon',
        'website_name',
        'alamat',
        'nomor_telepon',
    ];
}
