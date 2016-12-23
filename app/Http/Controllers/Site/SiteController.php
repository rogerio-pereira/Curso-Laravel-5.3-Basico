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
        return 'Home Page do Site';
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
