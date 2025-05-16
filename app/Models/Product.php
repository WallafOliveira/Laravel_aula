<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable =['name', 'price', 'description', 'category_id', 'empresa_id'];
    
    public function category(){
        return $this->belongsTo( Category::class, 'category_id', 'id' );
    }

    public function empresas(){
        return $this->belongsTo(Empresa::class,'empresa_id', 'id');
    }

}


