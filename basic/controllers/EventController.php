<?php

namespace app\controllers;

use Yii;

use yii\web\Controller;
use app\models\EventForm;
use app\models\Event;

/**
 * Description of EventController
 *
 */
class EventController extends Controller
{
    /**
     * Creating a new Event.
     * @return mixed
     */
    public function actionCreate() {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        $model = new EventForm();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/admin']);
        } else {
            return $this->render('index', ['model' => $model]);
        }

    }
    
    /**
     * Remove the specified Event.
     * @param string $id the event id
     * @return mixed
     */
    public function actionDelete($id) {
       Event::findOne($id)->delete(); 
       $this->redirect(['site/profile']);
    }
    
    /**
     * Update the specified Event.
     * @param string $id the event id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = Event::findOne($id);
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           $this->redirect(['/admin']);
         } else {
           return $this->render('index', ['model' => $model]);
         }
    }

}   