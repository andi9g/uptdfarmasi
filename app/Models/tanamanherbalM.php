<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tanamanherbalM extends Model
{
    use HasFactory;
    protected $table = 'tanamanherbal';
    protected $primaryKey = 'idtanamanherbal';
    protected $connection = 'mysql';
    protected $guarded = [];
}
