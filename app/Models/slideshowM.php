<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slideshowM extends Model
{
    use HasFactory;
    protected $table = 'slideshow';
    protected $primaryKey = 'idslideshow';
    protected $connection = 'mysql';
    protected $guarded = [];
}
