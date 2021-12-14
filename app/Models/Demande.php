<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model of the cavp demande.
 */
class Demande extends Model
{
    use HasFactory;

    protected $table = 'demande';
    protected $fillable = [
        'student_matricule',
        'message',
    ];
}
