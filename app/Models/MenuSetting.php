<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_logo',
        'whatsapp_number',
        'admin_password',
    ];
}