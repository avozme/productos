@extends('layouts.app')

@section('title', 'Detalle Producto')

@section('content')
    <h2>Producto: {{ $product->name }}</h2>

    <p><strong>ID:</strong> {{ $product->id }}</p>
    <p><strong>Descripción:</strong></p>
    <p style="white-space: pre-line;">{{ $product->description ?: 'Sin descripción' }}</p>
    <p><strong>Precio:</strong> €{{ number_format($product->price, 2) }}</p>

    <a href="{{ route('products.edit', $product) }}" class="btn">Editar</a>
    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Seguro que quieres eliminar este producto?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn" style="background-color:#c0392b;">Eliminar</button>
    </form>
    <a href="{{ route('products.index') }}" style="margin-left:10px;">Volver al listado</a>
@endsection
