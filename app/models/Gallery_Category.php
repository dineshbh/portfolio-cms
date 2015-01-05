<?php

class Gallery_Category extends Eloquent {

	protected $table = 'gallery_categories';

    public function Gallery_Image()
    {
        return $this->belongsTo('Gallery_Image');
    }
 
}