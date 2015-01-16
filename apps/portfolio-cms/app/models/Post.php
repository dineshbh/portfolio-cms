<?php

class Post extends Eloquent {
    
    public function comments()
    {
        return $this->hasMany('Comment');
    }

    public function category()
    {
        return $this->hasOne('Category');
    }
 
}