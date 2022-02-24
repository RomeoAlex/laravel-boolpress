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
}
