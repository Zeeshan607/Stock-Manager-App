<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\modal;


class brand extends model
{
    use HasFactory;

    public function modal(){
        return $this->hasMany( modal::class);
    }
    protected $fillable=[
        'name'
    ];
}
