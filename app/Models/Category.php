<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'name'
    ];

    public function income(){
        return $this->hasMany(Income::class);
    }
    public function spending(){
        return $this->hasMany(Spending::class);
    }
    
}
