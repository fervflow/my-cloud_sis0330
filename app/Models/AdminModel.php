<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    //
    use HasFactory;

    protected $table = 'admins';
    protected $primaryKey = 'id_admin';
    public $incrementing = false;
    protected $keyType = 'unsignedBigInteger';

    protected $fillable = [
        'id_admin',
    ];

    public function usuario()
    {
        return $this->belongsTo(UsuarioModel::class, 'id_admin', 'id');
    }
}
