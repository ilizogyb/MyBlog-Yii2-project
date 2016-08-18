<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
$this->title = 'My Yii Application';
Yii::$app->user->isGuest ? Yii::$app->response->redirect(['/']) : null;
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
                <div class="col-md-6 col-md-ofset-6">
                    <h2>Welcome to your profile</h2>
                    <h4>Registered Users</h4>
                     <table class="table">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                           </tr>
                        <thead>
                    <?php
                        foreach ($model->getUsers() as $k) {
                            echo '<tr><td>' . $k->id . '</td><td>' . $k->username . '</td><td>' . $k->email . '</td></tr>';
                        }
                    ?>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-ofset-6">
                    <h4>Events</h4>
                    <?php 
                    $events = $model->getEvents(Yii::$app->user->identity->username);
                    foreach($events as $k) {
                         echo '<div class="alert alert-success" alert-dismissible role="alert">
                            <a href="'. Url::toRoute('/event/delete') ."?id=" . $k->id . '" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></a>
                            <h4>' . $k->title_ . '</h4>
                            <strong>' . $k->from_ . ': </strong> '. $k->message_ . '
                            <p class="text-right">' . $k->eventdate_ . '</p>
                            <p class="text-right"><a href="'. Url::toRoute('/event/delete') ."?id=" . $k->id . '" class="btn btn-default btn-xs" data-dismiss="alert">I read</a></p>
                        </div>';
                    }
                     ?>
                </div>
            </div>

    </div>
</div>
