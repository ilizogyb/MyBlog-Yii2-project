<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\modules\admin\models\AdminProfile;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $model = new AdminProfile();
        return $this->render('index', ['model' => $model]);
    }
}
