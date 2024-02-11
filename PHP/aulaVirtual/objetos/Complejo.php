<?php
class Complejo
{
	private $real;
	private $img;
	
	function __construct( $a = 0, $b = 0)
	{
		$this->setReal( $a );
		$this->setImg( $b );
	}
	public function getReal()
	{	
		return( $this->real );
	}
	public function setReal( $valor)
	{	
		$this->real = $valor;
	}
	public function getImg()
	{	
		return( $this->img );
	}
	public function setImg( $valor )
	{	
		$this->img= $valor;
	}
	
	public function suma( $valor )
	{
		$this->setImg( $this->getImg() + $valor->getImg() );
		$this->setReal( $this->getReal() + $valor->getReal() );
	}
		
	public function write()
	{
		echo $this->getReal() . " + " . $this->getImg() .  "i<br>";
	}
}


$a = new Complejo( 5 , 7);
$b = new Complejo();
$c = &$a;
$a->setReal( 6);


$c->write();

 
