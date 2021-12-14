<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model of the inscription class.
 */
class Inscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_matricule',
        'message_refus',
        'state'
    ];
}
