<?php
/**
 *	Extrapolation.
 *
 *	Copyright (c) 2015-2018 Christian Würker (ceusmedia.de)
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
 *	@copyright		2015-2018 Christian Würker
 *	@license		http://www.gnu.org/licenses/gpl-3.0.txt GPL 3
 *	@link			https://github.com/CeusMedia/Math
 */
namespace CeusMedia\Math;
/**
 *	Extrapolation.
 *
 *	@category		Library
 *	@package		CeusMedia_Math
 *	@author			Christian Würker <christian.wuerker@ceusmedia.de>
 *	@copyright		2015-2018 Christian Würker
 *	@license		http://www.gnu.org/licenses/gpl-3.0.txt GPL 3
 *	@link			https://github.com/CeusMedia/Math
 *	@todo			test
 */
class Extrapolation{

	/**
	 *	Projects values into a sized container and returns list of range objects.
	 *	@access		public
	 *	@static
	 *	@param		array		$values		List of values
	 *	@param		float		$size		Size of container to project values to
	 *	@return		array		List of range objects
	 */
	static public function calculateRanges( $values, $size, $precision = NULL ){
		$total		= array_sum( $values );
		$carry		= 0;
		$current	= 0;
		$ranges		= array();
		$power		= pow( 10, (int) $precision );
		foreach( $values as $value ){
			$ratio	= $value / $total;
			$x		= $ratio * $size * $power;
			$x_		= floor( $x ) / $power;
			$carry	+= $x - $x_;
			if( $carry >= 1 ){
				$x_++;
				$carry--;
			}
			$ranges[]	= (object) array(
				'offset'	=> $current,
				'size'		=> $x_,
				'value'		=> $value,
				'ratio'		=> $ratio,
			);
			$current	+= $x_;
		}
		return $ranges;
	}
}
?>
