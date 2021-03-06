<?php
/**
 *	TestUnit of CeusMedia\Math\Algebra\Vector.
 *	@package		Tests.math.algebra
 *	@author			Christian Würker <christian.wuerker@ceusmedia.de>
 *	@since			17.06.2008
 *	@version		0.1
 */
require_once dirname( __DIR__ ).'/initLoaders.php';
/**
 *	TestUnit of CeusMedia\Math\Algebra\Vector.
 *	@package		Tests.math.algebra
 *	@extends		Test_Case
 *	@uses			CeusMedia\Math\Algebra\Vector
 *	@author			Christian Würker <christian.wuerker@ceusmedia.de>
 *	@since			17.06.2008
 *	@version		0.1
 */
class Test_Math_Algebra_VectorTest extends Test_Case
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
		$this->vector		= new CeusMedia\Math\Algebra\Vector( 1.1, 2.2, -3 );
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
	 *	Tests Method '__construct'.
	 *	@access		public
	 *	@return		void
	 */
	public function testConstruct()
	{
		$vector		= new CeusMedia\Math\Algebra\Vector( 1, 2, 3 );
		$assertion	= array( 1, 2, 3 );
		$creation	= $vector->toArray();
		$this->assertEquals( $assertion, $creation );

		$vector		= new CeusMedia\Math\Algebra\Vector( array( 1, 2, 3 ) );
		$assertion	= array( 1, 2, 3 );
		$creation	= $vector->toArray();
		$this->assertEquals( $assertion, $creation );
	}

	/**
	 *	Tests Exception of Method '__construct'.
	 *	@access		public
	 *	@return		void
	 */
	public function testConstructException()
	{
		$this->setExpectedException( 'InvalidArgumentException' );
		new CeusMedia\Math\Algebra\Vector();
	}

	/**
	 *	Tests Method '__toString'.
	 *	@access		public
	 *	@return		void
	 */
	public function testToString()
	{
		$vector		= new CeusMedia\Math\Algebra\Vector( -1.5, -2.5 );
		$assertion	= "(-1.5, -2.5)";
		$creation	= (string) $vector;
		$this->assertEquals( $assertion, $creation );
	}

	/**
	 *	Tests Method 'addValue'.
	 *	@access		public
	 *	@return		void
	 */
	public function testAddValue()
	{
		$this->vector->addValue( 4.5 );
		$assertion	= array( 1.1, 2.2, -3, 4.5 );
		$creation	= $this->vector->toArray();
		$this->assertEquals( $assertion, $creation );
	}

	/**
	 *	Tests Method 'getDimension'.
	 *	@access		public
	 *	@return		void
	 */
	public function testGetDimension()
	{
		$assertion	= 3;
		$creation	= $this->vector->getDimension();
		$this->assertEquals( $assertion, $creation );
	}

	/**
	 *	Tests Method 'getValueFromDimension'.
	 *	@access		public
	 *	@return		void
	 */
	public function testGetValueFromDimension()
	{
		$assertion	= 1.1;
		$creation	= $this->vector->getValueFromDimension( 1 );
		$this->assertEquals( $assertion, $creation );

		$assertion	= 2.2;
		$creation	= $this->vector->getValueFromDimension( 2 );
		$this->assertEquals( $assertion, $creation );

		$assertion	= -3;
		$creation	= $this->vector->getValueFromDimension( 3 );
		$this->assertEquals( $assertion, $creation );
	}

	/**
	 *	Tests Method 'getValueFromIndex'.
	 *	@access		public
	 *	@return		void
	 */
	public function testGetValueFromIndex()
	{
		$assertion	= 1.1;
		$creation	= $this->vector->getValueFromIndex( 0 );
		$this->assertEquals( $assertion, $creation );

		$assertion	= 2.2;
		$creation	= $this->vector->getValueFromIndex( 1 );
		$this->assertEquals( $assertion, $creation );

		$assertion	= -3;
		$creation	= $this->vector->getValueFromIndex( 2 );
		$this->assertEquals( $assertion, $creation );
	}

	/**
	 *	Tests Exception of Method 'getValueFromIndex'.
	 *	@access		public
	 *	@return		void
	 */
	public function testGetValueFromIndexException1()
	{
		$this->setExpectedException( 'OutOfRangeException' );
		$this->vector->getValueFromIndex( 3 );
	}

	/**
	 *	Tests Exception of Method 'getValueFromIndex'.
	 *	@access		public
	 *	@return		void
	 */
	public function testGetValueFromIndexException2()
	{
		$this->setExpectedException( 'OutOfRangeException' );
		$this->vector->getValueFromIndex( -1 );
	}

	/**
	 *	Tests Method 'toArray'.
	 *	@access		public
	 *	@return		void
	 */
	public function testToArray()
	{
		$assertion	= array( 1.1, 2.2, -3 );
		$creation	= $this->vector->toArray();
		$this->assertEquals( $assertion, $creation );
	}
}
?>
