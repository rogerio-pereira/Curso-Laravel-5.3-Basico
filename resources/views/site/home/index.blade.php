@extends('site.template.template1')

@section('content')
    <h1>Home Page do Site</h1>

    {{$teste1}} - {{$teste2}} - {{$teste3}}

    {{$var1 or 'Não existe'}}

    Não imprime o conteudo da variavel
    {{$xss}}

    Imprime conteudo da variavel
    {!! $xss !!}
@endsection