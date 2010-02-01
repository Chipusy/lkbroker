<?php

/**
 * element actions.
 *
 * @package    lk-broker
 * @subpackage element
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class elementActions extends sfActions
{
	public function executeIndex(sfWebRequest $request)
	{
		
	}
	
	public function executeView(sfWebRequest $request)
	{
		$element = ElementPeer::retrieveByPk($request->getParameter('element_id'));
		
		$this->forward404Unless($element);
		
		$this->element = $element;
	}
}
