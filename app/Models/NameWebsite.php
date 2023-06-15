<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NameWebsite extends Model
{
    use HasFactory;
    protected $table = 'name_website';
    protected $guarded = ['id'];
}
