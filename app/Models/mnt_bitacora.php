<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mnt_bitacora extends Model
{
    use HasFactory;
    protected $table ="mnt_bitacora";

    protected $fillable = [
        'id_cliente_key',
        'ip_sistema',
        'numero_documento_usuario',
        'respuesta',
        'id_tipo_bitacora',
        'fecha',
    ];

    public function mnt_cliente_key()
    {
        return $this->belongsTo(mnt_cliente_key::class,"id");
    }

    public function ctl_tipo_bitacora()
    {
        return $this->belongsTo(ctl_tipo_bitacora::class,"id");
    }
}
