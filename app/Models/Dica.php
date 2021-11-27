<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dica extends Model
{
    use HasFactory;

    public $timestamps   = true;
    public $incrementing = true;
    protected $primaryKey = 'id';
    protected $table = 'dica';
    protected $fillable = [
                    'user_id',
                    'dica_tipo_id',
                    'marca',
                    'modelo',
                    'versao',
                    'text'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function tipo()
    {
        return $this->belongsTo(DicaTipo::class, 'dica_tipo_id', 'id');
    }

}
