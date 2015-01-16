<?php

class Comment extends Eloquent {
 
    public function comment()
    {
        return $this->belongsTo('Post');
    }
}