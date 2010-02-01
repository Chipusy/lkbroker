<?php


/**
 * Skeleton subclass for performing query and update operations on the 'category' table.
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
class CategoryPeer extends BaseCategoryPeer {
	
	public static function getParentWithSub()
	{
		$categorys = array();
		$sub_categorys = array();
		
		$c = new Criteria();
		
		foreach (self::doSelect($c) as $key => $value) 
		{
			if ($value->getParentId() == 0)
			{
				$categorys['parent'][$value->getId()] = $value;
			}
		}
		
		foreach (self::doSelect($c) as $key => $value) 
		{
			if ($value->getParentId() != 0)
			{
				$categorys['sub'][$value->getParentId()][$value->getId()] = $value;
			}
		}
		
		return $categorys;
	}
	
	public static function getAllSub($id = null)
	{
		$c = new Criteria();
		
		if ($id)
		{
			$c->add(self::PARENT_ID, $id);
		}
		else
		{
			$c->add(self::PARENT_ID, 0, Criteria::NOT_LIKE);
		}
		
		$categorys = array();
		
		foreach (self::doSelect($c) as $key => $value) 
		{
			$categorys[$value->getParentId()][] = $value;
		}
		
		return $categorys;
	}
	
	public static function getAllParent()
	{
		$c = new Criteria();
		$c->add(self::PARENT_ID, 0);
		
		$categorys = self::doSelect($c);
		
		return $categorys;
	}
	
	public static function retrieveByName($name)
	{
		$c = new Criteria();
		$c->add(self::NAME, $name);
		
		return self::doSelectOne($c);
	}
} // CategoryPeer
