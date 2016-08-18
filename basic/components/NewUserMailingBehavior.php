<?php

namespace app\components;

use yii;
use yii\base\Behavior;
use app\components\MailMessage;
use yii\db\ActiveRecord;
use yii\helpers\Url;

/** 
 * Description New User Mailing Behavior
 *
 */ 
class NewUserMailingBehavior extends Behavior {
 
    const DEFAULT_MAIL = 'noreply@mysite.com';
    
    public $attributes = [
        ActiveRecord::EVENT_AFTER_INSERT => 'newUser',
       // ActiveRecord::EVENT_AFTER_UPDATE => 'newUser',
    ];
    
    /**
     * Assign a handler for the [[owner]] events
     * @return Array events (array keys) with their assigned 
     * handlers (array values)
     */
    public function events()
    {
        $events = $this->attributes;
        foreach ($events as $i => $event) {
            $events[$i] = 'registerUser';
        }
        return $events;
    }
    
    /**
     * Create and send the mail message to user 
     */ 
    public function registerUser() {
        $mail = new MailMessage([
            'from' => Yii::$app->params['adminEmail'],
            'to' => $this->owner->email,
            'subject'=> 'Site registration complete',
            'body'=> 'Dear ' .$this->owner->username. '!  You successfull register on my site! Visit please: ' . Url::home(true)
            ]);
        $mail->send();
    }
    
}
