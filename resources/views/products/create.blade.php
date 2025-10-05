@extends('layouts.app')

@section('title', 'Crear Producto')

@section('content')
    <h2>Crear Nuevo Producto</h2>

    @if($errors->any())
        <ul class="errors-list">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <div>
            <label for="name">Nombre *</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required maxlength="255" />
        </div>

        <div>
            <label for="description">Descripción</label>
            <textarea id="description" name="description" rows="4">{{ old('description') }}</textarea>
        </div>

        <div>
            <label for="price">Precio (€) *</label>
            <input type="number" id="price" name="price" value="{{ old('price') }}" step="0.01" min="0" required />
        </div>

        <input type="submit" value="Guardar Producto" />
        <a href="{{ route('products.index') }}" class="btn" style="background-color: #7f8c8d; margin-left: 10px;">Cancelar</a>
    </form>
@endsection
