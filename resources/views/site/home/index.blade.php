@extends('site.template.template1')

@section('content')
    <h1>Home Page do Site</h1>

    {{$teste1}} - {{$teste2}} - {{$teste3}}

    {{$var1 or 'Não existe'}}

    <!--Não imprime o conteudo da variavel-->
    {{$xss}}

    <!--Imprime conteudo da variavel-->
    {!! $xss !!}


    @if($var1 == '123')
        <p>É igual</p>
    @elseif($var1 == '1234')
        <p>É igual 2</p>
    @else
        <p>É diferente</p>
    @endif


    <!--Ao contrario do if... Verifica se a condigção é falsa-->
    @unless($var1 == '1234')
        <p>Não é igual</p>
    @endunless

    <!--FOR-->
    @for ($i = 0; $i < 10; $i++)
        <p>Valor for: {{$i}}</p>
    @endfor

    <!--Foreach-->
    @if(count($arrayData > 0))
        @foreach ($arrayData as $data)
            <p>Valor foreach: {{$data}}</p>   
        @endforeach
    @else
        <p>Não existe itens para serem impressos</p>
    @endif

    <!--Forelse-->
    @forelse ($arrayData2 as $data)
        <p>Valor forelse: {{$data}}</p> 
    @empty
        <p>Não existe itens para serem impressos</p>
    @endforelse

    {{--
        comentario de sistemas de blade
    --}}

    {{--NUNCA usar na VIEW pq quebra o MVC--}}
    @php
        echo 'tag php';
    @endphp

    @include('site.include.sidebar', compact('var1'));
@endsection

{{--Arquivo scripts--}}
@push('scripts')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
@endpush