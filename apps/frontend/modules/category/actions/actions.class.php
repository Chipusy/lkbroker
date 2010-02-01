<?php

/**
 * category actions.
 *
 * @package    lk-broker
 * @subpackage category
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class categoryActions extends sfActions
{
	public function executeIndex(sfWebRequest $request)
	{
		
	}
	
	public function executeView(sfWebRequest $request)
	{
		$category = CategoryPeer::retrieveByName($request->getParameter('category_name'));
		
		$this->forward404Unless($category);
		
		if ($category->getParentId() != 0)
		{
			$this->parentCategory = CategoryPeer::retrieveByPk($category->getParentId());
		}
		else
		{
			$this->subCategorys = CategoryPeer::getAllSub($category->getId());
		}
		
		$c = new Criteria();
		
		if (isset($this->subCategorys))
		{
			$subCategoryIds = array();
			
			foreach ($this->subCategorys[$category->getId()] as $sub) 
			{
				$subCategoryIds[] = $sub->getId();
			}
			
			$subCategoryIds[] = $category->getId();
			
			$c->add(ElementPeer::CATEGORY_ID, $subCategoryIds, Criteria::IN);
		}
		else
		{
			$c->add(ElementPeer::CATEGORY_ID, $category->getId());
		}
		
		$this->pager = new sfPropelPager('Element', 10);
		$this->pager->setPeerMethod('doSelectJoinAll');
		$this->pager->setCriteria($c);
		$this->pager->setPage($this->getRequestParameter('page'), 1);
		$this->pager->init();
		
		$this->elements = $this->pager->getResults();
		$this->category = $category;
	}
}
