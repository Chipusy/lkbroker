<?php

require_once dirname(__FILE__).'/../lib/categoryGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/categoryGeneratorHelper.class.php';

/**
 * category actions.
 *
 * @package    lk-broker
 * @subpackage category
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class categoryActions extends autoCategoryActions
{
	public function executeIndex(sfWebRequest $request)
	{
		if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort')))
		{
			$this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
		}
		
		if ($request->getParameter('page'))
		{
			$this->setPage($request->getParameter('page'));
		}
		
		$this->pager = $this->getPager();
		
		$c = new Criteria();
		$c->add(CategoryPeer::PARENT_ID, 0);
		
		$this->pager->setCriteria($c);
	
		$this->sort = $this->getSort();
	}

	public function executePreference(sfWebRequest $request)
	{
		$result = array();
		
		if ($request->getParameter('id'))
		{
			$category_preference = CategoryPreferencePeer::getPreferenceByCategoryId($request->getParameter('id'));
			
			foreach ($category_preference as $key => $value) 
			{
				$result[] = array('id' => $value->getId(), 'filter_status' => $value->getFilterStatus(), 'key' => $value->getKey());
			}
		}
		
		echo json_encode($result);
		exit;
	}

	protected function processForm(sfWebRequest $request, sfForm $form)
	{
		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
		if ($form->isValid())
		{
			$notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';
			
			$Category = $form->save();
			
			foreach ( (array) $request->getParameter('category_preference') as $key => $value) 
			{
				if (isset($value['id']) and $value['id'] != 0)
				{
					$category_preference = CategoryPreferencePeer::retrieveByPk(intval($value['id']));
				}
				else
				{
					$category_preference = new CategoryPreference();
					$category_preference->setCategoryId($form->getObject()->getId());
				}
				
				if (isset($value['delete']))
				{
					$category_preference->delete();
				}
				elseif ($value['name'] != '')
				{
					$category_preference->setKey($value['name']);
					$category_preference->setFilterStatus(isset($value['filter_status']) ? $value['filter_status'] : 0);
					$category_preference->save();
				}
			}
			
			$this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $Category)));
			
			if ($request->hasParameter('_save_and_add'))
			{
				$this->getUser()->setFlash('notice', $notice.' You can add another one below.');
				
				$this->redirect('@category_new');
			}
			else
			{
				$this->getUser()->setFlash('notice', $notice);
				
				$this->redirect(array('sf_route' => 'category_edit', 'sf_subject' => $Category));
			}
		}
		else
		{
			$this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
		}
	}
}
