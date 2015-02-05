<?php

class Category extends Eloquent {

    public function post()
    {
        return $this->HasMany('Post');
    }
 
}