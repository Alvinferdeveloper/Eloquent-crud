<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    use HasFactory;
    protected $table = "clase";
    //protected $fillable = ['codclase', 'nombre', 'credito'];
    public $timestamps = false;
    protected $primaryKey = "codclase";
    
    public function impartes()
    {
        return $this->hasMany(Imparte::class, 'c_codclase');
    }
}
