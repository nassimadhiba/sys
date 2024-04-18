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
      'localisation',
      'user_id'
    ];
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    } 
}
