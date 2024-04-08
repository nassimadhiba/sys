<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{

    protected $table='post';
    protected $fillable=[
      'image',
      'titre',
      'description',
      'email',
      'localisation'
    ];
    use HasFactory;
}
