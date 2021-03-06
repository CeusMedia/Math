<?php
/**
 *	TestUnit of CeusMedia\Math\Prime.
 *	@package		Tests.math
 *	@author			Christian Würker <christian.wuerker@ceusmedia.de>
 *	@since			17.06.2008
 *	@version		0.1
 */
require_once dirname( __FILE__ ).'/initLoaders.php';
/**
 *	TestUnit of CeusMedia\Math\Prime.
 *	@package		Tests.math
 *	@extends		Test_Case
 *	@uses			CeusMedia\Math\Prime
 *	@author			Christian Würker <christian.wuerker@ceusmedia.de>
 *	@since			17.06.2008
 *	@version		0.1
 */
class Test_Math_PrimeTest extends Test_Case
{
	/**
	 *	Tests Method 'getPrimes'.
	 *	@access		public
	 *	@return		void
	 */
	public function testGetPrimes()
	{
		$assertion	= array( 2, 3, 5, 7 );
		$creation	= CeusMedia\Math\Prime::getPrimes( 10 );
		$this->assertEquals( $assertion, $creation );

		$assertion	= array( 2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47 );
		$creation	= CeusMedia\Math\Prime::getPrimes( 50 );
		$this->assertEquals( $assertion, $creation );
	}

	/**
	 *	Tests Method 'isPrime'.
	 *	@access		public
	 *	@return		void
	 */
	public function testIsPrime()
	{
		$assertion	= FALSE;
		$creation	= CeusMedia\Math\Prime::isPrime( 1 );
		$this->assertEquals( $assertion, $creation );

		$assertion	= TRUE;
		$creation	= CeusMedia\Math\Prime::isPrime( 2 );
		$this->assertEquals( $assertion, $creation );

		$assertion	= TRUE;
		$creation	= CeusMedia\Math\Prime::isPrime( 3 );
		$this->assertEquals( $assertion, $creation );

		$assertion	= FALSE;
		$creation	= CeusMedia\Math\Prime::isPrime( 4 );
		$this->assertEquals( $assertion, $creation );

		$assertion	= FALSE;
		$creation	= CeusMedia\Math\Prime::isPrime( 1001 );
		$this->assertEquals( $assertion, $creation );

		$assertion	= TRUE;
		$creation	= CeusMedia\Math\Prime::isPrime( 1009 );
		$this->assertEquals( $assertion, $creation );
	}

	/**
	 *	Tests Method 'getPrimeFactors'.
	 *	@access		public
	 *	@return		void
	 */
	public function testGetPrimeFactors()
	{
		$assertion	= array( 2 );
		$creation	= CeusMedia\Math\Prime::getPrimeFactors( 2 );
		$this->assertEquals( $assertion, $creation );

		$assertion	= array( 2, 2 );
		$creation	= CeusMedia\Math\Prime::getPrimeFactors( 4 );
		$this->assertEquals( $assertion, $creation );

		$assertion	= array( 7, 11, 13 );
		$creation	= CeusMedia\Math\Prime::getPrimeFactors( 1001 );
		$this->assertEquals( $assertion, $creation );

		$assertion	= array( 2, 3, 167 );
		$creation	= CeusMedia\Math\Prime::getPrimeFactors( 1002 );
		$this->assertEquals( $assertion, $creation );
	}
}
?>
