<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imparte extends Model
{
    use HasFactory;
    protected $table = "imparte";
    public $timestamps = false;
    //public $primaryKey = ['c_codclase','p_idprofesor','a_idaula'];
    public $fillable = ['c_codclase','p_idprofesor','a_idaula'];

    public function clase()
    {
        return $this->belongsTo(Clase::class,'c_codclase');
    }

    public function profesor()
    {
       return $this->belongsTo(Profesor::class,'p_idprofesor',"id");
       

    }
    public function aula()
    {
        return $this->belongsTo(Aula::class,'a_idaula');
    }
}
