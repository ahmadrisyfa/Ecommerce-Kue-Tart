<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanyaJawab extends Model
{
    use HasFactory;
    protected $table = 'tanya_jawab';
    protected $guarded = ['id'];
}
