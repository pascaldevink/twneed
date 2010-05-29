<?php

/**
 * RawMessage filter form base class.
 *
 * @package    TwitterINeed
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseRawMessageFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'message_id'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'text'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'follower_id' => new sfWidgetFormPropelChoice(array('model' => 'Follower', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'message_id'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'text'        => new sfValidatorPass(array('required' => false)),
      'follower_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Follower', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('raw_message_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'RawMessage';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'message_id'  => 'Number',
      'created_at'  => 'Number',
      'text'        => 'Text',
      'follower_id' => 'ForeignKey',
    );
  }
}
