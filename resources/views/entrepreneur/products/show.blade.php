@extends('layouts.app')

@section('title', 'Catalogo de Productos')

@section('content')
    <div class="container">
        <h1>Producto</h1>

        <div class="row">
            <form action="{{route('entrepreneur.products.store')}}" class="row" method="POST">
                @csrf
                <div class="col-md-6">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese el nombre" value="{{$product->name}}">
                </div>
                <div class="col-md-6">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Ingrese una breve descripción">{{$product->description}}</textarea>
                </div>
                <div class="col-md-6">
                    <label for="price" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Ingrese el precio" value="{{$product->price}}">
                </div>
                <div class="col-md-6">
                    <label for="currency" class="form-label">Moneda</label>
                    <select class="form-select" id="currency" name="currency">
                        @foreach ($availableCurrencies as $currecy => $currencyName)
                            <option value="{{ $currecy }}" @selected($currecy === $product->currency)>{{ $currencyName }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="status" class="form-label">Estado</label>
                    <select class="form-select" id="status" name="status">
                        @foreach ($availableStatuses as $status => $statusName)
                            <option value="{{ $status }}" @selected($status === $product->status)>{{ $statusName }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="product_category_id" class="form-label">Categoria de Producto</label>
                    <select class="form-select" id="product_category_id" name="product_category_id">
                        @foreach ($productsCategories as $category)
                            <option value="{{ $category->id }}" @selected($category->id === $product->product_category_id)>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>

            </form>
        </div>
        <div class="row">
            <h4>Subir Archivo</h4>
            <form action="{{route('entrepreneur.products.files.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <input type="file" name="file" id="file">

                <button type="submit" class="btn btn-primary">Subir Archivo</button>
            </form>
        </div>
        <div class="row">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>Nombre del Archivo</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        @foreach ($product->files as $file)
                            <tr>
                                <td>
                                    <img src="{{ $file->file_url }}" alt="" srcset="">
                                </td>
                                <td>
                                   
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection