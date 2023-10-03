<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mnt_json_cliente extends Model
{
    use HasFactory;
    protected $casts = [
        'json' => 'array',
    ];
    protected $table="mnt_json_cliente";

    protected $fillable=[
        'json',
        'id_cliente',
    ];

    public function mnt_cliente()
    {
        return $this->belongsTo(mnt_cliente::class);
    }

    public function mnt_json_cliente_permisos()
    {
        return $this->hasMany(mnt_json_cliente_permisos::class);
    }
}
