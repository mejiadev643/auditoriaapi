<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ctl_tipo_bitacora extends Model
{
    use HasFactory;
    protected $table="ctl_tipo_bitacora";

    protected $fillable=[
        'nombre',
    ];

    public function mnt_bitacora()
    {
        return $this->hasMany(mnt_bitacora::class,"id");
    }

}
