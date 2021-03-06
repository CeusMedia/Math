<?php
/**
 *	Complex Number with base operations.
 *
 *	Copyright (c) 2007-2018 Christian Würker (ceusmedia.de)
 *
 *	This program is free software: you can redistribute it and/or modify
 *	it under the terms of the GNU General Public License as published by
 *	the Free Software Foundation, either version 3 of the License, or
 *	(at your option) any later version.
 *
 *	This program is distributed in the hope that it will be useful,
 *	but WITHOUT ANY WARRANTY; without even the implied warranty of
 *	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *	GNU General Public License for more details.
 *
 *	You should have received a copy of the GNU General Public License
 *	along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 *	@category		Library
 *	@package		CeusMedia_Math
 *	@author			Christian Würker <christian.wuerker@ceusmedia.de>
 *	@copyright		2007-2018 Christian Würker
 *	@license		http://www.gnu.org/licenses/gpl-3.0.txt GPL 3
 *	@link			https://github.com/CeusMedia/Math
 */
namespace CeusMedia\Math;
/**
 *	Complex Number with base operations.
 *	@category		Library
 *	@package		CeusMedia_Math
 *	@author			Christian Würker <christian.wuerker@ceusmedia.de>
 *	@copyright		2007-2018 Christian Würker
 *	@license		http://www.gnu.org/licenses/gpl-3.0.txt GPL 3
 *	@link			https://github.com/CeusMedia/Math
 */
class ComplexNumber{

	/**	@var		int		$real		Real part of the complex number */
	protected $real;
	/**	@var		int		$image		Imaginary part of the complex number */
	protected $image;

	/**
	 *	Constructor.
	 *	@access		public
	 *	@param		mixed	$real		Real part of the complex number
	 *	@param		mixed	$image		Imaginary part of the complex number
	 *	@return		void
	 */
	public function __construct( $real, $image ){
		$this->real		= $real;
		$this->image	= $image;
	}

	/**
	 *	Addition of complex numbers.
	 *	@access		public
	 *	@param		ComplexNumber	$complex		Complex number to be added
	 *	@return		ComplexNumber
	 */
	public function add( $complex ){
		$a	= $this->getRealPart();
		$b	= $this->getImagePart();
		$c	= $complex->getRealPart();
		$d	= $complex->getImagePart();
		$real	= $a + $c;
		$image	= $b + $d;
		return new ComplexNumber( $real, $image );
	}

	/**
	 *	Division of complex numbers.
	 *	@access		public
	 *	@param		ComplexNumber	$complex		Complex number to be divised by
	 *	@return		ComplexNumber
	 */
	public function div( $complex ){
		$a	= $this->getRealPart();
		$b	= $this->getImagePart();
		$c	= $complex->getRealPart();
		$d	= $complex->getImagePart();
		$real	= ( $a * $c + $b * $d ) / ( $c * $c + $d * $d );
		$image	= ( $b * $c - $a * $d ) / ( $c * $c + $d * $d );
		return new ComplexNumber( $real, $image );
	}

	/**
	 *	Returns the iimaginary party of the complex number.
	 *	@access		public
	 *	@return		mixed
	 */
	public function getImagePart(){
		return $this->image;
	}

	/**
	 *	Returns the real party of the complex number.
	 *	@access		public
	 *	@return		mixed
	 */
	public function getRealPart(){
		return $this->real;
	}

	/**
	 *	Multiplication of complex numbers.
	 *	@access		public
	 *	@param		ComplexNumber	$complex		Complex number to be multiplied
	 *	@return		ComplexNumber
	 */
	public function mult( $complex ){
		$a	= $this->getRealPart();
		$b	= $this->getImagePart();
		$c	= $complex->getRealPart();
		$d	= $complex->getImagePart();
		$real	= $a * $c - $b * $d;
		$image	= $a * $d + $b * $c;
		return new ComplexNumber( $real, $image );
	}

	/**
	 *	Substraction of complex numbers.
	 *	@access		public
	 *	@param		ComplexNumber	$complex		Complex number to be subtracted
	 *	@return		ComplexNumber
	 */
	public function sub( $complex ){
		$a	= $this->getRealPart();
		$b	= $this->getImagePart();
		$c	= $complex->getRealPart();
		$d	= $complex->getImagePart();
		$real	= $a - $c;
		$image	= $b - $d;
		return new ComplexNumber( $real, $image );
	}

	/**
	 *	Returns the complex number as a representative string.
	 *	@access		public
	 *	@return		mixed
	 */
	public function toString(){
		$code = $this->getRealPart();
		if( $this->image >= 0 )
			$code .= "+".$this->getImagePart()."i";
		else
			$code .= "".$this->getImagePart()."i";
		return $code;
	}
}
?>
