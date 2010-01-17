<?php

/**
 * Client form base class.
 *
 * @method Client getObject() Returns the current form's model object
 *
 * @package    lk-broker
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseClientForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'first_name' => new sfWidgetFormInputText(),
      'last_name'  => new sfWidgetFormInputText(),
      'email'      => new sfWidgetFormInputText(),
      'phone'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'Client', 'column' => 'id', 'required' => false)),
      'first_name' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'last_name'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'phone'      => new sfValidatorInteger(array('min' => -128, 'max' => 127, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('client[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Client';
  }


}
