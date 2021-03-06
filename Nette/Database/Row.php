<?php

/**
 * This file is part of the Nette Framework (http://nette.org)
 *
 * Copyright (c) 2004, 2011 David Grudl (http://davidgrudl.com)
 *
 * For the full copyright and license information, please view
 * the file license.txt that was distributed with this source code.
 */

namespace Nette\Database;

use Nette;



/**
 * Represents a single table row.
 *
 * @author     David Grudl
 */
class Row implements \ArrayAccess, \IteratorAggregate, \Countable
{

	public function __construct($statement)
	{
		$statement->normalizeRow($this);
	}



	public function count()
	{
		return count((array) $this);
	}



	public function getIterator()
	{
		return new \ArrayIterator($this);
	}



	public function offsetSet($nm, $val)
	{
		$this->$nm = $val;
	}



	public function offsetGet($nm)
	{
		if (is_int($nm)) {
			$arr = array_values((array) $this);
			return $arr[$nm];
		}
		return $this->$nm;
	}



	public function offsetExists($nm)
	{
		return isset($this->$nm);
	}



	public function offsetUnset($nm)
	{
		unset($this->$nm);
	}

}
