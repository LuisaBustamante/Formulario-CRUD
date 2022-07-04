@extends('theme.header')
@section('content')
    <div class="container py-5 text-center">
        <div class="container mt-4">
            <div class="row">
                <!---  <div class="mb-4 d-flex justify-content-end">-->
                <div class="col-md-8">
                    <h2 class="text-center">Lista productos</h2>
                </div>
                <div class="col-md-4">
                    <div class="mb-4 d-flex justify-content-end">
                        <a href="{{ route('download-pdf') }}" class="btn btn-success">PDF</a>
                    </div>
                    <div class="mb-4 d-flex justify-content-end">
                        <a href="{{ route('client.create') }}" class="btn btn-primary"> Crear Producto</a>
                    </div>
                </div>
            </div>
            @if (Session::has('mensaje'))
                <div class="alert alert-info my-5">
                    {{ Session::get('mensaje') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th>SKU</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                            @forelse ($clients as $detail)
                                <tr>
                                    <td>{{ $detail->sku }}</td>
                                    <td>{{ $detail->name }}</td>
                                    <td>{{ $detail->amount }}</td>
                                    <td>{{ $detail->price }}</td>
                                    <td>{{ $detail->description }}</td>
                                    <td>
                                        <a href="{{ route('client.edit', $detail) }}" class="btn btn-warning">Editar</a>
                                        <form action="{{ route('client.destroy', $detail) }}" method="post"
                                            class="d-inline">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Estas seguro de eliminar este producto')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">No hay registros</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @if ($clients->count())
            {{ $clients->links() }}
        @endif
        <style>
            table {
                border-collapse: collapse;
                margin:0 auto;
            }

            td {
                border: 1px solid #e2e2e2;
                padding: 5px;
                max-width: 100px;
                word-wrap: break-word;
            }

        </style>
    @endsection
