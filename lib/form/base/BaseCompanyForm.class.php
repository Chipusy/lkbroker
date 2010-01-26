<?php

/**
 * Company form base class.
 *
 * @method Company getObject() Returns the current form's model object
 *
 * @package    lk-broker
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCompanyForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormInputText(),
      'patron'      => new sfWidgetFormInputText(),
      'phone'       => new sfWidgetFormInputText(),
      'fax'         => new sfWidgetFormInputText(),
      'site'        => new sfWidgetFormInputText(),
      'city'        => new sfWidgetFormInputText(),
      'adress'      => new sfWidgetFormTextarea(),
      'procent'     => new sfWidgetFormInputText(),
      'comment'     => new sfWidgetFormTextarea(),
      'our_comment' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'Company', 'column' => 'id', 'required' => false)),
      'name'        => new sfValidatorString(array('max_length' => 255)),
      'patron'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'phone'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'fax'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'site'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'city'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'adress'      => new sfValidatorString(array('required' => false)),
      'procent'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'comment'     => new sfValidatorString(array('required' => false)),
      'our_comment' => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('company[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Company';
  }


}
