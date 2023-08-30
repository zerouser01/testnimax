<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\GetProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\product_category;
use Illuminate\Http\JsonResponse;

class ProductApiController extends Controller
{
    public function index() {
        $data = Product::all();
        return view('products.index', compact('data'));
    }

    public function create() {
        return view('products.create');
    }

    public function store() {

        $data = \request()->validate([
                'name' => 'string',
                'description' => 'string',
                'price' => 'integer',
            ]);
        $data['is_published'] =  \request()->has('is_published');
        $data['is_deleted'] = false;
        Product::create($data);
        return redirect()->route('products.index');
    }

    public function createProduct(GetProductRequest $request) : JsonResponse {
        $data = $request->validated();
        $product = new Product([
            'name' => $data['name'],
            'description' => $data['description'],
            'price' => $data['price'],
            'is_published' => $data['is_published'],
            'is_deleted' => $data['is_deleted'],
        ]);
        $product->save();
        $category = explode(',', $data['categories']);

        foreach ($category as $item) {
            $link = new product_category([
                'product_id' => $product->id,
                'category_id' => $item,
            ]);
            $link->save();
        }

        return $this->sendResponse(ProductResource::collection($product), 'horosho');
    }

    public function updateProduct($product_id, UpdateProductRequest $request) : JsonResponse{
        try {
            $product = Product::findOrFail($product_id);
            $data = $request->validated();
            $product->name = $data['name'];
            $product->description = $data['description'];
            $product->price = $data['price'];
            $product->save();
        } catch (\Exception $exception) {
            return $this->sendError($exception, $exception->getMessage());
        }

        return $this->sendResponse($product, 'Product has been successfull updated!');
    }

    public function deleteProduct($product_id) {
        $product = Product::first($product_id);
        $product->update([
            'is_deleted' => true
        ]);

        return $this->sendResponse($product, 'Product has been deleted!');
    }

    public function getProducts() : JsonResponse {
        $return = [];

        if (\request()->has('name')) {
            $return = Product::where('name', 'LIKE', '%' . \request()->name . '%')->get();
        }

        if (\request()->has('category_id')) {
            $return = Product::whereHas('categories', function ($querry) {
                $querry->where('category_id', request()->category_id);
            })->get();
        }

        if (\request()->has('category_name')) {
            $return = Product::whereHas('product_category.category', function ($querry) {
                $querry->where('name', 'LIKE', '%' . \request()->category_name . '%');
            })->get();
        }

        if (\request()->has('prices')) {
            $price = explode(',', request()->prices);
            $return = Product::whereBetween('price', [$price[0], $price[1]])->get();
        }

        if(\request()->has('is_published')) {
            $return = Product::where('is_published', request()->is_published)->get();
        }

        if (\request()->has('is_deleted')) {
            $return = Product::where('is_deleted', request()->is_deleted)->get();
        }

        if (empty(request()->all())) {
            $return = Product::all();
        }

        return $this->sendResponse(ProductResource::collection($return), 'Enjoy!');
    }
}
