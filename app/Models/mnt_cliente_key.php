<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mnt_cliente_key extends Model
{
    use HasFactory;
    protected $table="mnt_cliente_key";

    protected $fillable=[
        'id_key',
        'secret_key',
        'activo',
        'id_permiso',
        'id_sistema',
        'id_cliente',
    ];

    public function mnt_json_cliente_permisos()
    {
        return $this->belongsTo(mnt_json_cliente_permiso::class,'id');
    }

    public function mnt_sistema()
    {
        return $this->belongsTo(mnt_sistema::class,'id');
    }

    public function mnt_cliente()
    {
        return $this->belongsTo(mnt_cliente::class,'id');
    }

    public function mnt_bitacora()
    {
        return $this->hasMany(mnt_bitacora::class,'id');
    }

}
