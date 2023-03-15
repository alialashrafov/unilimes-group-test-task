<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSet extends Model
{
    use HasFactory;
    protected $table = 'dataset';
    protected $guarded = [];
}
