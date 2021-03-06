<?php
/**
 *	TestUnit of CeusMedia\Math\Factorial.
 *	@package		Tests.math
 *	@author			Christian Würker <christian.wuerker@ceusmedia.de>
 *	@since			17.06.2008
 *	@version		0.1
 */
require_once dirname( __FILE__ ).'/initLoaders.php';
/**
 *	TestUnit of CeusMedia\Math\Factorial.
 *	@package		Tests.math
 *	@extends		Test_Case
 *	@uses			CeusMedia\Math\Factorial
 *	@author			Christian Würker <christian.wuerker@ceusmedia.de>
 *	@since			17.06.2008
 *	@version		0.1
 */
class Test_Math_FactorialTest extends Test_Case
{
	/**
	 *	Constructor.
	 *	@access		public
	 *	@return		void
	 */
	public function __construct()
	{
	}

	/**
	 *	Setup for every Test.
	 *	@access		public
	 *	@return		void
	 */
	public function setUp()
	{
	}

	/**
	 *	Cleanup after every Test.
	 *	@access		public
	 *	@return		void
	 */
	public function tearDown()
	{
	}

	/**
	 *	Tests Exception of Method 'calculate'.
	 *	@access		public
	 *	@return		void
	 */
	public function testCalculateException1()
	{
		$this->setExpectedException( 'InvalidArgumentException' );
		CeusMedia\Math\Factorial::calculate( -1 );
	}

	/**
	 *	Tests Exception of Method 'calculate'.
	 *	@access		public
	 *	@return		void
	 */
	public function testCalculateException2()
	{
		$this->setExpectedException( 'InvalidArgumentException' );
		CeusMedia\Math\Factorial::calculate( "no_integer" );
	}

	/**
	 *	Tests Method 'calculate'.
	 *	@access		public
	 *	@return		void
	 */
	public function testCalculate()
	{
		$assertion	= 1;
		$creation	= CeusMedia\Math\Factorial::calculate( 1 );
		$this->assertEquals( $assertion, $creation );

		$assertion	= 6;
		$creation	= CeusMedia\Math\Factorial::calculate( 3 );
		$this->assertEquals( $assertion, $creation );

		$assertion	= 120;
		$creation	= CeusMedia\Math\Factorial::calculate( 5 );
		$this->assertEquals( $assertion, $creation );
	}
}
?>
