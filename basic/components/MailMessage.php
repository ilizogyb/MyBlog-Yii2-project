<?php
namespace app\components;

use Yii;

/**
 * Description of Mail message
 *
 */
class MailMessage {
    
    public $from;
    public $to;
    public $subject;
    public $body;
    
    /**
     * Constructor for init Message
     * @param $message array with needed data
     * $mesage = ['from'=>'one user', 'to'=>'other user', 
     *     'subject'=>'My message', 'body'=>'Hello!'];
     */
    function __construct($message = []) {
        if(is_array($message)) {
            if(array_key_exists("from", $message) && array_key_exists("to", $message)
                && array_key_exists("subject", $message) && array_key_exists("body", $message)) {
                $this->from = $message['from'];
                $this->to = $message['to'];
                $this->subject = $message['subject'];
                $this->body = $message['body'];
            }
        }
    }
    
    /**
     * Send mail to user
     */
    public function send() {
        //Yii::$app->mailer->compose('contact')
        Yii::$app->mailer->compose()
        ->setFrom($this->from)
        ->setTo($this->to)
        ->setSubject($this->subject)
        ->setTextBody($this->body)
        ->send();
    }
}