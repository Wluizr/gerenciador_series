<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    use HasFactory;
    protected $fillable = ['number'];
    
    public function series(){
        // belongsTo = Pertence Ha;
        return $this->belongsTo(Serie::class);
    }

    public function episodes(){
        // hasMany = tem muitos 
        return $this->hasMany(Episode::class);
    }
}
