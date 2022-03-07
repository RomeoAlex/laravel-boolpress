<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// devo richiamare post model per sulg?! NO HO IL MODEL TAG
use App\Tag;
class TagController extends Controller
{
    //utiliziamo lo slug
    public function show($slug){
        // http://127.0.0.1:8000/api/tags/cultura
        // dd($slug);
        // USO WITH PER AGGIUNGERE RELAZIONI ALLA API
        $tag = Tag::where('slug', '=', $slug)->with(['posts'])->first();
        if($tag){
            return response()->json([
                // ATTENZIONE ALLA SINTASSI!!!
                'success' => true,
                'results' => $tag
            ]);
        }else{
            return response()->json([
                // ATTENZIONE ALLA SINTASSI!!!
                'success' => false,
                'results' => []
            ]);
        }
        
    }
}
