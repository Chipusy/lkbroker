<?php

/**
 * Category form base class.
 *
 * @method Category getObject() Returns the current form's model object
 *
 * @package    lk-broker
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCategoryForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'parent_id'   => new sfWidgetFormInputText(),
      'name'        => new sfWidgetFormInputText(),
      'header'      => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'Category', 'column' => 'id', 'required' => false)),
      'parent_id'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'header'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'description' => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Category';
  }


}
