<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\ElseIf_;
use App\Models\Product;
use App\Models\Category;
use App\Models\empresa;
use App\Http\Controllers\ProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::post('/products' , function (Request $request) {
//     $product = new Product();
//     $product->name = $request->input('name');
//     $product->price = $request->input('price');
//     $product->description = $request->input('description' );
//     $product->category_id = $request->input('category_id' );
//     $product->empresa_id = $request->input('empresa_id' );

//     $product->save();
//     return response()->json($product);
// });


// Route::get('/products' , function () {
//     $products = Product::all();
//     return response()->json($products);
//    });

// Route::get('/products/{id}' , function ($id) {
//     $product = Product::find($id);
//     return response()->json($product);
//    });

Route::controller(ProductController::class)->group(function(){
    Route::get('/products' , 'get');
    Route::get('/products/{id}', 'details');
    Route::post('/products' , 'store');
    Route::patch('/product/{id}', 'update');
    Route::delete('/product/{id}', 'delete');

    
});

Route::patch('/products/{id}', function (Request $request, $id){
   $product = Product::find($id);

   if($request->input('name') !== null){
        $product->name = $request->input('name');
   }
   if($request->input('price') !== null){
    $product->price = $request->input('price');
}
    if($request->input('description') !== null){
        $product->description = $request->input('description');
}
    $product->save();
    return response()->json($product);
});




Route::post('/categories' , function (Request $request) {
    $category = new Category();
    $category->name = $request->input('name');
    $category->description = $request->input('description' );
    $category->save();
    return response()->json($category);
});

Route::get('/categories' , function () {
    $categories = Category::all();
    return response()->json($categories);
   });

Route::get('/products/category' , function () {
    $products = Product::with('category')->get();
    return response()->json($products);
   });

Route::get('/category/products' , function () {
    $categories = Category::with('products')->get();
    return response()->json($categories);
   });


 Route::get('/categories/products/{id}', function ($id) {
    $category = Category::find($id);
    $products = $category->products;
    return response()->json($products);
   });

Route::get('/products/category/{id}' , function ($id) {
    $product= Product::find($id);
    $category = $product->category;
    return response()->json($category);
   });









Route::get('/categories/{id}' , function ($id) {
    $category = Category::find($id);
    return response()->json($category);
   });

Route::patch('/products/{id}', function (Request $request, $id){
   $product = Product::find($id);

   if($request->input('name') !== null){
        $product->name = $request->input('name');
   }
   if($request->input('price') !== null){
    $product->price = $request->input('price');
}
    if($request->input('description') !== null){
        $product->description = $request->input('description');
}
    $product->save();
    return response()->json($product);
});

Route::patch('/categories/{id}', function (Request $request, $id){
    $category = Category::find($id);
 
    if($request->input('name') !== null){
         $category->name = $request->input('name');
}

     if($request->input('description') !== null){
         $category->description = $request->input('description');
 }
     $category->save();
     return response()->json($category);
 });




Route::delete('/categories/{id}', function ($id) {
    $category = Category::find($id);
    $category->products()->update(['category_id' => null]);
    $category->delete();
    return response()->json($category);
   });


   ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

   Route::post('/empresas' , function (Request $request) {
    $empresa = new Empresa();
    $empresa->razao_social = $request->input('razao_social');
    $empresa->nome_fantasia = $request->input('nome_fantasia' );
    $empresa->cnpj = $request->input('cnpj' );
    $empresa->save();
    return response()->json($empresa);
});

Route::get('/empresas' , function () {
    $empresa = Empresa::all();
    return response()->json($empresa);
   });

   Route::get('/empresas/{id}' , function ($id) {
    $empresa = Empresa::find($id);
    return response()->json($empresa);
   });

   Route::delete('/empresas/{id}' , function ($id) {
    $empresa = Empresa::find($id);
    $empresa->delete();
    return response()->json($empresa);
   });                          


