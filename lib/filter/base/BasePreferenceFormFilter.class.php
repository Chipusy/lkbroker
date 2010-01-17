<?php

/**
 * Preference filter form base class.
 *
 * @package    lk-broker
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePreferenceFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'element_id'             => new sfWidgetFormPropelChoice(array('model' => 'Element', 'add_empty' => true)),
      'category_preference_id' => new sfWidgetFormPropelChoice(array('model' => 'CategoryPreference', 'add_empty' => true)),
      'value'                  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'element_id'             => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Element', 'column' => 'id')),
      'category_preference_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CategoryPreference', 'column' => 'id')),
      'value'                  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('preference_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Preference';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'element_id'             => 'ForeignKey',
      'category_preference_id' => 'ForeignKey',
      'value'                  => 'Text',
    );
  }
}
