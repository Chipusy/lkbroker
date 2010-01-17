<?php

/**
 * Page filter form base class.
 *
 * @package    lk-broker
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePageFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'    => new sfWidgetFormFilterInput(),
      'header'  => new sfWidgetFormFilterInput(),
      'content' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'    => new sfValidatorPass(array('required' => false)),
      'header'  => new sfValidatorPass(array('required' => false)),
      'content' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('page_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Page';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'name'    => 'Text',
      'header'  => 'Text',
      'content' => 'Text',
    );
  }
}
