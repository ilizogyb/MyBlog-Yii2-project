<?php

namespace app\models;

use Yii;
//use app\components\MailingBehavior;

/**
 * This is the model class for table "event.
 *
 * @property integer $code_
 * @property string $from_
 * @property string $to_
 * @property integer $title_
 * @property integer $message_
 * @property integer $type_
 *
 */
class Event extends \yii\db\ActiveRecord
{
    
    /**
     * Method for return the table name
     * @return string table name
     */
    public static function tableName()
    {
        return 'event';
    }
    
    /**
     * Get rules for validation
     * @return array with rules
     */
    public function rules()
    {
        return [
            [['code_', 'from_', 'to_', 'title_', 'message_', 'type_'], 'required'],
            [['code_'], 'integer'],
            ['from_', 'string'],
            ['to_', 'string'],
            [['title_'], 'string'],
            [['message_'], 'string'],
            [['type_'], 'string'],
        ];
    }
}

