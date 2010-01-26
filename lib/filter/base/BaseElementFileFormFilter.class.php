<?php

/**
 * ElementFile filter form base class.
 *
 * @package    lk-broker
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseElementFileFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'file_type'  => new sfWidgetFormFilterInput(),
      'element_id' => new sfWidgetFormPropelChoice(array('model' => 'Element', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'       => new sfValidatorPass(array('required' => false)),
      'file_type'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'element_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Element', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('element_file_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'ElementFile';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'name'       => 'Text',
      'file_type'  => 'Number',
      'element_id' => 'ForeignKey',
    );
  }
}
