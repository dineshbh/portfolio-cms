<?php

class Category extends Eloquent {
 
    public function category()
    {
        return $this->belongsTo('Post');
    }
 
}