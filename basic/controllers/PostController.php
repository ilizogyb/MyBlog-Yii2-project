<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Post;

class PostController extends Controller
{
   
    /**
     * Displays page with posts.
     *
     * @return string
     */
    public function actionIndex()
    { 
        $model = Post::find()->all();
        return $this->render('index', ['model'=>$model]);
    }

   
 }
