<?php

/**
 * Preference form base class.
 *
 * @method Preference getObject() Returns the current form's model object
 *
 * @package    lk-broker
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePreferenceForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'element_id'             => new sfWidgetFormPropelChoice(array('model' => 'Element', 'add_empty' => true)),
      'category_preference_id' => new sfWidgetFormPropelChoice(array('model' => 'CategoryPreference', 'add_empty' => true)),
      'value'                  => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorPropelChoice(array('model' => 'Preference', 'column' => 'id', 'required' => false)),
      'element_id'             => new sfValidatorPropelChoice(array('model' => 'Element', 'column' => 'id', 'required' => false)),
      'category_preference_id' => new sfValidatorPropelChoice(array('model' => 'CategoryPreference', 'column' => 'id', 'required' => false)),
      'value'                  => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('preference[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Preference';
  }


}
