<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use app\components\MyBehavior;
use app\models\Event;

/**
 * AdminProfile is the model behind the admin profile page.
 *
 * @property User|null $user This property is read-only.
 *
 */
class AdminProfile extends Model
{
    /**
     * Get all events for display on admin profile page
     * @return array with events
     */
    public function getEvents() {
        return Event::find()->all();
    }
    
}
