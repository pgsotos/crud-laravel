@extends('layout')

@section('content')
    <div class="col-sm-8">
        <h2>
            Listado de productos
            <a href="{{ route('products.create') }}" class="btn btn-primary pull-right">Nuevo</a>
        </h2>
        @include('products.fragment.info')
        <table class="table table-hover table-striped">
            <thread>
                <tr>
                    <th width="20px">ID</th>
                    <th>Nombre del producto</th>
                    <th colspan="3">&nbsp;</th>
                </tr>
            </thread>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td><strong>{{ $product->name }}</strong>
                        {{ $product->short }}
                    </td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-link">Ver</a>
                    </td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-link">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('products.destroy', $product->id) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-link">Borrar</button>

                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $products->render() !!}
    </div>
    <div class="col-sm-4">
        @include('products.fragment.aside')
    </div>
@endsection