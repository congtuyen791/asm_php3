<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categorys = Category::all();
        return view('admin.category.list', ['category_list' => $categorys]);
    }
}
