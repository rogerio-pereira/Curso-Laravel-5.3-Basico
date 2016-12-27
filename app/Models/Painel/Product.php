<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //Quais itens podem ser inseridos
    protected $fillable = ['name', 'number', 'active', 'category', 'description'];

    //Contrario ao fillable, vc diz qual não pode
    //protected $guarded = [];
    
    public $rules = [
                        'name'          => 'required|min:3|max:100',
                        'number'        => 'required|numeric',
                        'category'      => 'required',
                        'description'   => 'min:3|max:1000'
                    ];
}
