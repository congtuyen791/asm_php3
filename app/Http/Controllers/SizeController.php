<?php

namespace App\Http\Controllers;

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
    
    public function postCreate(Request $request) {
        $data = new Size();
        $data->fill($request->all());
        $data->save();
        return redirect()->route('admin.size.list');
    }
    public function delete(Size $id)
    {
        if ($id->delete()) {
            return redirect()->back();
        }
    }

    public function edit(Size $id){
        return view('admin.size.edit', ['size' => $id]);
    }

    public function update(Request $request){
        $data = Size::find($request->id);
        $data->update(['name' => $request->name]);
        return redirect()->route('admin.size.list');
    }
}
