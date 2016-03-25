<?php

namespace App;

class Point {
    
    public $x, $y, $z, $w;
    
    function setUp($x, $y, $z, $w) {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
        $this->w = $w;
    }
}