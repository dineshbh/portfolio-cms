<?php
 
class CategorySeeder extends Seeder {
 
    public function run()
    {
        for( $i = 1 ; $i <= 10 ; $i++ ) 
        {
            $category = new Category;
            $category->category = "Category $i";
            $category->save();
        }
    }
}