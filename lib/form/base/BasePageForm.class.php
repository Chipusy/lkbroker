<?php

/**
 * Page form base class.
 *
 * @method Page getObject() Returns the current form's model object
 *
 * @package    lk-broker
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePageForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'name'    => new sfWidgetFormInputText(),
      'header'  => new sfWidgetFormInputText(),
      'content' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorPropelChoice(array('model' => 'Page', 'column' => 'id', 'required' => false)),
      'name'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'header'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'content' => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('page[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Page';
  }


}
