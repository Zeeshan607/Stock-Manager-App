<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modal extends Model
{
    use HasFactory;

    protected $fillable=[
        'name','brand_id'
    ];

    public function brand(){
        return  $this->belongsTo(brand::class,"brand_id");
    }
    public function item(){
        return  $this->hasMany(item::class);
    }



}
