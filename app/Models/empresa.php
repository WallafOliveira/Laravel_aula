<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class empresa extends Model
{
    protected $table = 'empresas';
    protected $fillable =['$razao_social', 'nome_fantasia', 'cnpj'];

    public function product(){
        return $this->hasMany(Product::class, 'empresa_id', 'id');
    }
}
