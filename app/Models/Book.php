<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['title','descrption', 'icon','metters','term'];

    public function metters(){
        return $this->belongsTo(Metter::class);
    }
    public function term(){
        return $this->belongsTo(Term::class);
    }
}
