<?php

/**
 * Order form base class.
 *
 * @method Order getObject() Returns the current form's model object
 *
 * @package    lk-broker
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseOrderForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'element_id'      => new sfWidgetFormPropelChoice(array('model' => 'Element', 'add_empty' => true)),
      'client_id'       => new sfWidgetFormPropelChoice(array('model' => 'Client', 'add_empty' => true)),
      'order_status_id' => new sfWidgetFormPropelChoice(array('model' => 'OrderStatus', 'add_empty' => true)),
      'date'            => new sfWidgetFormDateTime(),
      'comment'         => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorPropelChoice(array('model' => 'Order', 'column' => 'id', 'required' => false)),
      'element_id'      => new sfValidatorPropelChoice(array('model' => 'Element', 'column' => 'id', 'required' => false)),
      'client_id'       => new sfValidatorPropelChoice(array('model' => 'Client', 'column' => 'id', 'required' => false)),
      'order_status_id' => new sfValidatorPropelChoice(array('model' => 'OrderStatus', 'column' => 'id', 'required' => false)),
      'date'            => new sfValidatorDateTime(array('required' => false)),
      'comment'         => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('order[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Order';
  }


}
