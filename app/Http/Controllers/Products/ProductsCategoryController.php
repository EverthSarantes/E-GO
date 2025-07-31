<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Products\Product;
use Illuminate\Http\Request;
use App\Models\Products\ProductCategory;

class ProductsCategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = ProductCategory::query();

        $comparisonType = 'like';
        if($request->type == 1) {
            $comparisonType = '=';
        } elseif($request->type == 2) {
            $comparisonType = 'like';

        }

        if ($request->filled('search')) {
            $query->where('name', $comparisonType, $comparisonType == 'like' ? '%' . $request->input('search') . '%' : $request->input('search'))
                  ->orWhere('description', $comparisonType, $comparisonType == 'like' ? '%' . $request->input('search') . '%' : $request->input('search'));
        }
    


        $productsCategories = $query->paginate(1);

        return view('admin.productsCategories.index', compact('productsCategories'));
    }

    public function show(ProductCategory $productCategory)
    {
        return view('admin.productsCategories.show', compact('productCategory'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $productCategory = new ProductCategory();
        $productCategory->name = $request->name;
        $productCategory->description = $request->description;

        if($productCategory->save()) {
            return redirect()->route('admin.products.categories.index')->with('success', 'Categoría de producto creada exitosamente.');
        } else {
            return redirect()->back()->with('error', 'Error al crear la categoría de producto.');
        }
    }

    public function update(Request $request, ProductCategory $productCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $productCategory->name = $request->name;
        $productCategory->description = $request->description;

        if($productCategory->save()) {
            return redirect()->route('admin.products.categories.index')->with('success', 'Categoría de producto actualizada exitosamente.');
        } else {
            return redirect()->back()->with('error', 'Error al actualizar la categoría de producto.');
        }
    }

    public function delete(ProductCategory $productCategory)
    {
        if($productCategory->delete()) {
            return redirect()->route('admin.products.categories.index')->with('success', 'Categoría de producto eliminada exitosamente.');
        } else {
            return redirect()->back()->with('error', 'Error al eliminar la categoría de producto.');
        }
    }
}
