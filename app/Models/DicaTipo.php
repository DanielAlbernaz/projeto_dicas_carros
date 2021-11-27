<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DicaTipo extends Model
{
    use HasFactory;

    public $timestamps   = true;
    public $incrementing = true;
    protected $table = 'dica_tipo';

     public function dica()
    {
        return $this->hasMany(Dica::class, 'dica_id', 'id');
    }

}
