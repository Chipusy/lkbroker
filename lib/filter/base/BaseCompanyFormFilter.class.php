<?php

/**
 * Company filter form base class.
 *
 * @package    lk-broker
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCompanyFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'patron'      => new sfWidgetFormFilterInput(),
      'phone'       => new sfWidgetFormFilterInput(),
      'fax'         => new sfWidgetFormFilterInput(),
      'site'        => new sfWidgetFormFilterInput(),
      'city'        => new sfWidgetFormFilterInput(),
      'adress'      => new sfWidgetFormFilterInput(),
      'procent'     => new sfWidgetFormFilterInput(),
      'comment'     => new sfWidgetFormFilterInput(),
      'our_comment' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'        => new sfValidatorPass(array('required' => false)),
      'patron'      => new sfValidatorPass(array('required' => false)),
      'phone'       => new sfValidatorPass(array('required' => false)),
      'fax'         => new sfValidatorPass(array('required' => false)),
      'site'        => new sfValidatorPass(array('required' => false)),
      'city'        => new sfValidatorPass(array('required' => false)),
      'adress'      => new sfValidatorPass(array('required' => false)),
      'procent'     => new sfValidatorPass(array('required' => false)),
      'comment'     => new sfValidatorPass(array('required' => false)),
      'our_comment' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('company_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Company';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'name'        => 'Text',
      'patron'      => 'Text',
      'phone'       => 'Text',
      'fax'         => 'Text',
      'site'        => 'Text',
      'city'        => 'Text',
      'adress'      => 'Text',
      'procent'     => 'Text',
      'comment'     => 'Text',
      'our_comment' => 'Text',
    );
  }
}
