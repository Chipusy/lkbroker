<?php

class pageActions extends sfActions
{
	public function executeIndex(sfWebRequest $request)
	{
		$this->parentCategory = CategoryPeer::getAllParent();
		$this->subCategory = CategoryPeer::getAllSub();
	}
	
	public function executeView(sfWebRequest $request)
	{
		$this->page = PagePeer::retrieveByName($request->getParameter('name'));
		
		$this->forward404Unless($this->page);
	}
}
