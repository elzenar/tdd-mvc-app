<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class NullValueException extends Exception{}
class NegativeValueException extends Exception{}

class Rectangle{

    protected $length;
    protected $width;

    public function __construct($length, $width)
    {
        if ( ($length < 0) || ($width < 0)) {
            throw new NegativeValueException ('Negative values are forbidden');
        }
        if ( (is_null($length)) || (is_null($width))) {
            throw new NullValueException ('Values should not be empty');
        }
        $this->length = $length;
        $this->width = $width;

    }

    public function calculateSquare(){
        return $this->width * $this->length;

    }

    public function calculatePerimeter(){
        return 2 * ($this->width + $this->length);

    }

}
?>
