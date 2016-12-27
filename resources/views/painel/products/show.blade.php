@extends('painel.templates.template')

@section('content')
    <h1 class='title-pg'>
        <a href='{{route('produtos.index')}}'><span class='glyphicon glyphicon-fast-backward'></span></a>
        Produto: <strong>{{$product->name}}</strong>
    </h1>

    <p><strong>Ativo:</strong> {{$product->active}}</p>
    <p><strong>Número:</strong> {{$product->number}}</p>
    <p><strong>Categoria:</strong> {{$product->category}}</p>
    <p><strong>Descricao:</strong> {{$product->description}}</p>

    <hr>

    @if(isset($errors) && count($errors) > 0)
        <div class='alert alert-danger'>
            @foreach ($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif

    {!! Form::open(['route' => ['produtos.destroy', $product->id], 'method' => 'delete']) !!}
        {!! Form::submit("Deletar Produto: {$product->name}", ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@endsection