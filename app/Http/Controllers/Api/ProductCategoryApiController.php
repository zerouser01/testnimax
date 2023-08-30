<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\product_category;
use Illuminate\Support\Facades\DB;

class ProductCategoryApiController extends Controller
{
    public function index() {
        $data = product_category::all();
        return view('productcategories.index', compact('data'));
    }

    public static function getAllCategory (int $productid) {
        $data = product_category::all()
            ->where('product_id', '=', $productid);
        $result = [];

        foreach ($data as $category) {
            $result[] =  DB::table('categories')->find($category->category_id)->name;
        }

        return $result;
    }
}
