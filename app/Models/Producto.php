<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>    
     */
    protected $fillable = [
        'name',
        'precio',
        'cantidad',
        'fabricante',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
