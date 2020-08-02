<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $find = $request->find;

        if($find){
            $categories = Category::where('nombre', 'like', '%'. $find .'%')->paginate(5);
            return $categories;
        }

        $categories = Category::paginate(5);
        return $categories;
    }

    public function store(Request $request)
    {
        Category::create($request->all());
    }

    public function update(Request $request)
    {
        $category = Category::find($request->id);
        $category->update($request->all());
    }

    public function desactivate(Request $request){
        $category = Category::find($request->id);
        $category->condicion = 0;
        $category->save();
    }

    public function active(Request $request){
        $category = Category::find($request->id);
        $category->condicion = 1;
        $category->save();
    }
}
