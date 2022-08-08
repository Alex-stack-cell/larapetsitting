<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'petsitter_id',
        'prestation_id',
        'title',
        'description',
        'createdAt',
        'score'
    ];

    /**
     * Relationship btw Comment and Owner
     */

     public function owner(){
        return $this->belongsTo(Owner::class,'owner_id');
    }

    public function petSitter(){
        return $this->belongsTo(PetSitter::class,'petsitter_id');
    }

    public function prestation(){
        return $this->belongsTo(Prestation::class,'prestation_id');
    }
}