<?php
/**
 *	TestUnit of CeusMedia\Math\Finance\CompoundInterest.
 *	@package		Tests.math.finance
 *	@author			Christian Würker <christian.wuerker@ceusmedia.de>
 *	@since			17.06.2008
 *	@version		0.1
 */
require_once dirname( __DIR__ ).'/initLoaders.php';
/**
 *	TestUnit of CeusMedia\Math\Finance\CompoundInterest.
 *	@package		Tests.math.finance
 *	@extends		Test_Case
 *	@uses			CeusMedia\Math\Finance\CompoundInterest
 *	@author			Christian Würker <christian.wuerker@ceusmedia.de>
 *	@since			17.06.2008
 *	@version		0.1
 */
class Test_Math_Finance_CompoundInterestTest extends Test_Case
{
	/**
	 *	Constructor.
	 *	@access		public
	 *	@return		void
	 */
	public function __construct()
	{
		$this->calc	= new CeusMedia\Math\Finance\CompoundInterest();
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
	 *	Tests Method 'calculateFutureAmount'.
	 *	@access		public
	 *	@return		void
	 */
	public function testCalculateFutureAmount()
	{
		$assertion	= 1100;
		$creation	= CeusMedia\Math\Finance\CompoundInterest::calculateFutureAmount( 1000, 10, 1 );
		$this->assertEquals( $assertion, $creation );

		$assertion	= 1210;
		$creation	= (int) CeusMedia\Math\Finance\CompoundInterest::calculateFutureAmount( 1000, 10, 2 );
		$this->assertEquals( $assertion, $creation );

		$assertion	= 1331;
		$creation	= (int) CeusMedia\Math\Finance\CompoundInterest::calculateFutureAmount( 1000, 10, 3 );
		$this->assertEquals( $assertion, $creation );
	}

	/**
	 *	Tests Exception of Method 'calculateFutureAmount'.
	 *	@access		public
	 *	@return		void
	 */
	public function testCalculateFutureAmountException()
	{
		$this->setExpectedException( 'InvalidArgumentException' );
		CeusMedia\Math\Finance\CompoundInterest::calculateFutureAmount( 1000, 1, 0 );
	}

	/**
	 *	Tests Method 'calculatePresentAmount'.
	 *	@access		public
	 *	@return		void
	 */
	public function testCalculatePresentAmount()
	{
		$assertion	= 1000;
		$creation	= round( CeusMedia\Math\Finance\CompoundInterest::calculatePresentAmount( 1100, 10, 1 ) );
		$this->assertEquals( $assertion, $creation );

		$assertion	= 1000;
		$creation	= round( CeusMedia\Math\Finance\CompoundInterest::calculatePresentAmount( 1210, 10, 2 ) );
		$this->assertEquals( $assertion, $creation );

		$assertion	= 1000;
		$creation	= round( CeusMedia\Math\Finance\CompoundInterest::calculatePresentAmount( 1331, 10, 3 ) );
		$this->assertEquals( $assertion, $creation );
	}

	/**
	 *	Tests Exception of Method 'calculatePresentAmount'.
	 *	@access		public
	 *	@return		void
	 */
	public function testCalculatePresentAmountException()
	{
		$this->setExpectedException( 'InvalidArgumentException' );
		CeusMedia\Math\Finance\CompoundInterest::calculatePresentAmount( 1000, 10, 0 );
	}

	/**
	 *	Tests Method 'calculateInterest'.
	 *	@access		public
	 *	@return		void
	 */
	public function testCalculateInterest()
	{
		$assertion	= 10;
		$creation	= round( CeusMedia\Math\Finance\CompoundInterest::calculateInterest( 1000, 1100, 1 ) );
		$this->assertEquals( $assertion, $creation );

		$assertion	= 10;
		$creation	= round( CeusMedia\Math\Finance\CompoundInterest::calculateInterest( 1000, 1210, 2 ) );
		$this->assertEquals( $assertion, $creation );

		$assertion	= 10;
		$creation	= round( CeusMedia\Math\Finance\CompoundInterest::calculateInterest( 1000, 1331, 3 ) );
		$this->assertEquals( $assertion, $creation );
	}

	/**
	 *	Tests Exception of Method 'calculateInterest'.
	 *	@access		public
	 *	@return		void
	 */
	public function testCalculateInterestException()
	{
		$this->setExpectedException( 'InvalidArgumentException' );
		CeusMedia\Math\Finance\CompoundInterest::calculateInterest( 1000, 1000, 0 );
	}

	/**
	 *	Tests Method 'getAmount'.
	 *	@access		public
	 *	@return		void
	 */
	public function testGetAmount()
	{
		$this->calc->setAmount( 1000 );
		$assertion	= 1000;
		$creation	= $this->calc->getAmount();
		$this->assertEquals( $assertion, $creation );
	}

	/**
	 *	Tests Method 'getInterest'.
	 *	@access		public
	 *	@return		void
	 */
	public function testGetInterest()
	{
		$this->calc->setInterest( 10 );
		$assertion	= 10;
		$creation	= $this->calc->getInterest( 10 );
		$this->assertEquals( $assertion, $creation );
	}

	/**
	 *	Tests Method 'getPeriods'.
	 *	@access		public
	 *	@return		void
	 */
	public function testGetPeriods()
	{
		$this->calc->setPeriods( 10 );
		$assertion	= 10;
		$creation	= $this->calc->getPeriods();
		$this->assertEquals( $assertion, $creation );
	}

	/**
	 *	Tests Method 'getFutureAmount'.
	 *	@access		public
	 *	@return		void
	 */
	public function testGetFutureAmount()
	{
		$this->calc->setAmount( 1000 );
		$this->calc->setInterest( 10 );
		$this->calc->setPeriods( 2 );

		$assertion	= 1210;
		$creation	= round( $this->calc->getFutureAmount() );
		$this->assertEquals( $assertion, $creation );
	}

	/**
	 *	Tests Method 'getInterestFromFutureAmount'.
	 *	@access		public
	 *	@return		void
	 */
	public function testGetInterestFromFutureAmount()
	{
		$this->calc->setAmount( 1000 );
		$this->calc->setPeriods( 2 );
		$assertion	= 10;
		$creation	= round( $this->calc->getInterestFromFutureAmount( 1210, FALSE ) );
		$this->assertEquals( $assertion, $creation );
	}

	/**
	 *	Tests Method 'getPresentAmount'.
	 *	@access		public
	 *	@return		void
	 */
	public function testGetPresentAmount()
	{
		$this->calc->setAmount( 1210 );
		$this->calc->setInterest( 10 );
		$this->calc->setPeriods( 2 );
		$assertion	= 1000;
		$creation	= round( $this->calc->getPresentAmount( TRUE ) );
		$this->assertEquals( $assertion, $creation );

		$assertion	= 1000;
		$creation	= round( $this->calc->getAmount() );
		$this->assertEquals( $assertion, $creation );
	}

	/**
	 *	Tests Method 'setAmount'.
	 *	@access		public
	 *	@return		void
	 */
	public function testSetAmount()
	{
		$this->calc->setAmount( 1000 );
		$assertion	= 1000;
		$creation	= $this->calc->getAmount();
		$this->assertEquals( $assertion, $creation );
	}

	/**
	 *	Tests Method 'setInterest'.
	 *	@access		public
	 *	@return		void
	 */
	public function testSetInterest()
	{
		$this->calc->setInterest( 10 );
		$assertion	= 10;
		$creation	= $this->calc->getInterest();
		$this->assertEquals( $assertion, $creation );
	}

	/**
	 *	Tests Exception of Method 'setPeriods'.
	 *	@access		public
	 *	@return		void
	 */
	public function testSetPeriodsException()
	{
		$this->setExpectedException( 'InvalidArgumentException' );
		$this->calc->setPeriods( 0 );
	}

	/**
	 *	Tests Method 'setPeriods'.
	 *	@access		public
	 *	@return		void
	 */
	public function testSetPeriods()
	{
		$this->calc->setPeriods( 10 );
		$assertion	= 10;
		$creation	= $this->calc->getPeriods();
		$this->assertEquals( $assertion, $creation );
	}
}
?>
