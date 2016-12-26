<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Product;

//Criado com o comando
//php artisan make:controller Painel\\ProdutoController --resource
class ProdutoController extends Controller
{
    private $produto;

    public function __construct(Product $product)
    {
        $this->produto = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->produto->all();        

        return view('painel.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function tests()
    {
        /*$prod = $this->produto;
        $prod->name = 'Nome do Produto';
        $prod->number = 131231;
        $prod->active = true;
        $prod->category = 'eletronicos';
        $prod->description = 'Descricao do produto aqui';

        $insert = $prod->save();*/

        /*
        NUNCA USAR ->insert(...);
        Deixa em risco sua aplicação.
        Usar ao invés de insert create (abaixo)
        Quando usar o create é preciso preencher o fillable

        $insert = $this->produto->insert([
                    'name'          => 'Nome do Produto 2',
                    'number'        => 434435,
                    'active'        => false,
                    'category'      => 'eletronicos',
                    'description'   => 'Descricao vem aqui',
                ]);*/

        $insert = $this->produto->create([
                    'name'          => 'Nome do Produto 2',
                    'number'        => 434435,
                    'active'        => false,
                    'category'      => 'eletronicos',
                    'description'   => 'Descricao vem aqui',
                ]);

        if($insert)
            return "Inserido com sucesso, ID: {$insert->id}";
        else
            return 'Falha ao inserir!';
    }
}
