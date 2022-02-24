<?php

use Illuminate\Database\Seeder;
use App\Category;
// per slug bisogna importare la funzione di supporto
use Illuminate\Support\Str;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // in questo seeder al posto di utilizzare faker facciamo un array
        $categories = [
            
            'attualità',
            'gossip',
            'medicina',
            'scienza',
            'tecnologia'
        ];
        // con foreach andrò a riempire la tabella
        foreach ($categories as $category) {
            $new_category = new Category();
            $new_category->name = $category;
            $new_category->slug = Str::slug($category);
            $new_category->save();
        }
    }
}
