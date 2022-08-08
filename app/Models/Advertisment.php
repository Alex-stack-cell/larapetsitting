<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'owner_id',
        'prestation_id',
        'title',
        'description',
        'tags',
        'postCode',
        'city',
        'dateStart',
        'dateEnd',
    ];

    public function owner(){
        return $this->belongsTo(Owner::class,'owner_id');
    }

    public function prestation(){
        return $this->hasOne(Prestation::class,'prestation_id');
    }
}