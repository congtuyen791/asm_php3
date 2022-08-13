<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index() {
        $size = Size::select('id', 'name')->orderBy('id', 'desc')->get();
        return view('admin.size.list', ['size_list' => $size]);
    }

    public function getCreate() {
        return view('admin.size.create');
    }
    
    public function postCreate(CategoryRequest $request) {
        $request->validate([
            'name' => 'required|min:6|max:32',
        ]);
        $data = new Size();
        $data->fill($request->all());
        $data->save();
        session()->flash('success', 'Tạo mới thành công!');
        return redirect()->route('admin.size.list');
    }
    public function delete(Size $id)
    {
        if ($id->delete()) {
            session()->flash('success', 'Xóa thành công!');
            return redirect()->back();
        }
    }

    public function edit(Size $id){
        return view('admin.size.edit', ['size' => $id]);
    }

    public function update(CategoryRequest $request){
        $request->validate([
            'name' => 'required|min:6|max:32',
        ]);
        $data = Size::find($request->id);
        $data->update(['name' => $request->name]);
        session()->flash('success', 'Cập nhật thành công!');
        return redirect()->route('admin.size.list');
    }
}
