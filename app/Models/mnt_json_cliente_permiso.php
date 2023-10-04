<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mnt_json_cliente_permiso extends Model
{
    use HasFactory;
    protected $table="mnt_json_cliente_permisos";
    protected $casts = [
        'json_campos_permitidos' => 'array',
    ];
    
    protected $fillable=[
        'id_json',
        'cantidad_peticiones',
        'json_campos_permitidos',
    ];

    public function mnt_cliente_key()
    {
        return $this->belongsTo(mnt_cliente_key::class,"id"); // rectificar mañana
    }

    public function mnt_json_cliente()
    {
        return $this->belongsTo(mnt_json_cliente::class,"id");
    }
}
