<?php

/**
 * CategoryPreference form base class.
 *
 * @method CategoryPreference getObject() Returns the current form's model object
 *
 * @package    lk-broker
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCategoryPreferenceForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'category_id'     => new sfWidgetFormPropelChoice(array('model' => 'Category', 'add_empty' => true)),
      'filter_status'   => new sfWidgetFormInputText(),
      'preference_type' => new sfWidgetFormInputText(),
      'preference_unit' => new sfWidgetFormInputText(),
      'key'             => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorPropelChoice(array('model' => 'CategoryPreference', 'column' => 'id', 'required' => false)),
      'category_id'     => new sfValidatorPropelChoice(array('model' => 'Category', 'column' => 'id', 'required' => false)),
      'filter_status'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'preference_type' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'preference_unit' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'key'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('category_preference[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CategoryPreference';
  }


}
