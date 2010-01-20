<?php

/**
 * page module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage page
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePageGeneratorConfiguration extends sfModelGeneratorConfiguration
{
  public function getActionsDefault()
  {
    return array(  '_edit' =>   array(    'label' => 'изменить',  ),  '_delete' =>   array(    'label' => 'удалить',  ),  '_save' =>   array(    'label' => 'сохранить страницу',  ),  '_list' =>   array(    'label' => 'показать все страницы',  ),  '_new' =>   array(    'label' => 'создать',  ),  '_save_and_add' =>   array(    'label' => 'сохранить и добавить еще одну страницу',  ),);
  }

  public function getFormActions()
  {
    return array(  '_delete' => NULL,  '_list' => NULL,  '_save' => NULL,  '_save_and_add' => NULL,);
  }

  public function getNewActions()
  {
    return array();
  }

  public function getEditActions()
  {
    return array();
  }

  public function getListObjectActions()
  {
    return array(  '_edit' => NULL,  '_delete' => NULL,);
  }

  public function getListActions()
  {
    return array(  '_new' => NULL,);
  }

  public function getListBatchActions()
  {
    return array();
  }

  public function getListParams()
  {
    return '%%=name%% - %%header%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Простые страницы';
  }

  public function getEditTitle()
  {
    return 'Редактированние страницы %%header%%';
  }

  public function getNewTitle()
  {
    return 'Добавление новой страницы';
  }

  public function getFilterDisplay()
  {
    return array(  0 => 'name',  1 => 'header',);
  }

  public function getFormDisplay()
  {
    return array();
  }

  public function getEditDisplay()
  {
    return array();
  }

  public function getNewDisplay()
  {
    return array();
  }

  public function getListDisplay()
  {
    return array(  0 => '=name',  1 => 'header',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'name' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Системное имя',  'help' => 'уникальный идентификатор',),
      'header' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Заголовок',  'help' => 'заголовок страницы',),
      'content' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Контент',  'help' => 'содержание страницы',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'name' => array(),
      'header' => array(),
      'content' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'name' => array(),
      'header' => array(),
      'content' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'name' => array(),
      'header' => array(),
      'content' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'name' => array(),
      'header' => array(),
      'content' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'name' => array(),
      'header' => array(),
      'content' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'PageForm';
  }

  public function hasFilterForm()
  {
    return true;
  }

  /**
   * Gets the filter form class name
   *
   * @return string The filter form class name associated with this generator
   */
  public function getFilterFormClass()
  {
    return 'PageFormFilter';
  }

  public function getPagerClass()
  {
    return 'sfPropelPager';
  }

  public function getPagerMaxPerPage()
  {
    return 20;
  }

  public function getDefaultSort()
  {
    return array(null, null);
  }

  public function getPeerMethod()
  {
    return 'doSelect';
  }

  public function getPeerCountMethod()
  {
    return 'doCount';
  }
}
