<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Point;

class Point {
    
    public $x, $y, $z, $w;
    
    function __construct($x, $y, $z, $w) {
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
        $this->w = $w;
    }
}

class SolutionController extends Controller
{
    private $COMMAND_UPDATE = "UPDATE";
    private $COMMAND_QUERY = "QUERY";
    
    private $matrix = [];
    private $T;
    private $output;
    private $numPoints;
    private $input = [];
    private $inputCont;

    /**
     * Solve the cube summation problem.
     *
     * @param  problem input
     * @return solution in text format
     */
    public function solve(Request $request)
    {
        $problem = $request->input('problem');

        $this->input = explode(PHP_EOL, $problem);
        $this->inputCont = 0;

        $this->T = $this->input[$this->inputCont];
        $this->inputCont = $this->inputCont + 1;
            
        if (($this->T >= 1) && ($this->T <= 50)) {
            // execute t number of testcases
            for ($i = 0; $i < $this->T; $i++) {
                $this->doTestCase();
            }
            return $this->output;
        } else {
            return "T is out of range";
        }
    }

    function update($x, $y, $z, $w) {
        // verify the W range
        if ($w >= -1000000000 && $w <= 1000000000) {
            // verify if given point exist
            $isPoint = false;
            
            for ($i=0; $i<count($this->matrix); $i++) {
                
                $p = $this->matrix[$i];
                
                if (($p->x == $x) && ($p->y == $y) && ($p->z == $z)) {
                    $isPoint = true;
                    // try: $p->w = $w; $matrix[$i] = $p;
                    $this->matrix[$i]->w = $w;
                }
            }
            
            if (!$isPoint) {
                $this->matrix[$this->numPoints] = new Point($x, $y, $z, $w);
                $this->numPoints++;
            }
        } else {
            return "Error w out of range";
        }
    }
    
    function query($x1, $y1, $z1, $x2, $y2, $z2) {
        
        $sum = 0;
        
        for ($i=0; $i<count($this->matrix); $i++) {
            
            $p = $this->matrix[$i];
            
            if (($p->x >= $x1 && $p->x <= $x2) && ($p->y >= $y1 && $p->y <= $y2) && ($p->z >= $z1 && $p->z <= $z2)) {
                $sum += $p->w;
            }
        }
        
        return $sum."\n";
    }
    
    function doTestCase() {
        // read N and M
        //$in = trim(fgets(STDIN));
        $line = explode(" ", $this->input[$this->inputCont]);
        $this->inputCont = $this->inputCont + 1;
        
        $N = $line[0]; // matrix size
        $M = $line[1]; // number of operations
        
        if (($N >= 1) && ($N <= 100) && ($M >= 1) && ($M <= 1000)) {
            
            // create the new matrix for the number of operations
            $this->matrix = [];
            $this->numPoints = 0;

            // read commands M times
            for ($i=1; $i<=$M; $i++) {

                $line = explode(" ", $this->input[$this->inputCont]);
                $this->inputCont = $this->inputCont + 1;
                $operation = $line[0]; // command UPDATE or QUERY
                
                // UPDATE
                if ($operation == $this->COMMAND_UPDATE) {
                    
                    $x = $line[1];
                    $y = $line[2];
                    $z = $line[3];
                    $w = $line[4];
                    
                    if(($x >= 1) && ($x <= $N) && ($y >= 1) && ($y <= $N) && ($z >= 1) && ($z <= $N)) {
                        // update the point x,y,z with value w
                        $this->update($x, $y, $z, $w);
                    } else {
                        return "x,y,z out of range error";
                    }
                } else {
                    // QUERY
                    if ($operation == $this->COMMAND_QUERY) {
                        
                        $x1 = $line[1];
                        $y1 = $line[2];
                        $z1 = $line[3];
                        $x2 = $line[4];
                        $y2 = $line[5];
                        $z2 = $line[6];
                        
                        if (($x1 >= 1) && ($x1 <= $x2) && ($x2 <= $N) && ($y1 >= 1) && ($y1 <= $y2) && ($y2 <= $N)
                                && ($z1 >= 1) && ($z1 <= $z2) && ($z2 <= $N)) {
                            // save the sum in output variable
                            $this->output .= $this->query($x1, $y1, $z1, $x2, $y2, $z2);
                        } else {
                            return "x1,y1,z1... error";
                        }
                    } else {
                        return "Error, wrong command";
                    }
                }
            }
        }
    }
}