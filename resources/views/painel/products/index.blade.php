<h1>Listagem de produtos</h1>

<table>
    <tr>
        <th>Nome</th>
        <th>Descricao</th>
    </tr>

    @foreach ($products as $product)
        <tr>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
        </tr>    
    @endforeach
</table>