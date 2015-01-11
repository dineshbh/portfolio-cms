<?php

class Gallery_Item extends Eloquent {

	protected $table = 'gallery';
    
    public function Gallery_Category()
    {
        return $this->hasOne('Gallery_Category');
    }
 
}