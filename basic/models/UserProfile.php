<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\components\MyBehavior;

/**
 * UserProfile is the model behind the user profile page.
 *
 */
class UserProfile extends Model
{
    /**
     * Get all users for view in the table 
     * on the profile page
     * @return array with users
     */
    public function getUsers() {
        return User::find()->all();
    }
    
    /**
     * Get all events for view on the profile page
     * @param string $user concrete user for get his events
     * @return array with the events for concrete user
     * specified in the parameter
     */
    public function getEvents($user) {
        return Event::findAll(['to_' => $user]);
    }
    
}
