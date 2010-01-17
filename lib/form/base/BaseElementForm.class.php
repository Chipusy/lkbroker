<?php

/**
 * Element form base class.
 *
 * @method Element getObject() Returns the current form's model object
 *
 * @package    lk-broker
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseElementForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'category_id'       => new sfWidgetFormPropelChoice(array('model' => 'Category', 'add_empty' => true)),
      'element_status_id' => new sfWidgetFormPropelChoice(array('model' => 'ElementStatus', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'Element', 'column' => 'id', 'required' => false)),
      'category_id'       => new sfValidatorPropelChoice(array('model' => 'Category', 'column' => 'id', 'required' => false)),
      'element_status_id' => new sfValidatorPropelChoice(array('model' => 'ElementStatus', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('element[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Element';
  }


}
