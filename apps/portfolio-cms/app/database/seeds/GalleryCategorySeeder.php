<?php
 
class GalleryCategorySeeder extends Seeder {
 
    public function run()
    {
            $category = new Gallery_Category;
            $category->category = "Páginas Web";
            $category->save();

            $category = new Gallery_Category;
            $category->category = "Aplicaciónes y Plugins";
            $category->save();

            $category = new Gallery_Category;
            $category->category = "Web Video";
            $category->save();

            $category = new Gallery_Category;
            $category->category = "Videos Corporativos";
            $category->save();

            $category = new Gallery_Category;
            $category->category = "Televisón";
            $category->save();
    }
}