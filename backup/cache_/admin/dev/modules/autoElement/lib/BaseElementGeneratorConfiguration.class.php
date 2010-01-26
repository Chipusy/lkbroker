<?php

/**
 * element module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage element
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseElementGeneratorConfiguration extends sfModelGeneratorConfiguration
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
    return array(  '_delete' => NULL,);
  }

  public function getListParams()
  {
    return '%%name%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'Элементы';
  }

  public function getEditTitle()
  {
    return 'Редактированние элемента %%name%%';
  }

  public function getNewTitle()
  {
    return 'Добавление нового элемента';
  }

  public function getFilterDisplay()
  {
    return array();
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
    return array(  0 => 'name',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'category_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',  'label' => 'Категория',  'help' => 'категория элемента',),
      'element_status_id' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'ForeignKey',  'label' => 'Статус',  'help' => '',),
      'name' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Название',  'help' => '',),
      'title' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Заголовок',  'help' => 'заголовок элемента',),
      'date_created' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'date_updated' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'preview' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Описание элемента',  'help' => 'краткое описание элемента',),
      'description' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Описание элемента',  'help' => 'раширенное описание элемента',),
      'view_count' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'order_count' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'owner_price' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Цена продавца',  'help' => '',),
      'company_price' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Цена компании',  'help' => '',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'category_id' => array(),
      'element_status_id' => array(),
      'name' => array(),
      'title' => array(),
      'date_created' => array(),
      'date_updated' => array(),
      'preview' => array(),
      'description' => array(),
      'view_count' => array(),
      'order_count' => array(),
      'owner_price' => array(),
      'company_price' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'category_id' => array(),
      'element_status_id' => array(),
      'name' => array(),
      'title' => array(),
      'date_created' => array(),
      'date_updated' => array(),
      'preview' => array(),
      'description' => array(),
      'view_count' => array(),
      'order_count' => array(),
      'owner_price' => array(),
      'company_price' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'category_id' => array(),
      'element_status_id' => array(),
      'name' => array(),
      'title' => array(),
      'date_created' => array(),
      'date_updated' => array(),
      'preview' => array(),
      'description' => array(),
      'view_count' => array(),
      'order_count' => array(),
      'owner_price' => array(),
      'company_price' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'category_id' => array(),
      'element_status_id' => array(),
      'name' => array(),
      'title' => array(),
      'date_created' => array(),
      'date_updated' => array(),
      'preview' => array(),
      'description' => array(),
      'view_count' => array(),
      'order_count' => array(),
      'owner_price' => array(),
      'company_price' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'category_id' => array(),
      'element_status_id' => array(),
      'name' => array(),
      'title' => array(),
      'date_created' => array(),
      'date_updated' => array(),
      'preview' => array(),
      'description' => array(),
      'view_count' => array(),
      'order_count' => array(),
      'owner_price' => array(),
      'company_price' => array(),
    );
  }


  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'ElementForm';
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
    return 'ElementFormFilter';
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
