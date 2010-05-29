<?php

/**
 * Need form base class.
 *
 * @method Need getObject() Returns the current form's model object
 *
 * @package    TwitterINeed
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseNeedForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'author'      => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormInputText(),
      'timeframe'   => new sfWidgetFormInputText(),
      'location'    => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'Need', 'column' => 'id', 'required' => false)),
      'author'      => new sfValidatorString(array('max_length' => 100)),
      'description' => new sfValidatorString(array('max_length' => 140)),
      'timeframe'   => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'location'    => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'created_at'  => new sfValidatorDateTime(array('required' => false)),
      'updated_at'  => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('need[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Need';
  }


}
