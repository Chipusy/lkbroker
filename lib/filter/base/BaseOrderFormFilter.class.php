<?php

/**
 * Order filter form base class.
 *
 * @package    lk-broker
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseOrderFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'element_id'      => new sfWidgetFormPropelChoice(array('model' => 'Element', 'add_empty' => true)),
      'client_id'       => new sfWidgetFormPropelChoice(array('model' => 'Client', 'add_empty' => true)),
      'order_status_id' => new sfWidgetFormPropelChoice(array('model' => 'OrderStatus', 'add_empty' => true)),
      'date'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'comment'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'element_id'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Element', 'column' => 'id')),
      'client_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Client', 'column' => 'id')),
      'order_status_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'OrderStatus', 'column' => 'id')),
      'date'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'comment'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('order_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Order';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'element_id'      => 'ForeignKey',
      'client_id'       => 'ForeignKey',
      'order_status_id' => 'ForeignKey',
      'date'            => 'Date',
      'comment'         => 'Text',
    );
  }
}
