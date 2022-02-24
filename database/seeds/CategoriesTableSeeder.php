<?php

use Illuminate\Database\Seeder;

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
    }
}
