<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'student';
    protected $primaryKey = 'matricule';

    protected $fillable = [
        'first_name',
        'last_name',
        'bloc',
        'section'
    ];
}
