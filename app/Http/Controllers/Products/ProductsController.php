<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products\Product;
use App\Models\Products\ProductCategory;
use App\Models\Products\ProductFile;
use App\Http\Services\FileServices;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function index()
    {
        $availableStatuses = Product::$availableStatuses;
        $availableCurrencies = Product::$availableCurrencies;
        $productsCategories = ProductCategory::all();
        $products = Product::with('productCategory')->paginate(10);

        return view('entrepreneur.products.index', compact('availableStatuses', 'availableCurrencies', 'productsCategories', 'products'));
    }

    public function show(Product $product)
    {
        $availableStatuses = Product::$availableStatuses;
        $availableCurrencies = Product::$availableCurrencies;
        $productsCategories = ProductCategory::all();

        return view('entrepreneur.products.show', compact('availableStatuses', 'availableCurrencies', 'productsCategories', 'product'));
    }

    public function store(Request $request)
    {
        

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->currency = $request->currency;
        $product->status = $request->status;
        $product->entrepreneurship_id = $request->entrepreneurship_id;
        $product->product_category_id = $request->product_category_id;

        if($product->save()) {
            return redirect()->route('entrepreneur.products.index')->with('success', 'Producto creado exitosamente.');
        }
        return redirect()->back()->with('error', 'Error al crear el producto. Por favor intenta nuevamente.');
    }

    public function delete(Product $product)
    {
        if ($product->delete()) {
            return redirect()->route('entrepreneur.products.index')->with('success', 'Producto eliminado exitosamente.');
        }
        return redirect()->back()->with('error', 'Error al eliminar el producto. Por favor intenta nuevamente.');
    }

    public function addFile(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'file' => 'required',
        ]);

        $original_file_name = FileServices::getFileName($request->file);
        $file_extension = FileServices::getFileExtension($request->file);
        $new_file_name = FileServices::makeSafeFileName(Auth::user()->name, $file_extension, $request->file);



        $productFile = new ProductFile();
        $productFile->product_id = $request->product_id;
        $productFile->file_name = $new_file_name;
        $productFile->original_file_name = $original_file_name;
        $productFile->file_type = $file_extension;

        $productFile->save();

        FileServices::saveFile(Auth::user()->name, $new_file_name, $request->file);

        return redirect()->route('entrepreneur.products.show', Product::find($request->product_id))->with('success', 'Archivo agregado exitosamente.');
    }
}
