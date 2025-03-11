<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crochet extends Model
{
    use HasFactory;

    protected $table = 'products';

    public $timestamps = false; //para no usarla

    protected $fillable = ['name', 'description', 'price', 'image'];
}
