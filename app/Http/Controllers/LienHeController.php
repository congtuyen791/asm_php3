<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\LienHe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LienHeController extends Controller
{
    public function index() {
        $data = LienHe::select('id', 'title', 'content', 'user_id')->with('users')->paginate(10);
        // dd($data);
        return view('admin.lien-he.list', ['list' => $data]);
    }
    public function create(ClientRequest $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|min:6|max:32',
            'content' => 'required|min:10|max:100',
        ]);
        $data = new LienHe();
        $data->fill($request->all());
        $data->user_id = Auth::user()->id;
        $data->save();
        return view('clients.contact');
    }
    public function delete(LienHe $id)
    {
        if ($id->delete()) {
            return redirect()->back();
        }
    }
}
