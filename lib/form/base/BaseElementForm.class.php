<?php

/**
 * Element form base class.
 *
 * @method Element getObject() Returns the current form's model object
 *
 * @package    lk-broker
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseElementForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'category_id'       => new sfWidgetFormPropelChoice(array('model' => 'Category', 'add_empty' => true)),
      'element_status_id' => new sfWidgetFormPropelChoice(array('model' => 'ElementStatus', 'add_empty' => true)),
      'company_id'        => new sfWidgetFormPropelChoice(array('model' => 'Company', 'add_empty' => true)),
      'name'              => new sfWidgetFormInputText(),
      'title'             => new sfWidgetFormInputText(),
      'date_created'      => new sfWidgetFormDateTime(),
      'date_updated'      => new sfWidgetFormDateTime(),
      'preview'           => new sfWidgetFormTextarea(),
      'description'       => new sfWidgetFormTextarea(),
      'view_count'        => new sfWidgetFormInputText(),
      'order_count'       => new sfWidgetFormInputText(),
      'owner_price'       => new sfWidgetFormInputText(),
      'company_price'     => new sfWidgetFormInputText(),
      'price_type'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'Element', 'column' => 'id', 'required' => false)),
      'category_id'       => new sfValidatorPropelChoice(array('model' => 'Category', 'column' => 'id', 'required' => false)),
      'element_status_id' => new sfValidatorPropelChoice(array('model' => 'ElementStatus', 'column' => 'id', 'required' => false)),
      'company_id'        => new sfValidatorPropelChoice(array('model' => 'Company', 'column' => 'id', 'required' => false)),
      'name'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'title'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'date_created'      => new sfValidatorDateTime(array('required' => false)),
      'date_updated'      => new sfValidatorDateTime(array('required' => false)),
      'preview'           => new sfValidatorString(array('required' => false)),
      'description'       => new sfValidatorString(array('required' => false)),
      'view_count'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'order_count'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'owner_price'       => new sfValidatorInteger(array('min' => -9.2233720368548E+18, 'max' => 9.2233720368548E+18, 'required' => false)),
      'company_price'     => new sfValidatorInteger(array('min' => -9.2233720368548E+18, 'max' => 9.2233720368548E+18, 'required' => false)),
      'price_type'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('element[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Element';
  }


}
