<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestation extends Model
{
    use HasFactory;

    protected $fillable = [
        'petsitter_id',
        'dateStart',
        'dateEnd'
    ];

    /**
     * Relationship btw PetSitter and Prestation
     */
    public function petSitter(){
        return $this->belongsTo(Petsitter::class,'petsitter_id');
    }
}