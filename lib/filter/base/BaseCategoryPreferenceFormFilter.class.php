<?php

/**
 * CategoryPreference filter form base class.
 *
 * @package    lk-broker
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCategoryPreferenceFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'category_id'   => new sfWidgetFormPropelChoice(array('model' => 'Category', 'add_empty' => true)),
      'filter_status' => new sfWidgetFormFilterInput(),
      'key'           => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'category_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Category', 'column' => 'id')),
      'filter_status' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'key'           => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('category_preference_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CategoryPreference';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'category_id'   => 'ForeignKey',
      'filter_status' => 'Number',
      'key'           => 'Text',
    );
  }
}
