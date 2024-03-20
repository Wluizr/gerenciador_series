<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;

    protected $fillable = ['nome'];


    public function seasons()
    {
        // hasMany = temMuitas; // Season = Temporadas
        return $this->hasMany(Season::class, 'series_id'); // está informando que uma Série possui muitas temporadas. E isso é um relacionamento entre as models
    }
    
    protected static function booted()
    {
        self::addGlobalScope('ordered', function(Builder $queryBuilder){
            $queryBuilder->orderBy('nome', 'asc');
        });
    }
}
