<?php
/**
 *	Resolution of Formula Sum within a compact Interval.
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
 *	Resolution of Formula Sum  within a compact Interval.
 *	@category		Library
 *	@package		CeusMedia_Math
 *	@author			Christian Würker <christian.wuerker@ceusmedia.de>
 *	@copyright		2007-2018 Christian Würker
 *	@license		http://www.gnu.org/licenses/gpl-3.0.txt GPL 3
 *	@link			https://github.com/CeusMedia/Math
 */
class FormulaSum{

	/**	@var		Formula			$formula	Formula */
	protected $formula;
	/**	@var		CompactInterval	$interval	Interval */
	protected $interval;

	/**
	 *	Constructor.
	 *	@access		public
	 *	@param		Formula			$formula		Formula within Sum
	 *	@param		CompactInterval	$interval		Interval of Sum
	 *	@return		void
	 */
	public function __construct( $formula, $interval ){
		if( !is_a( $formula, 'CeusMedia\\Math\\Formula' ) )
			throw new \InvalidArgumentException( 'No Formula Object given.' );
		if( !is_a( $interval, 'CeusMedia\\Math\\CompactInterval' ) )
			throw new \InvalidArgumentException( 'No Interval Object given.' );
		$this->formula	= $formula;
		$this->interval	= $interval;
	}

	/**
	 *	Calculates Sum of given Formula within given compact Interval and Parameters.
	 *	@access		public
	 *	@return		mixed
	 */
	public function calculate(){
		$sum		= 0;
		$arguments	= func_get_args();
		for( $i=$this->interval->getStart(); $i<=$this->interval->getEnd(); $i++ ){
			$params	= array( $i );
			foreach( $arguments as $argument )
				$params[]	= $argument;
			$value	= call_user_func_array( array( &$this->formula, 'getValue' ), $params );
			$sum	+= $value;
		}
		return $sum;
	}
}
?>
