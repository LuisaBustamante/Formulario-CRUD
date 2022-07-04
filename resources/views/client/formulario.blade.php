@extends('theme.header')
@section('content')
    <div class="container py-5 text-center">
        @if (isset($client))
            <h1 class="text-center">Editar productos</h1>
        @else
            <h1 class="text-center">Crear productos</h1>
        @endif

        @if (isset($client))
            <form action="{{ route('client.update', $client) }}" method="post">
                @method('PUT')
            @else
                <form action="{{ route('client.store') }}" method="post">
        @endif

        @csrf
        <div class="mb-3">
            <label for="sku" class="form-label">SKU</label>
            <input type="text" name="sku" class="form-control" placeholder="SKU"
                value="{{ old('sku') ?? @$client->sku }}">
            <p class="form-text">Escriba el código de referencia del producto</p>
            @error('sku')
                <p class="form text text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" class="form-control" placeholder="Nombre"
                value="{{ old('name') ?? @$client->name }}">
            <p class="form-text">Escriba el nombre del producto</p>
            @error('name')
                <p class="form text text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Cantidad</label>
            <input type="number" name="amount" class="form-control" placeholder="Cantidad" 
                value="{{ old('amount') ?? @$client->amount }}">
            <p class="form-text">Escriba la cantidad de producto</p>
            @error('amount')
                <p class="form text text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Precio</label>
            <input type="number" name="price" class="form-control" placeholder="Precio " step="0.01"
                value="{{ old('price') ?? @$client->price }}">
            <p class="form-text">Escriba el precio del producto</p>
            @error('price')
                <p class="form text text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <input type="text" name="description" class="form-control" placeholder="Descripción" 
                value="{{ old('description') ?? @$client->description }}">
            <p class="form-text">Escriba algunos comentarios</p>
            @error('description')
                <p class="form text text-danger">{{ $message }}</p>
            @enderror

        </div>
        @if (isset($client))
            <button type="submit" class="btn btn-primary">Editar producto</button>
        @else
            <button type="submit" class="btn btn-primary">Guardar producto</button>
        @endif

    </div>
@endsection
