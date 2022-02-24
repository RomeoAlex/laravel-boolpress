<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    public function index(){

        $categories = Category::all();

        
        $data = [
            
            'categories' => $categories
        ];

        // view su index 
        return view('admin.categories.index', $data);
    }

    public function show($slug)
    {
        $category = Category::where('slug', '=', $slug)->first();
        $posts = $category->posts;
        // dd($category);
        // condizionale nel caso della categoria non trovata
        if (!$category) {
            abort('404');
        }
        $data = [
            'category' => $category,
            'posts' => $posts
        ];
        // controllare la route nuovo controller nuove cartelle view!!!
        return view('admin.categories.show', $data);
    }
}
