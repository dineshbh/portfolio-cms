<?php

class Gallery_Image extends Eloquent {

	protected $table = 'gallery';
    
    public function Gallery_Category()
    {
        return $this->hasOne('Gallery_Category');
    }
 
}