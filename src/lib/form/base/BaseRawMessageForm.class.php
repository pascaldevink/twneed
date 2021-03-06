<?php

/**
 * RawMessage form base class.
 *
 * @method RawMessage getObject() Returns the current form's model object
 *
 * @package    TwitterINeed
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseRawMessageForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'message_id'  => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormInputText(),
      'text'        => new sfWidgetFormInputText(),
      'follower_id' => new sfWidgetFormPropelChoice(array('model' => 'Follower', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'RawMessage', 'column' => 'id', 'required' => false)),
      'message_id'  => new sfValidatorInteger(array('min' => -9.2233720368548E+18, 'max' => 9223372036854775807)),
      'created_at'  => new sfValidatorInteger(array('min' => -9.2233720368548E+18, 'max' => 9223372036854775807)),
      'text'        => new sfValidatorString(array('max_length' => 140)),
      'follower_id' => new sfValidatorPropelChoice(array('model' => 'Follower', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('raw_message[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RawMessage';
  }


}
