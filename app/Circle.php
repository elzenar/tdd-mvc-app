<?php

class Circle
{
    public $radius;

    public function setRadius($aRadius)
    {
        if($aRadius <= 0)
        {
            throw new Exception('Invalid radius');
        }
        $this->radius = $aRadius;
    }

    public function calcSquare()
    {
        return round(pi(), 2) * (pow($this->radius, 2));
    }

    public function calcPerimeter()
    {
        return (2 * round(pi(), 2) * $this->radius);
    }




}
