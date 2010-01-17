<?php

/**
 * Element filter form base class.
 *
 * @package    lk-broker
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseElementFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'category_id'       => new sfWidgetFormPropelChoice(array('model' => 'Category', 'add_empty' => true)),
      'element_status_id' => new sfWidgetFormPropelChoice(array('model' => 'ElementStatus', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'category_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Category', 'column' => 'id')),
      'element_status_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'ElementStatus', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('element_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Element';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'category_id'       => 'ForeignKey',
      'element_status_id' => 'ForeignKey',
    );
  }
}
