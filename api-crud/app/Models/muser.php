<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class muser extends Model
{
    use HasFactory;
    /* les attribut qui sont autorisés*/ 
    protected $fillable = [
        'name',
        'email',
        'password',
        'image'
    ];
}
