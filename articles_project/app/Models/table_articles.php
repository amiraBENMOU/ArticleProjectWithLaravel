<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class table_articles extends Model
{
    use HasFactory;
    protected $table = 'table_articles';
    protected $primaryKey = 'id';
    protected $guarded = ['id,'];
}
