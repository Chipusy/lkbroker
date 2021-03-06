<?php


/**
 * Skeleton subclass for representing a row from the 'category' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.0 on:
 *
 * Tue Jan 12 12:50:28 2010
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class Category extends BaseCategory {
	
	public function __toString()
	{
		return $this->getHeader();
	}
	
	public function getParent()
	{
		if ($this->getParentId() != 0)
		{
			return CategoryPeer::retrieveByPk($this->getParentId());
		}
		
		return false;
	}
} // Category
