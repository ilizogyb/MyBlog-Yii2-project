<?php

use yii\helpers\Url;

?>
<div class="admin-default-index">
    <h1>Site admin panel</h1>
    <p>
        This is the view content for action "<?= $this->context->action->id ?>".
        The action belongs to the controller "<?= get_class($this->context) ?>"
        in the "<?= $this->context->module->id ?>" module.
    </p>

    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped">
                <tr>
                    <th>ID</th><th>CODE</th><th>FROM</th><th>TO</th><th>TITLE</th><th>MESSAGE</th><th>TYPE</th><th>DATE</th><th>ACTIONS</th>
                </tr>
                <?php 
                foreach ($model->getEvents() as $k) {
                echo '
                <tr>
                    <td>' . $k->id . '</td><td>' . $k->code_ .'</td><td>' . $k->from_ .  '</td><td>' . $k->to_ . '</td><td>' . $k->title_ . '</td><td>' . $k->message_ . '</td><td>' . $k->type_ . '</td>
                    <td>' . $k->eventdate_ . '</td>
                    <td>
                        <a href="'. Url::toRoute('/event/update') ."?id=" . $k->id . '"><i class="glyphicon glyphicon-pencil"></i></a>
                        <a href="'. Url::toRoute('/event/delete') ."?id=" . $k->id . '"><i class="glyphicon glyphicon-trash"></i></a>
                    </td>
                </tr>';} ?>
            </table>
        </div>
        <div class="col-lg-2"><a href="<?php echo Url::toRoute('/event/create'); ?>" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Create</a></div>
    </div>
</div>
