<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categorys = Category::select('id', 'name')->orderBy('id', 'desc')->get();
        return view('admin.category.list', ['category_list' => $categorys]);
    }

    public function getCreate() {
        return view('admin.category.create');
    }
    
    public function postCreate(Request $request) {
        $data = new Category();
        $data->fill($request->all());
        $data->save();
        return redirect()->route('admin.categorys.list');
    }
    public function delete(Category $id)
    {
        if ($id->delete()) {
            return redirect()->back();
        }
    }

    public function edit(Category $id){
        return view('admin.category.edit', ['category' => $id]);
    }

    public function update(Request $request){
        $data = Category::find($request->id);
        $data->update(['name' => $request->name]);
        return redirect()->route('admin.categorys.list');

    }
}
