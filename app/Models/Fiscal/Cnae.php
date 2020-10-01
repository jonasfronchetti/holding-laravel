<?php

namespace App\Models\Fiscal;

use Illuminate\Database\Eloquent\Model;

class Cnae extends Model
{
    protected $table = 'fis_cnaes';

    protected $fillable = [
        'id',
        'descricao',
    ];

    //public function aplicacoes()
    //{
    //    return $this->hasMany(Produto::class);
    //}
}
