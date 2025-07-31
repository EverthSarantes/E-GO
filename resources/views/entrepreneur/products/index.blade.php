@extends('layouts.app')

@section('title', 'Catalogo de Productos')

@section('content')
    <div class="container">
        <h1>Catalogo de Productos</h1>

        <div class="row">
            <form action="{{route('entrepreneur.products.store')}}" class="row" method="POST">
                @csrf
                <div class="col-md-6">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese el nombre">
                </div>
                <div class="col-md-6">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Ingrese una breve descripción"></textarea>
                </div>
                <div class="col-md-6">
                    <label for="price" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Ingrese el precio">
                </div>
                <div class="col-md-6">
                    <label for="currency" class="form-label">Moneda</label>
                    <select class="form-select" id="currency" name="currency">
                        @foreach ($availableCurrencies as $currecy => $currencyName)
                            <option value="{{ $currecy }}">{{ $currencyName }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="status" class="form-label">Estado</label>
                    <select class="form-select" id="status" name="status">
                        @foreach ($availableStatuses as $status => $statusName)
                            <option value="{{ $status }}">{{ $statusName }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="product_category_id" class="form-label">Categoria de Producto</label>
                    <select class="form-select" id="product_category_id" name="product_category_id">
                        @foreach ($productsCategories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="table-responsive">
                <form action="{{ route('admin.products.categories.index') }}" method="GET" class="mb-3">
                    <label for="search" class="form-label">Buscar</label>
                    <input type="text" class="form-control" id="search" name="search" placeholder="Buscar por nombre o descripción">
                    <select name="type" id="type">
                        <option value="1">Exacta</option>
                        <option value="2">Similar</option>
                    </select>
                </form>
                <table class="table">
                    <thead>
                        <th>
                            <strong>Nombre</strong>
                        </th>
                        <th>
                            <strong>Descripción</strong>
                        </th>
                        <th>
                            <strong>Precio</strong>
                        </th>
                        <th>
                            <strong>Opciones</strong>
                        </th>
                        
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->formatted_price }}</td>
                                <td>
                                    <form action="{{ route('entrepreneur.products.delete', $product) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                    <a href="{{ route('entrepreneur.products.show', $product) }}" class="btn btn-info">Ver</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
