<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use app\models\User;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\Login */

$this->title = 'Create events';
$this->params['breadcrumbs'][] = $this->title;



?>
<div class="container">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Please fill out the following fields:</p>
    <div class="body-content">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                 <?php $form = ActiveForm::begin(['id' => 'event-form']); ?>
                    <?= $form->field($model, 'code_')->dropDownList([
                    '0' => 1,
                    '1' => 2,
                    '2' => 3,
                    ]); ?>
                    <?php 
                     $items = User::find()->all(); 
                    ?>
                    <?= $form->field($model, 'from_')->dropDownList(ArrayHelper::map($items, 'username', 'username'));?>
                    
                    <?= $form->field($model, 'to_')->dropDownList(ArrayHelper::map($items, 'username', 'username'));?>
                    <?= $form->field($model, 'title_') ?>
                    <?= $form->field($model, 'message_')->textArea(['rows' => 3]) ?>
                    <?= $form->field($model, 'type_')->dropDownList([
                        'email' => 'email',
                        'browser' => 'browser'
                    ]);
                    ?>
                    <div class="form-group">
                    <?= Html::submitButton('create', ['class' => 'btn btn-primary', 'name' => 'create-button']) ?>
                </div>
                 <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
