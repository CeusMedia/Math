<?php
/**
 *	TestUnit of CeusMedia\Math\FormulaProduct.
 *	@package		Tests.math
 *	@author			Christian Würker <christian.wuerker@ceusmedia.de>
 *	@since			17.06.2008
 *	@version		0.1
 */
require_once dirname( __FILE__ ).'/initLoaders.php';
/**
 *	TestUnit of CeusMedia\Math\FormulaProduct.
 *	@package		Tests.math
 *	@extends		Test_Case
 *	@uses			CeusMedia\Math\FormulaProduct
 *	@author			Christian Würker <christian.wuerker@ceusmedia.de>
 *	@since			17.06.2008
 *	@version		0.1
 */
class Test_Math_FormulaProductTest extends Test_Case
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
	 *	Tests Exception of Method '__construct'.
	 *	@access		public
	 *	@return		void
	 */
	public function testConstructException1()
	{
		$this->setExpectedException( 'InvalidArgumentException' );
		new CeusMedia\Math\FormulaProduct( "no_object", "no_object" );
	}

	/**
	 *	Tests Exception of Method '__construct'.
	 *	@access		public
	 *	@return		void
	 */
	public function testConstructException2()
	{
		$this->setExpectedException( 'InvalidArgumentException' );
		new CeusMedia\Math\FormulaProduct( new CeusMedia\Math\Formula( "x", "x" ), "no_object" );
	}

	/**
	 *	Tests Method 'calculate'.
	 *	@access		public
	 *	@return		void
	 */
	public function testCalculate()
	{
		$interval	= new CeusMedia\Math\CompactInterval( 1, 4 );
		$formula	= new CeusMedia\Math\Formula( "x", "x" );
		$product	= new CeusMedia\Math\FormulaProduct( $formula, $interval );
		$creation	= $product->calculate();
		$assertion	= 24;
		$this->assertEquals( $assertion, $creation );

		$interval	= new CeusMedia\Math\CompactInterval( 1, 4 );
		$formula	= new CeusMedia\Math\Formula( "2*x*y", array( "x", "y" ) );
		$product	= new CeusMedia\Math\FormulaProduct( $formula, $interval );
		$creation	= $product->calculate( 3 );
		$assertion	= 31104;
		$this->assertEquals( $assertion, $creation );
	}
}
?>
