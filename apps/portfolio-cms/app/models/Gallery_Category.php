<?php

class Gallery_Category extends Eloquent {

	protected $table = 'gallery_categories';

    public function Gallery_Item()
    {
        return $this->hasMany('Gallery');
    }
 
}