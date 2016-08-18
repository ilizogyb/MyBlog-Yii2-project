<?php

namespace app\components;

use yii\base\Behavior;
use app\components\MailMessage;
use yii\db\ActiveRecord;
use app\models\Event;
use app\models\User;

/** 
 * Description Post Mailing Behavior
 *
 */ 
class PostMailingBehavior extends Behavior {
 
    public $attributes = [
        ActiveRecord::EVENT_AFTER_INSERT => 'newPost',
        //ActiveRecord::EVENT_AFTER_UPDATE => 'newPost',
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
            $events[$i] = 'mailingUser';
        }
        return $events;
    }

    /**
     * Create and send the mail message to user 
     */     
    public function mailingUser() {

       $ev = Event::find()->all();
       
       foreach($ev as $k) {
          if ($k->type_ == 'email' ) {
            $user_to_mail = User::findOne(['username' => $k->to_])->email;
            $user_from_mail = User::findOne(['username' => $k->from_])->email;
            $mail = new MailMessage([
                'from' => $user_from_mail,
                'to' => $user_to_mail,
                'subject'=> $k->title_,
                'body'=> $k->message_
              ]);
              $mail->send();
            }
        }
    }
    
}
