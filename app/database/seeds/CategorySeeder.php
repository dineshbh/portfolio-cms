<?php
 
class CategorySeeder extends Seeder {
 
    public function run()
    {
        for( $i = 1 ; $i <= 10 ; $i++ ) 
        {
            $post = new Category;
            $post->category = "Category $i";
            $post->save();
        }
    }
}