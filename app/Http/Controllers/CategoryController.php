<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
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
    
    public function postCreate(CategoryRequest $request) {
        $request->validate([
            'name' => 'required|min:6|max:32',
        ]);
        $data = new Category();
        $data->fill($request->all());
        $data->save();
        session()->flash('success', 'Bạn đã tạo thành công!');
        return redirect()->route('admin.categorys.list');
    }
    public function delete(Category $id)
    {
        if ($id->delete()) {
            session()->flash('success', 'Bạn xóa thành công!');
            return redirect()->back();
        }
    }

    public function edit(Category $id){
        return view('admin.category.edit', ['category' => $id]);
    }

    public function update(CategoryRequest $request){
        $request->validate([
            'name' => 'required|min:6|max:32',
        ]);
        $data = Category::find($request->id);
        $data->update(['name' => $request->name]);
        session()->flash('success', 'Bạn Cập nhật thành công!');
        return redirect()->route('admin.categorys.list');

    }
}
