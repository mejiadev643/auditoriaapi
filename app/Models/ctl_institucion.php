<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ctl_institucion extends Model
{
    use HasFactory;
    protected $table="ctl_institucion";

    protected $fillable=[
        'nombre',
        'descripcion',
    ];

    public function mnt_sistema()
    {
        return $this->hasMany(mnt_sistema::class);
    }

    public function mnt_cliente()
    {
        return $this->hasMany(mnt_cliente::class);
    }

}
