<?php

class Gallery_Item extends Eloquent {

	protected $table = 'gallery';
    
    public function Gallery_Category()
    {
        return $this->belongsTo('Gallery_Category');
    }
 
}