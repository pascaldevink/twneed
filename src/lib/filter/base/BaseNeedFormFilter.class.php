<?php

/**
 * Need filter form base class.
 *
 * @package    TwitterINeed
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseNeedFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'author'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'timeframe'   => new sfWidgetFormFilterInput(),
      'location'    => new sfWidgetFormFilterInput(),
      'created_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'updated_at'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
    ));

    $this->setValidators(array(
      'author'      => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
      'timeframe'   => new sfValidatorPass(array('required' => false)),
      'location'    => new sfValidatorPass(array('required' => false)),
      'created_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'updated_at'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('need_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Need';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'author'      => 'Text',
      'description' => 'Text',
      'timeframe'   => 'Text',
      'location'    => 'Text',
      'created_at'  => 'Date',
      'updated_at'  => 'Date',
    );
  }
}
