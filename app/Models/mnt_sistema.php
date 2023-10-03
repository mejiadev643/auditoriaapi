<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mnt_sistema extends Model
{
    use HasFactory;
    protected $table="mnt_sistema";

    protected $fillable=[
        'nombre',
        'descripcion',
        'id_institucion'
    ];

    public function ctl_institucion()
    {
       return $this->belongsTo(ctl_institucion::class,"id");
    }

    public function mnt_cliente_key()
    {
        return $this->hasMany(mnt_cliente_key::class,"id");
    }
}
