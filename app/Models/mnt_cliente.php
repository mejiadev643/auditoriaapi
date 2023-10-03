<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mnt_cliente extends Model
{
    use HasFactory;
    protected $table = "mnt_cliente";

    protected $fillable = [
        'nombre',
        'descripcion',
        'activo',
        'id_institucion',
    ];

    public function mnt_institucion()
    {
        return $this->belongsTo(mnt_institucion::class);
    }

    public function mnt_cliente_key()
    {
        return $this->hasMany(mnt_cliente_key::class);
    }

    public function mnt_json_cliente()
    {
        return $this->hasMany(mnt_json_cliente::class);
    }

  
}
