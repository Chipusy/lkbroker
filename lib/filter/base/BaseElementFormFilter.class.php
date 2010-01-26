<?php

/**
 * Element filter form base class.
 *
 * @package    lk-broker
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseElementFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'category_id'       => new sfWidgetFormPropelChoice(array('model' => 'Category', 'add_empty' => true)),
      'element_status_id' => new sfWidgetFormPropelChoice(array('model' => 'ElementStatus', 'add_empty' => true)),
      'company_id'        => new sfWidgetFormPropelChoice(array('model' => 'Company', 'add_empty' => true)),
      'name'              => new sfWidgetFormFilterInput(),
      'title'             => new sfWidgetFormFilterInput(),
      'date_created'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'date_updated'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'preview'           => new sfWidgetFormFilterInput(),
      'description'       => new sfWidgetFormFilterInput(),
      'view_count'        => new sfWidgetFormFilterInput(),
      'order_count'       => new sfWidgetFormFilterInput(),
      'owner_price'       => new sfWidgetFormFilterInput(),
      'company_price'     => new sfWidgetFormFilterInput(),
      'price_type'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'category_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Category', 'column' => 'id')),
      'element_status_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'ElementStatus', 'column' => 'id')),
      'company_id'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Company', 'column' => 'id')),
      'name'              => new sfValidatorPass(array('required' => false)),
      'title'             => new sfValidatorPass(array('required' => false)),
      'date_created'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'date_updated'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'preview'           => new sfValidatorPass(array('required' => false)),
      'description'       => new sfValidatorPass(array('required' => false)),
      'view_count'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'order_count'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'owner_price'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'company_price'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'price_type'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('element_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Element';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'category_id'       => 'ForeignKey',
      'element_status_id' => 'ForeignKey',
      'company_id'        => 'ForeignKey',
      'name'              => 'Text',
      'title'             => 'Text',
      'date_created'      => 'Date',
      'date_updated'      => 'Date',
      'preview'           => 'Text',
      'description'       => 'Text',
      'view_count'        => 'Number',
      'order_count'       => 'Number',
      'owner_price'       => 'Number',
      'company_price'     => 'Number',
      'price_type'        => 'Number',
    );
  }
}
