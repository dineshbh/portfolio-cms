<?php
 
class GallerySeeder extends Seeder {
 
    public function run()
    {
        $image_text = '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
        Maecenas molestie dolor eu massa semper, vitae lobortis magna elementum. 
        Vestibulum luctus urna tellus, id pretium tellus consequat blandit. 
        Etiam in vehicula ex. Quisque vestibulum non mi in sagittis. Proin commodo leo ac pellentesque bibendum. 
        Nulla convallis euismod arcu vel malesuada. Aliquam ornare lacinia nunc, a facilisis massa scelerisque et. 
        Integer scelerisque iaculis eros id scelerisque. Nullam eget mattis arcu. 
        Integer viverra sed est id tristique. Morbi bibendum rhoncus nisi id convallis. 
        Suspendisse aliquam sem eu mollis venenatis. Suspendisse sed ultrices est. 
        Nam porta purus sapien, molestie dapibus purus dignissim in. 
        Quisque efficitur congue efficitur.</p>';


        for( $i = 1 ; $i <= 3 ; $i++ )
        {
            $gallery_image = new Gallery_Item;
            $gallery_image->title = "Image no $i";
            $gallery_image->category_id = 1;
            $gallery_image->image_text = $image_text;
            $gallery_image->image_url = 'http://placehold.it/750x750';
            $gallery_image->image_link = 'http://www.johnmclachlan.net';
            $gallery_image->date = sprintf("%02s",$i) . '-' . sprintf("%02s", $i) . '-01';
            $gallery_image->save();
        }

        for( $i = 4 ; $i <= 6 ; $i++ )
        {
            $gallery_image = new Gallery_Item;
            $gallery_image->title = "Image no $i";
            $gallery_image->category_id = 2;
            $gallery_image->image_text = $image_text;
            $gallery_image->image_url = 'http://placehold.it/750x750';
            $gallery_image->image_link = 'http://www.johnmclachlan.net';
            $gallery_image->date = sprintf("%02s",$i) . '-' . sprintf("%02s", $i) . '-01';
            $gallery_image->save();
        }

        for( $i = 7 ; $i <= 9 ; $i++ )
        {
            $gallery_image = new Gallery_Item;
            $gallery_image->title = "Image no $i";
            $gallery_image->category_id = 3;
            $gallery_image->image_text = $image_text;
            $gallery_image->image_url = 'http://placehold.it/750x750';
            $gallery_image->image_link = 'http://www.johnmclachlan.net';
            $gallery_image->date = sprintf("%02s",$i) . '-' . sprintf("%02s", $i) . '-01';
            $gallery_image->save();
        }
            
    }
}