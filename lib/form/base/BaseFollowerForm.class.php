<?php

/**
 * Follower form base class.
 *
 * @method Follower getObject() Returns the current form's model object
 *
 * @package    TwitterINeed
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseFollowerForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                 => new sfWidgetFormInputHidden(),
      'following'          => new sfWidgetFormInputCheckbox(),
      'sender_id'          => new sfWidgetFormInputText(),
      'sender_name'        => new sfWidgetFormInputText(),
      'sender_screen_name' => new sfWidgetFormInputText(),
      'sender_description' => new sfWidgetFormInputText(),
      'sender_location'    => new sfWidgetFormInputText(),
      'sender_protected'   => new sfWidgetFormInputCheckbox(),
      'sender_profile_img' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                 => new sfValidatorPropelChoice(array('model' => 'Follower', 'column' => 'id', 'required' => false)),
      'following'          => new sfValidatorBoolean(),
      'sender_id'          => new sfValidatorInteger(array('min' => -9.22337203685E+18, 'max' => 9.22337203685E+18)),
      'sender_name'        => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'sender_screen_name' => new sfValidatorString(array('max_length' => 15)),
      'sender_description' => new sfValidatorString(array('max_length' => 160, 'required' => false)),
      'sender_location'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sender_protected'   => new sfValidatorBoolean(),
      'sender_profile_img' => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('follower[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Follower';
  }


}
