<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    use HasFactory;
    protected $fillable = [
        'reference','designation','marque','prix','date' // Add 'reference' here
        // Other fillable properties (if any)
    ];

}
