<?php

/**
 * category module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage category
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCategoryGeneratorConfiguration extends sfModelGeneratorConfiguration
{
  public function getActionsDefault()
  {
    return array(  '_new' =>   array(    'label' => 'создать',  ),  '_edit' =>   array(    'label' => 'изменить',  ),  '_delete' =>   array(    'label' => 'удалить',  ),  '_save' =>   array(    'label' => 'сохранить',  ),  '_save_and_add' =>   array(    'label' => 'сохранить и добавить',  ),  '_list' =>   array(    'label' => 'показать все',  ),);
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
    return '%%=name%% - %%=header%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Категории';
  }

  public function getEditTitle()
  {
    return 'Редактированние категории %%header%%';
  }

  public function getNewTitle()
  {
    return 'Добавление новой категории';
  }

  public function getFilterDisplay()
  {
    return array(  0 => 'name',  1 => 'header',);
  }

  public function getFormDisplay()
  {
    return array(  0 => 'header',  1 => 'name',  2 => 'description',);
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
    return array(  0 => '=name',  1 => '=header',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'parent_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Родительская категория',  'help' => 'если 0 то данная категория является родительской',),
      'header' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Заголовок',  'help' => 'заголовок категории',),
      'name' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Системное имя',  'help' => 'уникальный идентификатор',),
      'description' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Описание категории',  'help' => 'краткое описание категории',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'parent_id' => array(),
      'header' => array(),
      'name' => array(),
      'description' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'parent_id' => array(),
      'header' => array(),
      'name' => array(),
      'description' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'parent_id' => array(),
      'header' => array(),
      'name' => array(),
      'description' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'parent_id' => array(),
      'header' => array(),
      'name' => array(),
      'description' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'parent_id' => array(),
      'header' => array(),
      'name' => array(),
      'description' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'CategoryForm';
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
    return 'CategoryFormFilter';
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
