<?php

/**
 * element actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage element
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
class ElementActions extends sfActions
{
  public function preExecute()
  {
    $this->configuration = new elementGeneratorConfiguration();

    if (!$this->getUser()->hasCredential($this->configuration->getCredentials($this->getActionName())))
    {
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
    }

    $this->dispatcher->notify(new sfEvent($this, 'admin.pre_execute', array('configuration' => $this->configuration)));

    $this->helper = new elementGeneratorHelper();
  }

  public function executeIndex(sfWebRequest $request)
  {
    // sorting
    if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort')))
    {
      $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
    }

    // pager
    if ($request->getParameter('page'))
    {
      $this->setPage($request->getParameter('page'));
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();
  }

  public function executeFilter(sfWebRequest $request)
  {
    $this->setPage(1);

    if ($request->hasParameter('_reset'))
    {
      $this->setFilters($this->configuration->getFilterDefaults());

      $this->redirect('@element');
    }

    $this->filters = $this->configuration->getFilterForm($this->getFilters());

    $this->filters->bind($request->getParameter($this->filters->getName()));
    if ($this->filters->isValid())
    {
      $this->setFilters($this->filters->getValues());

      $this->redirect('@element');
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();

    $this->setTemplate('index');
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = $this->configuration->getForm();
    $this->Element = $this->form->getObject();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = $this->configuration->getForm();
    $this->Element = $this->form->getObject();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->Element = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->Element);

	
	$this->preferenceArray = array();
	
	foreach ($this->Element->getPreferences() as $key => $value) 
	{
		$this->preferenceArray[$value->getCategoryPreferenceId()] = $value;
	}
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->Element = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->Element);

	$this->preferenceArray = array();
	
	foreach ($this->Element->getPreferences() as $key => $value) 
	{
		$this->preferenceArray[$value->getCategoryPreferenceId()] = $value;
	}

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));

    $this->getRoute()->getObject()->delete();

    $this->getUser()->setFlash('notice', 'The item was deleted successfully.');

    $this->redirect('@element');
  }

  public function executeBatch(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    if (!$ids = $request->getParameter('ids'))
    {
      $this->getUser()->setFlash('error', 'You must at least select one item.');

      $this->redirect('@element');
    }

    if (!$action = $request->getParameter('batch_action'))
    {
      $this->getUser()->setFlash('error', 'You must select an action to execute on the selected items.');

      $this->redirect('@element');
    }

    if (!method_exists($this, $method = 'execute'.ucfirst($action)))
    {
      throw new InvalidArgumentException(sprintf('You must create a "%s" method for action "%s"', $method, $action));
    }

    if (!$this->getUser()->hasCredential($this->configuration->getCredentials($action)))
    {
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
    }

    $validator = new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Element'));
    try
    {
      // validate ids
      $ids = $validator->clean($ids);

      // execute batch
      $this->$method($request);
    }
    catch (sfValidatorError $e)
    {
      $this->getUser()->setFlash('error', 'A problem occurs when deleting the selected items as some items do not exist anymore.');
    }

    $this->redirect('@element');
  }

  protected function executeBatchDelete(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');

    $count = 0;
    foreach (ElementPeer::retrieveByPks($ids) as $object)
    {
      $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $object)));

      $object->delete();
      if ($object->isDeleted())
      {
        $count++;
      }
    }

    if ($count >= count($ids))
    {
      $this->getUser()->setFlash('notice', 'Выбранные элементы успешно удалены.');
    }
    else
    {
      $this->getUser()->setFlash('error', 'Не удалось удалить выбранные документы.');
    }

    $this->redirect('@element');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'Элемент создан успешно.' : 'Элемент изменен успешно.';

		$form->getObject()->setCompanyId($request->getParameter('element_company'));
		$form->getObject()->setPriceType($request->getParameter('element_price_type'));
		
		if ($form->getObject()->isNew())
		{
			$form->getObject()->setDateCreated(time());
		}
		
		$form->getObject()->setDateUpdated(time());
		
		$form->getObject()->setCategoryId($request->getParameter('element_category_id'));

		$Element = $form->save();
		
		foreach ((array) $request->getParameter('element_file') as $key => $value) 
		{
			if (isset($value['delete']))
			{
				$file_delete = ElementFilePeer::retrieveByPk($key);
				$file_delete->delete();
			}
		}
		
		foreach ((array) $request->getFiles('element_file') as $key => $value) 
		{
			list($type, $ext) = explode('/',$value['type']);
			
			if (isset($value['id']) and $value['id'] != 0)
			{
				$file = ElementFilePeer::retrieveByPk($value['id']);
			}
			else
			{
				$file = new ElementFile();
			}
			
			$file->setElementId($Element->getId());
			$file->setName(md5(time()).'.'.$ext);
			$file->setFileType($type == 'image' ? 1 : 2);
			$file->save(null, $value);
		}

		foreach ((array) $request->getParameter('element_preference') as $key => $value) 
		{
			if (isset($value['id']) and $value['id'] != 0)
			{
				$preference = PreferencePeer::retrieveByPk($value['id']);
			}
			else
			{
				$preference = new Preference();
			}
			
			$preference->setElementId($Element->getId());
			$preference->setCategoryPreferenceId($value['category_preference_id']);
			$preference->setValue(isset($value['value']) ? $value['value'] : 0);
			$preference->save();
		}
		
	
      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $Element)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' Можно добавить еще один.');

        $this->redirect('@element_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect(array('sf_route' => 'element_edit', 'sf_subject' => $Element));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'Эелемент не сохранен, так как некоторые поля заполненны не верно!', false);
    }
  }

  protected function getFilters()
  {
    return $this->getUser()->getAttribute('element.filters', $this->configuration->getFilterDefaults(), 'admin_module');
  }

  protected function setFilters(array $filters)
  {
    return $this->getUser()->setAttribute('element.filters', $filters, 'admin_module');
  }

  protected function getPager()
  {
    $pager = $this->configuration->getPager('Element');
    $pager->setCriteria($this->buildCriteria());
    $pager->setPage($this->getPage());
    $pager->setPeerMethod($this->configuration->getPeerMethod());
    $pager->setPeerCountMethod($this->configuration->getPeerCountMethod());
    $pager->init();

    return $pager;
  }

  protected function setPage($page)
  {
    $this->getUser()->setAttribute('element.page', $page, 'admin_module');
  }

  protected function getPage()
  {
    return $this->getUser()->getAttribute('element.page', 1, 'admin_module');
  }

  protected function buildCriteria()
  {
    if (null === $this->filters)
    {
      $this->filters = $this->configuration->getFilterForm($this->getFilters());
    }

    $criteria = $this->filters->buildCriteria($this->getFilters());

    $this->addSortCriteria($criteria);

    $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_criteria'), $criteria);
    $criteria = $event->getReturnValue();

    return $criteria;
  }

  protected function addSortCriteria($criteria)
  {
    if (array(null, null) == ($sort = $this->getSort()))
    {
      return;
    }

    $column = ElementPeer::translateFieldName($sort[0], BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
    if ('asc' == $sort[1])
    {
      $criteria->addAscendingOrderByColumn($column);
    }
    else
    {
      $criteria->addDescendingOrderByColumn($column);
    }
  }

  protected function getSort()
  {
    if (null !== $sort = $this->getUser()->getAttribute('element.sort', null, 'admin_module'))
    {
      return $sort;
    }

    $this->setSort($this->configuration->getDefaultSort());

    return $this->getUser()->getAttribute('element.sort', null, 'admin_module');
  }

  protected function setSort(array $sort)
  {
    if (null !== $sort[0] && null === $sort[1])
    {
      $sort[1] = 'asc';
    }

    $this->getUser()->setAttribute('element.sort', $sort, 'admin_module');
  }

  protected function isValidSortColumn($column)
  {
    return in_array($column, BasePeer::getFieldnames('Element', BasePeer::TYPE_FIELDNAME));
  }
}
