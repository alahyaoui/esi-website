<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * https://www.positronx.io/laravel-file-upload-with-validation/
 */
class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'student',
        'name',
        'file_path'
    ];
}
