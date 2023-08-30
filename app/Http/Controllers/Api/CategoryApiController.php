<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Models\Category;
use App\Models\product_category;

class CategoryApiController extends Controller
{
    public function index() {
        $data = Category::all();
        return view('categories.index', compact('data'));
    }

    public function create() {
        return view('categories.create');
    }

    public function store() {
        $data = \request()->validate([
            'name' => 'string'
        ]);
        Category::create($data);
        return redirect()->route('category.index');
    }

    public function createCategory(StoreCategoryRequest $request) {
        $data = $request->validated();
        $category = new Category($data);
        return $this->sendResponse($category->save(), 'Category successful created!');
    }

    public function deleteCategory(int $category_id) {
        try {
            $category = Category::findOrFail($category_id);

            if (!empty(product_category::where('category_id', $category))) {
                throw new \Exception('Link between category and product still exists!');
            } else {
                $category->delete();
            }
        } catch (\Exception $exception) {
            $this->sendError($exception, $exception->getMessage());
        }

        return $this->sendResponse(true,'Category with id = ' . $category_id . ' successful deleted!');
    }
}
