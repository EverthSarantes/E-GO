@extends('layouts.app')

@section('title', 'Catalogo de Productos')

@section('content')
    <div class="container">
        <h1>Categoria de Productos {{$productCategory->productCategory}}</h1>

        <div class="row">
            <form action="{{route('admin.products.categories.update', $productCategory)}}" class="row" method="POST">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <label for="name" class="form-label">Nombre de la Categoria</label>
                    <input type="text" value="{{ $productCategory->name }}" class="form-control" id="name" name="name" placeholder="Ingrese el nombre de la categoria">
                </div>
                <div class="col-md-6">
                    <label for="description" class="form-label">Descripción</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Ingrese una breve descripción">{{ $productCategory->description }}</textarea>
                </div>
                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-primary">Editar Categoria</button>
                </div>
            </form>
        </div>
    </div>
@endsection