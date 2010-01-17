<?php

/**
 * Category filter form base class.
 *
 * @package    lk-broker
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCategoryFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'parent_id'   => new sfWidgetFormFilterInput(),
      'name'        => new sfWidgetFormFilterInput(),
      'header'      => new sfWidgetFormFilterInput(),
      'description' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'parent_id'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'name'        => new sfValidatorPass(array('required' => false)),
      'header'      => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('category_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Category';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'parent_id'   => 'Number',
      'name'        => 'Text',
      'header'      => 'Text',
      'description' => 'Text',
    );
  }
}
