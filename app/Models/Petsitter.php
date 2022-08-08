<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Petsitter extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'lastName',
        'firstName',
        'email',
        'password',
        'birthdate',
        'score',
        'petpreference'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

       /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'birthdate' => 'datetime'
    ];

    /**
     * Relationship btw petsitter and prestations (1 pet sitter have one more prestations)
     *
     * @return void
     */
    public function prestations(){
        return $this->hasMany(Prestation::class,'petsitter_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class,'comment_id');
    }
}