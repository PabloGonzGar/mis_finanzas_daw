<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Spending extends Model
{
    protected $fillable =[
        'date',
        'amount',
        'category_id',
        'price'
    ];


    public function category(){
        return $this->belongsTo(Category::class);
    }
}
