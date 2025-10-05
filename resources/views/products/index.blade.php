@extends('layouts.app')

@section('title', 'Listado de Productos')

@section('content')
    <h2>Listado de Productos</h2>

    @if($products->isEmpty())
        <p>No hay productos disponibles.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio (€)</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></td>
                    <td>{{ Str::limit($product->description, 50) }}</td>
                    <td>{{ number_format($product->price, 2) }}</td>
                    <td>
                        <a class="btn" href="{{ route('products.edit', $product) }}">Editar</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn" style="background-color:#c0392b;">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
