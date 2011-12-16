<?php

class CircleException extends Exception {
	
}

class Circle
{
	private $_radius;
	
	public function __construct($radius){
		if(is_null($radius)) throw new CircleException("Circle radius should not be null");
		if($radius<0) throw new CircleException("Circle radius should not be less then 0");
		$this->_radius = $radius;
	}
	
    public function square()
    {
		return (pi()*($this->_radius*$this->_radius));
    }

    public function perimeter()
    {
		return (2*pi()*$this->_radius);
    }

}

?>