<?php
/**
 *	TestUnit of CeusMedia\Math\Average.
 *	@package		Tests.math
 *	@author			Christian Würker <christian.wuerker@ceusmedia.de>
 *	@since			17.06.2008
 *	@version		0.1
 */
require_once dirname( __FILE__ ).'/initLoaders.php';
/**
 *	TestUnit of CeusMedia\Math\Average.
 *	@package		Tests.math
 *	@extends		Test_Case
 *	@uses			CeusMedia\Math\Average
 *	@author			Christian Würker <christian.wuerker@ceusmedia.de>
 *	@since			17.06.2008
 *	@version		0.1
 */
class Test_Math_AverageTest extends Test_Case
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
	 *	Tests Method 'arithmetic'.
	 *	@access		public
	 *	@return		void
	 */
	public function testArithmetic()
	{
		$assertion	= 2;
		$creation	= CeusMedia\Math\Average::arithmetic( array( 1, 2, 3 ) );
		$this->assertEquals( $assertion, $creation );

		$assertion	= 2.5;
		$creation	= CeusMedia\Math\Average::arithmetic( array( 1, 2, 3, 4 ), 1 );
		$this->assertEquals( $assertion, $creation );

		$assertion	= 10;
		$creation	= CeusMedia\Math\Average::arithmetic( array( 5, 5, 15, 15, 10, 0, 20 ) );
		$this->assertEquals( $assertion, $creation );

		$assertion	= round( 3 / 2, 4 );
		$creation	= CeusMedia\Math\Average::arithmetic( array( 1, 2 ), 4 );
		$this->assertEquals( $assertion, $creation );
	}

	/**
	 *	Tests Method 'geometric'.
	 *	@access		public
	 *	@return		void
	 */
	public function testGeometric()
	{
		$assertion	= 2;
		$creation	= CeusMedia\Math\Average::geometric( array( 1, 2, 3 ) );
		$this->assertEquals( $assertion, $creation );

		$assertion	= 2.2;
		$creation	= CeusMedia\Math\Average::geometric( array( 1, 2, 3, 4 ), 1 );
		$this->assertEquals( $assertion, $creation );

		$assertion	= 13;
		$creation	= CeusMedia\Math\Average::geometric( array( 10, 16.9 ) );
		$this->assertEquals( $assertion, $creation );
	}
}
?>
