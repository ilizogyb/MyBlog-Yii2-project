<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Event;

/**
 * EventForm is the model behind the event form.
 *
 */
class EventForm extends Model {
    public $code_;
    public $from_;
    public $to_;
    public $title_;
    public $message_;
    public $type_;

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
        ];
    }

    /**
     * Method for save the Event into database
     * @return boolean true when the process is successful and 
     * otherwise return false
     */
    public function save() {
        if ($this->validate()) {
            $event = new Event();
            $event->code_ = $this->code_;
            $event->from_ = $this->from_;
            $event->to_ = $this->to_;
            $event->title_ = $this->title_;
            $event->message_ = $this->message_;
            $event->type_ = $this->type_;
            $date = new \DateTime();
            $event->eventdate_ = $date->format('Y-m-d H:i:s');
            $event->save();
            return true;
        }
        return false;
    }

}
