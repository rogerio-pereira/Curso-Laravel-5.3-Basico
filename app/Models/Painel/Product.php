<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //Quais itens podem ser inseridos
    protected $fillable = ['name', 'number', 'active', 'category', 'description'];

    //Contrario ao fillable, vc diz qual não pode
    //protected $guarded = [];
}
