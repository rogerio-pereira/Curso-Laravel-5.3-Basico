<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Product;
use App\Http\Requests\Painel\ProductFormRequest;

//Criado com o comando
//php artisan make:controller Painel\\ProdutoController --resource
class ProdutoController extends Controller
{
    private $produto;
    private $totalPage = 3;

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
        $title = 'Listagem dos Produtos';

        //Exibe todos os itens
        //$products = $this->produto->all();
        
        //Exibe paginado
        $products = $this->produto->paginate($this->totalPage);

        return view('painel.products.index', compact('products', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Cadastrar novo Produto';
        $categories = ['eletronicos', 'moveis', 'limpeza', 'banho'];

        return view('painel.products.create-edit', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        //Todos os campos do formulario
        //dd($request->all());
        
        //Campos especificados
        //dd($request->only(['name', 'number']));
        
        //Exceto os campos especificado
        //dd($request->except(['_token', 'category']));
        
        //Campo específico
        //dd($request->input('name'));
        
        //Pega todos os campos do formularios
        $dataForm = $request->all();

        $dataForm['active'] = (!isset($dataForm['active'])) ? 0 : 1;

        //valida os dados
        //Pior forma
        //Pode se passar um array de mensagens de erros como é feito abaixo
        /*$validade = validator($dataForm, $this->produto->rules);

        if($validade->fails()) {
            return redirect()
                        ->route('produtos.create')
                        ->withErrors($validade)
                        ->withInput();
        }*/

        //Forma mais facil
        //Campo Messages não é obrigatorio
        //$this->validate($request, $this->produto->rules);
        //$this->validate($request, $this->produto->rules, $this->produto->messages);

        //Salva no banco
        $insert = $this->produto->create($dataForm);

        if($insert)
            return redirect()->route('produtos.index');
        else
            return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->produto->find($id);

        $title = "Produto: {$product->name}";

        return view('painel.products.show', compact('product', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Recuperando Produto
        $product = $this->produto->find($id);

        $title = "Editar Produto {$product->name}";

        $categories = ['eletronicos', 'moveis', 'limpeza', 'banho'];

        return view('painel.products.create-edit', compact('title', 'categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, $id)
    {
        //Recupera todos os dados do formulario
        $dataForm = $request->all();

        $dataForm['active'] = (!isset($dataForm['active'])) ? 0 : 1;

        //Recupera o item para edição
        $product = $this->produto->find($id);

        //Atualiza
        $update = $product->update($dataForm);

        //Verifica se realmente atualizou
        if($update)
            return redirect()->route('produtos.index');
        else
            return redirect()->route('produtos.edit', $id)->with(['errors' => 'Falha ao editar']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->produto->find($id);

        $delete = $product->delete();

        //Verifica se realmente atualizou
        if($delete)
            return redirect()->route('produtos.index');
        else
            return redirect()->route('produtos.show', $id)->with(['errors' => 'Falha ao deletar']);
    }

    public function tests()
    {
        //===========================================
        //INSERT
        //===========================================
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

            /*$insert = $this->produto->create([
                        'name'          => 'Nome do Produto 2',
                        'number'        => 434435,
                        'active'        => false,
                        'category'      => 'eletronicos',
                        'description'   => 'Descricao vem aqui',
                    ]);

            if($insert)
                return "Inserido com sucesso, ID: {$insert->id}";
            else
                return 'Falha ao inserir!';*/




        //===========================================
        //UPDATE
        //===========================================
            /*$prod = $this->produto->find(5);

            //debug
            //dd($prod);
            
            $prod->name = 'Update 2';
            $prod->number = 797890;

            $update = $prod->save();*/

            /*$prod = $this->produto->find(4);

            //Só funciona se tiver a variavel fillable
            $update = $prod->update([
                                        'name'      => 'Update teste',
                                        'number'    => 6765756,
                                        'active'    => true,
                                    ]);*/


            //tanto o update quanto o create podem serem encadeados ao find, por exemplo
            //Estou quebrando as linhas para demonstração que pode ser feito e para ficar legvel
            /*$update = $this->produto
                                 ->where('number', 67657560)
                                 ->where('active', '<>', true)
                                 ->update([
                                            'name'      => 'Update teste 2',
                                            'number'    => 676575606,
                                            'active'    => false,
                                        ]);

            if($update)
                return "Atualizado com sucesso";
            else
                return 'Falha ao atualizar!';*/




        //===========================================
        //DELETE
        //===========================================
            /*$prod = $this->produto->find(3);
            $delete = $prod->delete();*/

            //A diferença entre delete e destroy é que o destrou não precisar fazer o find
            //Pode ser passado também um array
            //$this->produto->destroy([3,4,5]);
            /*$delete = $this->produto->destroy(2);*/

            $delete = $this->produto
                                ->where('number', 797890)
                                ->delete();

            if($delete)
                return "Deletado com sucesso";
            else
                return 'Falha ao deletar!';
    }
}
