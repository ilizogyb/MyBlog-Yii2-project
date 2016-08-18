<?php

namespace app\models;

use \yii\db\ActiveRecord;
use Yii;
use app\components\PostMailingBehavior;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $user_id
 */
class Post extends ActiveRecord
{
    
    /**
     * Method for return the table name
     * @return string table name
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * Get rules for validation
     * @return array with rules
     */
    public function rules()
    {
        return [
            [['title', 'description', 'user_id'], 'required'],
            [['description'], 'string'],
            [['user_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * Get the attributes of labels
     * @return array with the attributes of labels
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'user_id' => 'User ID',
        ];
    }
    
    /**
     * Define Mailing behavior for notify user when new post is created
     * @return the array with behavior
     */
    public function behaviors()
    {
        return [
            'PostMailingBehavior' => [
              'class' => PostMailingBehavior::className(),
              'attributes' => [
                  ActiveRecord::EVENT_BEFORE_INSERT => 'newPost',
                ]
            ],
        ];
    }
 
}

