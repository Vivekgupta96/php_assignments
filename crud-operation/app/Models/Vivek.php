<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vivek extends Model
{
    use HasFactory;

    protected $table = 'Vivek'; // specify the table name
    protected $primaryKey = 'id'; // specify the primary key field name

    protected $fillable = ['name', 'address'];
}
