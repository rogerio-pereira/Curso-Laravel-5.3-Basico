<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function __construct()
    {
        //Middleware para todos os métodos
        //$this->middleware('auth');
        
        //Middleware para somente os métodos especificados
        /*$this->middleware('auth')->only([
                                            'contato',
                                            'categoria'
                                        ]);*/

        //Middleware para todos os métodos exceto os especificados
        /*$this->middleware('auth')->except([
                                            'index',
                                            'contato'
                                        ]);*/
    }

    public function index()
    {
        $teste = 123;
        $teste2 = 321;
        $teste3 = 213;

        //Passando variaveis para view MODO 1
        /*return view(
                        'teste',                    //Nome da View
                        [                           //Array de variaveis
                            'teste' => $teste, 
                            'teste2' => $teste2, 
                            'teste3' => $teste3
                        ]
                    );*/
        


        //Passando variaveis para view MODO 2
        /* 
            array compact ( mixed $varname [, mixed $... ] )
            
            Cria um array contendo variáveis e seus valores.

            Para cada um dos parâmetros passados, compact() procura uma variável com o nome especificado na tabela de símbolos e a adiciona no array de saída de forma que o nome da variável será a chave e o seu conteúdo será o valor para esta chave
        */
        return view('site.home.teste', compact('teste', 'teste2', 'teste3'));
    }

    public function contato()
    {
        return 'Pg Contato';
    }

    public function categoria($id)
    {
        return "Listagem de posts da categoria: {$id}";
    }

    public function categoriaOp($id = 1)
    {
        return "Listagem de posts da categoria: {$id}";
    }
}
