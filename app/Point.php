<?php

namespace App;

class Point {
    
    public $x, $y, $z, $w;
    
    function __construct($x, $y, $z, $w) {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
        $this->w = $w;
    }
}