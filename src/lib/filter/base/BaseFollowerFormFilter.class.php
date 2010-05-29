<?php

/**
 * Follower filter form base class.
 *
 * @package    TwitterINeed
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseFollowerFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'following'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'sender_id'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sender_name'        => new sfWidgetFormFilterInput(),
      'sender_screen_name' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sender_description' => new sfWidgetFormFilterInput(),
      'sender_location'    => new sfWidgetFormFilterInput(),
      'sender_protected'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'sender_profile_img' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'following'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'sender_id'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'sender_name'        => new sfValidatorPass(array('required' => false)),
      'sender_screen_name' => new sfValidatorPass(array('required' => false)),
      'sender_description' => new sfValidatorPass(array('required' => false)),
      'sender_location'    => new sfValidatorPass(array('required' => false)),
      'sender_protected'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'sender_profile_img' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('follower_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Follower';
  }

  public function getFields()
  {
    return array(
      'id'                 => 'Number',
      'following'          => 'Boolean',
      'sender_id'          => 'Number',
      'sender_name'        => 'Text',
      'sender_screen_name' => 'Text',
      'sender_description' => 'Text',
      'sender_location'    => 'Text',
      'sender_protected'   => 'Boolean',
      'sender_profile_img' => 'Text',
    );
  }
}
