<?php

/**
 * RawDm form base class.
 *
 * @method RawDm getObject() Returns the current form's model object
 *
 * @package    TwitterINeed
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseRawDmForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'dm_id'       => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormInputText(),
      'text'        => new sfWidgetFormInputText(),
      'follower_id' => new sfWidgetFormPropelChoice(array('model' => 'Follower', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'RawDm', 'column' => 'id', 'required' => false)),
      'dm_id'       => new sfValidatorInteger(array('min' => -9.22337203685E+18, 'max' => 9.22337203685E+18)),
      'created_at'  => new sfValidatorInteger(array('min' => -9.22337203685E+18, 'max' => 9.22337203685E+18)),
      'text'        => new sfValidatorString(array('max_length' => 140)),
      'follower_id' => new sfValidatorPropelChoice(array('model' => 'Follower', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('raw_dm[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RawDm';
  }


}
