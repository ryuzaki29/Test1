<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Karlotbl extends Model
{
    use HasFactory;
    use SoftDeletes;

    // Specify the table name if it doesn't follow Laravel's naming convention
    protected $table = 'karlotbl';

    // Specify which fields are mass assignable
    protected $fillable = ['name', 'age', 'email', 'motto'];

}
